<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;
    protected $fillable = [
        'nopedidomv',
        'nohistoriaclinicamv',
        'noatencionmv',
        'medicosolicitante',
        'nombrepaciente',
        'cedulaidentidad',
        'servicio',
        'plan',
        'instruccion',
        'ubicacion',
        'edad',
        'fechapedido',
        'secuencial',
        'year',
        'idtipoinforme',
        "idestadopedido",
        'codigoinforme',
        'informacionclinica',
        'diagnostico',
        'macroscopico',
        "dgpresuntivo",
        "resultmicroscopico",
        'fechadocumento',
        'iddiagncie10',
        'referinforme',
        'resultado2',
        'resultado3',
        'DIAGNOSTCIE10'
    ];
    public function estadopedido()
    {
        return $this->hasOne(Estadopedido::class);
    }
    public function muestras(){
        return $this->belongsToMany(Muestra::class, 'informe_muestra');
    }
    public function cortes()
    {
        return $this->hasMany(Corte::class);
    }
}
