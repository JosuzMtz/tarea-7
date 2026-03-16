<?php

namespace App\Http\Controllers;
use App\Models\Actividades;
use App\Models\Materias;
use App\Models\Tipo_actividades;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function validateActividad(Request $request)
    {
        return $request->validate([
            'tipo_actividad_id' => 'required|exists:tipo_actividades,id',
            'calificacion'      => 'required|numeric|min:0|max:100',
            'fecha'             => 'required|date',
            'comentarios'       => 'nullable|string|max:255',
        ]);
    }
    public function index($materia_id)
    {
        //
        $materia = Materias::findOrFail($materia_id);
        $actividades = Actividades::where('materia_id', $materia_id)->with('tipoActividad')->get();
        return view('actividades.index', compact('materia', 'actividades'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($materia_id)
    {
        //  
        $materia = Materias::FindOrFail($materia_id);
        $tipos = Tipo_actividades::all();
        return view('actividades.create', compact('materia', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $materia_id)
    {
        //
        $this->validateActividad($request);
        Actividades::create([
            'materia_id' => $materia_id,
            'tipo_actividad_id' => $request->tipo_actividad_id,
            'calificacion' => $request->calificacion,
            'fecha' => $request->fecha,
            'comentarios' => $request->comentarios
        ]);
        return redirect()->route('materias.actividad.index', $materia_id)->with('success', 'Actividad registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($materia_id, $id)
    {
        $materia = Materias::findOrFail($materia_id);
        $actividad = Actividades::findOrFail($id);
        return view('actividades.show', compact('materia', 'actividad'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($materia_id, $id)
    {
        $materia = Materias::findOrFail($materia_id);
        $actividad = Actividades::findOrFail($id);
        $tipos = Tipo_actividades::all();
        return view('actividades.edit', compact('materia', 'actividad', 'tipos'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $materia_id, $id)

    {
        //
        $this->validateActividad($request);
        $actividad = Actividades::findOrFail($id);
        $actividad->update($request->all());

        return redirect()->route('materias.actividad.index', $materia_id)->with('success', 'Actividad actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($materia_id, $id)
    {
        $actividad = Actividades::findOrFail($id);
        $actividad->delete();
        return redirect()->route('materias.actividad.index', $materia_id)
                        ->with('success', 'Actividad eliminada correctamente.');
    }
}
