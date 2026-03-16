@extends('layouts.app')

@section('title', $materia->nombre)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="card-title">{{ $materia->nombre }}</h1>
                    <p class="text-muted fs-5">
                        <i class="fas fa-chalkboard-teacher"></i> {{ $materia->nombre_profesor ?? 'Sin profesor' }}
                    </p>
                    <hr class="my-4">
                    <div class="row text-muted small">
                        <div class="col-md-6">
                            <p><strong>Creado:</strong> {{ $materia->created_at->format('d M, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Actualizado:</strong> {{ $materia->updated_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <a href="{{ route('materias.actividad.index', $materia->id) }}" class="btn btn-info">
                        <i class="fas fa-list-ol"></i> Ver Calificaciones
                    </a>
                    <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('materias.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection