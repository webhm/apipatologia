<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corte extends Model
{
    use HasFactory;

    protected $fillable = [
        'informe_id',
        'codigocorte',
        'letra',
        'consecutivo',
        'descripcion',
    ];

    public function informe()
    {
        return $this->hasOne(Informe::class);
    }
}
