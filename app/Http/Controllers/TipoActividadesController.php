<?php

namespace App\Http\Controllers;

use App\Models\Tipo_actividades;
use Illuminate\Http\Request;

class TipoActividadesController extends Controller
{
    private function validateTipo(Request $request)
    {
        return $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    }

    public function index()
    {
        $tipos = Tipo_actividades::all();
        return view('tipo_actividades.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipo_actividades.create');
    }

    public function store(Request $request)
    {
        $this->validateTipo($request);
        Tipo_actividades::create([
            'nombre' => $request->nombre,
        ]);
        return redirect()->route('tipo-actividades.index')
                         ->with('success', 'Tipo de actividad creado correctamente.');
    }

    public function show($id)
    {
        $tipo = Tipo_actividades::findOrFail($id);
        return view('tipo_actividades.show', compact('tipo'));
    }

    public function edit($id)
    {
        $tipo = Tipo_actividades::findOrFail($id);
        return view('tipo_actividades.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $this->validateTipo($request);
        $tipo = Tipo_actividades::findOrFail($id);
        $tipo->update($request->all());
        return redirect()->route('tipo-actividades.index')
                         ->with('success', 'Tipo de actividad actualizado correctamente.');
    }

    public function destroy($id)
    {
        $tipo = Tipo_actividades::findOrFail($id);
        $tipo->delete();
        return redirect()->route('tipo-actividades.index')
                         ->with('success', 'Tipo de actividad eliminado correctamente.');
    }
}