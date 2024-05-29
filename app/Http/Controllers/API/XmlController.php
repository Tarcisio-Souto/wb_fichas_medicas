<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateXmlFormRequest;
use App\Http\Resources\FichaResource;
use App\Http\Resources\PacienteResource;
use App\Models\Ficha;
use App\Models\Paciente;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Saloon\XmlWrangler\XmlReader;

class XmlController extends Controller
{
    private $paciente;
    private $ficha;

    public function __construct(Paciente $paciente, Ficha $ficha)
    {
        $this->paciente = $paciente;
        $this->ficha = $ficha;
    }

    public function storeXml(Request $req)
    {
        $xml = $req->getContent();
        $dom = new DOMDocument();
        $dom->loadXML($xml);

        $nome = $dom->getElementsByTagName('nome');
        $dtNasc = $dom->getElementsByTagName('dtnasc');
        $sexo = $dom->getElementsByTagName('sexo');
        $consultas = $dom->getElementsByTagName('consultas');
        $dtvisita = $dom->getElementsByTagName('dtvisita');

        $nomeAux = '';
        $dtNascAux = '';
        $sexoAux = '';
        $dtvisitasAux = [];


        foreach ($nome as $nm) {
            $nomeAux = $nm->nodeValue;
        }

        foreach ($dtNasc as $dtNasc) {
            $dtNascAux = $dtNasc->nodeValue;
        }

        foreach ($sexo as $sexo) {
            $sexoAux = $sexo->nodeValue;
        }

        foreach ($dtvisita as $dtvisita) {
            array_push($dtvisitasAux, $dtvisita->nodeValue);
        }

        /* PERSISTÊNCIA NO BANCO DE DADOS */

        $paciente = $this->paciente->create(["nome" => $nomeAux, "dtnasc" => $dtNascAux, "sexo" => $sexoAux]);
        $paciente_id = DB::table('paciente')->latest("id")->first()->{"id"};

        for ($i = 0; $i < sizeof($dtvisitasAux); $i++)
        {
            $dtvisita = $dtvisitasAux[$i];
            $ficha = $this->ficha->create(["dtvisita" => $dtvisita, "paciente_id" => $paciente_id]);
        }
        
        return [
            "paciente" => new PacienteResource($paciente), 
            "ficha" => new FichaResource($ficha),
        ]; 

    }
}
