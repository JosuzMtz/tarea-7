@extends('layouts.app')

@section('title', 'Nueva Materia')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Nueva Materia</h1>
            <form action="{{ route('materias.store') }}" method="POST" class="card shadow">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            placeholder="ej. Matemáticas"
                            required>
                        @error('nombre')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nombre_profesor" class="form-label">Profesor</label>
                        <input
                            type="text"
                            class="form-control @error('nombre_profesor') is-invalid @enderror"
                            id="nombre_profesor"
                            name="nombre_profesor"
                            value="{{ old('nombre_profesor') }}"
                            placeholder="ej. Dr. García">
                        @error('nombre_profesor')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                    <a href="{{ route('materias.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection