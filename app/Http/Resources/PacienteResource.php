<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @OA\Schema(
 *   description="Paciente",
 *   title="Paciente",
 *   required={},
 *   @OA\Property(type="string",description="nome",title="nome",property="nome",example="Tarcisio Souto"),
 *   @OA\Property(type="date",description="data de nascimento",title="dtnasc",property="dtnasc",example="1993-02-26"),
 *   @OA\Property(type="string",description="sexo",title="sexo",property="sexo",example="m")
 * )
 * 
 */


class PacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->id,
            'name' => $this->nome,
            'dtnasc' => $this->dtnasc,
            'sexo' => $this->sexo
        ];
    }
}
