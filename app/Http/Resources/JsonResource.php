<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as JsonR;



/**
 * @OA\Schema(
 *   description="JsonResource",
 *   title="JsonResource",
 *   required={},
 *   @OA\Property(type="string",description="nome do paciente",title="nome",property="nome",example="Tarcisio Souto"),
 *   @OA\Property(type="string",description="data de nascimento",title="dtnasc",property="dtnasc",example="1993-02-26"),
 *   @OA\Property(type="string",description="sexo",title="sexo",property="sexo",example="m"),
 *   @OA\Property(type="array", description="consultas", title="consultas", @OA\Items(
 *                      @OA\Property(
 *                         property="dtvisita",
 *                         type="date",
 *                         example="2024-05-01"
 *                      )))
 * )
 * 
 */
class JsonResource extends JsonR
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
