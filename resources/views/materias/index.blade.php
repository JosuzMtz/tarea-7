@extends('layouts.app')

@section('title', 'Materias')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="display-4">Mis Materias</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('materias.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> Nueva Materia
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($materias->isEmpty())
        <div class="alert alert-info text-center py-5">
            <h4>No hay materias registradas</h4>
            <p>Comienza <a href="{{ route('materias.create') }}">agregando una materia</a>.</p>
        </div>
    @else
        <div class="row g-4">
            @foreach ($materias as $materia)
                <div class="col-md-6 col-lg-4">
                    <div class="card materia-card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $materia->nombre }}</h5>
                            <p class="card-text text-muted">
                                <i class="fas fa-chalkboard-teacher"></i> {{ $materia->nombre_profesor ?? 'Sin profesor' }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top">
                            <a href="{{ route('materias.actividad.index', $materia->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-list-ol"></i> Calificaciones
                            </a>
                            <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta materia?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection