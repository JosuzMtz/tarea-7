<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;

    protected $table = 'actividades'; // ← esta línea

    protected $fillable = [
        'materia_id',
        'tipo_actividad_id',
        'calificacion',
        'fecha',
        'comentarios'
    ];

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'materia_id');
    }

    public function tipoActividad()
    {
        return $this->belongsTo(Tipo_actividades::class, 'tipo_actividad_id');
    }
}
