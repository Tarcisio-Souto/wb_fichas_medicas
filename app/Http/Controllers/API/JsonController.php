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
    

    /**
     * @OA\Post(
     *      path="/enviar-json",
     *      operationId="storeJson",
     *      tags={"JSON"},
     *      summary="Registrar pacientes e suas visitas",
     *      description="",
     *      @OA\RequestBody(
     *         @OA\JsonContent(
     *            @OA\Schema(
     *               type="object",
     *               required={"nome", "dtnasc", "sexo", "dtvisita"},
     *               @OA\Property(property="nome", type="string"),
     *               @OA\Property(property="dtnasc", type="date"),
     *               @OA\Property(property="sexo", type="string"),
     *               @OA\Property(property="dtvisita", type="date")
     *            ),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal error"
     *      ),
     * )
     */
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
