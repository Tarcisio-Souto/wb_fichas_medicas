<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FichaResource extends JsonResource
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
            'paciente' => new PacienteResource($this->paciente),
            'dtvisita' => $this->dtvisita
        ];
    }
}
