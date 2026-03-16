<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\TipoActividadesController;


Route::resource('materias', MateriasController::class);
Route::resource('materias.actividad', ActividadController::class);
Route::resource('tipo-actividades', TipoActividadesController::class);
