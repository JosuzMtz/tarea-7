@extends('layouts.app')

@section('title', 'Detalle Actividad')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="card-title">{{ $actividad->tipoActividad->nombre }}</h1>
                    <p class="text-muted fs-5"><i class="fas fa-book"></i> {{ $materia->nombre }}</p>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Calificación:</strong><br>
                            <span class="badge calificacion-badge fs-4
                                @if($actividad->calificacion >= 90) bg-success
                                @elseif($actividad->calificacion >= 70) bg-warning text-dark
                                @else bg-danger
                                @endif">
                                {{ $actividad->calificacion }}
                            </span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Fecha:</strong><br>
                            {{ \Carbon\Carbon::parse($actividad->fecha)->format('d M, Y') }}
                        </div>
                        @if ($actividad->comentarios)
                            <div class="col-12 mb-3">
                                <strong>Comentarios:</strong><br>
                                {{ $actividad->comentarios }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <a href="{{ route('materias.actividad.edit', [$materia->id, $actividad->id]) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('materias.actividad.index', $materia->id) }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection