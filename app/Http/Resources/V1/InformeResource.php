<?php

namespace App\Http\Resources\V1;

use App\Models\Estadopedido;
use App\Models\Informe;
use Illuminate\Http\Resources\Json\JsonResource;

class InformeResource extends JsonResource
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
            'medicosolicitante' => $this->medicosolicitante,
            'fechapedido' => $this->fechapedido,
            'secuencial' => $this->secuencial,
            'year' => $this->year,
            'iddiagncie10' => $this->iddiagncie10,
            'idtipoinforme' => $this->idtipoinforme,
            'idestadopedido' => $this->idestadopedido,
            'estadopedido' => Estadopedido::select('siglas, descripcion')->whereId($this->idestadopedido)->first(),
            'codigoinforme' => $this->codigoinforme,
            'informacionclinica' => $this->informacionclinica,
            'diagnostico' => $this->diagnostico,
            'macroscopico' => $this->macroscopico,
            'fechadocumento' => $this->fechadocumento,
            'dgpresuntivo' => $this->dgpresuntivo,
            'resultmicroscopico' => $this->resultmicroscopico,
            'iddiagncie10' => $this->iddiagncie10,
            'DIAGNOSTCIE10' => $this->DIAGNOSTCIE10,
            'muestrasAsociadas' => $this->muestras()->get(),
            'cortes' => $this->cortes()->get()
        ];
    }
}
