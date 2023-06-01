<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AsociacionExamenesResource extends JsonResource
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
            'id' => $this->id,
            'idmuestra' => $this->idmuestra,
            'codigoexamenmv' => $this->codigoexamenmv,
            'descripcion' => $this->descripcion,
            'observaciones' => $this->observaciones,
            'status' => $this->status,
            'tieneinforme' => $this->tieneinforme,
        ];
    }
}
