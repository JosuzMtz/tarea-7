@extends('layouts.app')

@section('title', 'Detalle Tipo de Actividad')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="card-title">{{ $tipo->nombre }}</h1>
                    <hr class="my-4">
                    <div class="row text-muted small">
                        <div class="col-md-6">
                            <p><strong>Creado:</strong> {{ $tipo->created_at->format('d M, Y') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Actualizado:</strong> {{ $tipo->updated_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <a href="{{ route('tipo-actividades.edit', $tipo->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('tipo-actividades.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection