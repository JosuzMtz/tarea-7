@extends('layouts.app')

@section('title', 'Nueva Actividad')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-1">Nueva Actividad</h1>
            <p class="text-muted mb-4"><i class="fas fa-book"></i> {{ $materia->nombre }}</p>
            <form action="{{ route('materias.actividad.store', $materia->id) }}" method="POST" class="card shadow">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="tipo_actividad_id" class="form-label">Tipo de Actividad <span class="text-danger">*</span></label>
                        <select class="form-control @error('tipo_actividad_id') is-invalid @enderror" id="tipo_actividad_id" name="tipo_actividad_id" required>
                            <option value="">-- Selecciona un tipo --</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}" {{ old('tipo_actividad_id') == $tipo->id ? 'selected' : '' }}>
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
                            value="{{ old('calificacion') }}"
                            min="0" max="100" step="0.01"
                            placeholder="0 - 100"
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
                            value="{{ old('fecha') }}"
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
                            rows="3"
                            placeholder="Observaciones opcionales...">{{ old('comentarios') }}</textarea>
                        @error('comentarios')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
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