@extends('layouts.app')

@section('title', 'Editar Actividad')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-1">Editar Actividad</h1>
            <p class="text-muted mb-4"><i class="fas fa-book"></i> {{ $materia->nombre }}</p>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <h4 class="alert-heading">Error de Validación</h4>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <form action="{{ route('materias.actividad.update', [$materia->id, $actividad->id]) }}" method="POST" class="card shadow">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="tipo_actividad_id" class="form-label">Tipo de Actividad <span class="text-danger">*</span></label>
                        <select class="form-control @error('tipo_actividad_id') is-invalid @enderror" id="tipo_actividad_id" name="tipo_actividad_id" required>
                            <option value="">-- Selecciona un tipo --</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}" {{ old('tipo_actividad_id', $actividad->tipo_actividad_id) == $tipo->id ? 'selected' : '' }}>
                                    {{ $tipo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('tipo_actividad_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="calificacion" class="form-label">Calificación <span class="text-danger">*</span></label>
                        <input
                            type="number"
                            class="form-control @error('calificacion') is-invalid @enderror"
                            id="calificacion"
                            name="calificacion"
                            value="{{ old('calificacion', $actividad->calificacion) }}"
                            min="0" max="100" step="0.01"
                            required>
                        @error('calificacion')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha <span class="text-danger">*</span></label>
                        <input
                            type="date"
                            class="form-control @error('fecha') is-invalid @enderror"
                            id="fecha"
                            name="fecha"
                            value="{{ old('fecha', $actividad->fecha) }}"
                            required>
                        @error('fecha')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="comentarios" class="form-label">Comentarios</label>
                        <textarea
                            class="form-control @error('comentarios') is-invalid @enderror"
                            id="comentarios"
                            name="comentarios"
                            rows="3">{{ old('comentarios', $actividad->comentarios) }}</textarea>
                        @error('comentarios')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                    <a href="{{ route('materias.actividad.index', $materia->id) }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection