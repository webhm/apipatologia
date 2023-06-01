<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsociacionExamenes extends Model
{
    use HasFactory;
    protected $fillable = [
        "idmuestra",
        "codigoexamenmv",
        "nopedidomv",
        "descripcion",
        "observaciones",
        "status",
        "tieneinforme",
    ];

    public function muestra()
    {
        return $this->belongsTo(Muestra::class);
    }
}
