<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AuditoriapedidoResource extends JsonResource
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
            'noPedidoMV' => $this->nopedidomv,
            'noHistoriaClinicaMV' => $this->nohistoriaclinicamv,
            'noAtencionMV' => $this->noatencionmv,
            'idEstadoPedido' => $this->idestadopedido,
            'idTipoMuestra' => $this->idtipomuestra,
            'descripcion' => $this->descripcion,
            'valida' => $this->valida
        ];
    }
}
