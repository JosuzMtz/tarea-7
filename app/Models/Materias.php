<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    protected $fillable = [
        'nombre',
        'nombre_profesor',
    ];

    public function actividades(){
        return $this->hasMany(Actividades::class, 'materia_id');
    }
}
