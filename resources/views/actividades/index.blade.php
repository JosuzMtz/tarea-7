@extends('layouts.app')

@section('title', 'Calificaciones - ' . $materia->nombre)

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="display-4">{{ $materia->nombre }}</h1>
            <p class="text-muted"><i class="fas fa-chalkboard-teacher"></i> {{ $materia->nombre_profesor ?? 'Sin profesor' }}</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('materias.actividad.create', $materia->id) }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> Nueva Actividad
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($actividades->isEmpty())
        <div class="alert alert-info text-center py-5">
            <h4>No hay actividades registradas</h4>
            <p>Comienza <a href="{{ route('materias.actividad.create', $materia->id) }}">agregando una actividad</a>.</p>
        </div>
    @else
        <div class="card shadow">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Tipo</th>
                            <th>Calificación</th>
                            <th>Fecha</th>
                            <th>Comentarios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actividades as $actividad)
                            <tr>
                                <td>{{ $actividad->tipoActividad->nombre }}</td>
                                <td>
                                    <span class="badge calificacion-badge
                                        @if($actividad->calificacion >= 90) bg-success
                                        @elseif($actividad->calificacion >= 70) bg-warning text-dark
                                        @else bg-danger
                                        @endif">
                                        {{ $actividad->calificacion }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($actividad->fecha)->format('d M, Y') }}</td>
                                <td>{{ $actividad->comentarios ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('materias.actividad.edit', [$materia->id, $actividad->id]) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('materias.actividad.destroy', [$materia->id, $actividad->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta actividad?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div class="mt-3">
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a Materias
        </a>
    </div>
</div>
@endsection