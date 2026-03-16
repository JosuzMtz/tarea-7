<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_actividades extends Model
{
    /** @use HasFactory<\Database\Factories\TipoActividadesFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];
    public function Actividades(){
        return $this->hasMany(Actividades::class,'tipo_actividad_id');
    }

}
