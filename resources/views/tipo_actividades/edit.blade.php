@extends('layouts.app')

@section('title', 'Editar Tipo de Actividad')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="mb-4">Editar Tipo de Actividad</h1>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <form action="{{ route('tipo-actividades.update', $tipo->id) }}" method="POST" class="card shadow">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $tipo->nombre) }}"
                            required>
                        @error('nombre')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                    <a href="{{ route('tipo-actividades.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection