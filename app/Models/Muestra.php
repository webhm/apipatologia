<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    use HasFactory;
    protected $fillable = [
        "nopedidomv",
        "nohistoriaclinicamv",
        "noatencionmv",
        "descripcion",
        "valida",
        "observacionesmuestranovalida"
    ];
    public function asociacionexamenes()
    {
        return $this->hasMany(AsociacionExamenes::class);
    }
    public function informes(){
        return $this->belongsToMany(Informe::class, 'informe_muestra');
    }
}
