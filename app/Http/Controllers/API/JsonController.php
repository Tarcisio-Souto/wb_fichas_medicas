<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateFichaFormRequest;
use App\Http\Requests\StoreUpdateJsonFormRequest;
use App\Http\Requests\StoreUpdatePacienteFormRequest;
use App\Http\Resources\FichaResource;
use Illuminate\Http\Request;
use App\Http\Resources\PacienteResource;
use App\Models\Ficha;
use App\Models\Paciente;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    private $paciente;
    private $ficha;

    public function __construct(Paciente $paciente, Ficha $ficha)
    {
        $this->paciente = $paciente;
        $this->ficha = $ficha;
    }
    
    public function storeJson(StoreUpdateJsonFormRequest $req)
    {

        $nome = $req->nome;
        $dtnasc = $req->dtnasc;
        $sexo = $req->sexo;

        $paciente = $this->paciente->create(["nome" => $nome, "dtnasc" => $dtnasc, "sexo" => $sexo]);
        $paciente_id = DB::table('paciente')->latest("id")->first()->{"id"};

        for ($i = 0; $i < sizeof($req->consultas); $i++)
        {
            $dtvisita = $req->consultas[$i]["dtvisita"];
            $ficha = $this->ficha->create(["dtvisita" => $dtvisita, "paciente_id" => $paciente_id]);
        }
        
        return [
            "paciente" => new PacienteResource($paciente), 
            "ficha" => new FichaResource($ficha),
        ];  
    }

}
