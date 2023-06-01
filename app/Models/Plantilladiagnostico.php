<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantilladiagnostico extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombreplantilla",
        "nombreusuario",
        "plantilla",
    ];
}
