<?php

namespace App\Http\Resources\V1;

use App\Models\AsociacionExamenes;
use Illuminate\Http\Resources\Json\JsonResource;

class MuestraResource extends JsonResource
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
            'nopedidomv' => $this->nopedidomv,
            'nohistoriaclinicamv' => $this->nohistoriaclinicamv,
            'noatencionmv' => $this->noatencionmv,
            'descripcion' => $this->descripcion,
            'valida' => $this->valida,
            'observacionesmuestranovalida' => $this->observacionesmuestranovalida,
            'examenesAsociados' => AsociacionExamenes::whereIdmuestra($this->id)->get(),
        ];
    }
}
