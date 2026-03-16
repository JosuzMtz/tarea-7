<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    private function validateMaterias(Request $request)
    {
        return $request->validate([
            'nombre'          => 'required|string|max:255',
            'nombre_profesor' => 'nullable|string|max:255',
        ]);
    }

    public function index()
    {
        $materias = Materias::all();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $this->validateMaterias($request);
        Materias::create([
            'nombre'          => $request->nombre,
            'nombre_profesor' => $request->nombre_profesor,
        ]);
        return redirect()->route('materias.index')
                         ->with('success', 'Materia creada correctamente.');
    }

    public function show($id)
    {
        $materia = Materias::findOrFail($id);
        return view('materias.show', compact('materia'));
    }

    public function edit($id)
    {
        $materia = Materias::findOrFail($id);
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, $id)
    {
        $this->validateMaterias($request);
        $materia = Materias::findOrFail($id);
        $materia->update($request->all());
        return redirect()->route('materias.index')
                         ->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $materia = Materias::findOrFail($id);
        $materia->delete();
        return redirect()->route('materias.index')
                         ->with('success', 'Materia eliminada correctamente.');
    }
}