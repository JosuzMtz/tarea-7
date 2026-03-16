@extends('layouts.app')

@section('title', 'Tipos de Actividad')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="display-4">Tipos de Actividad</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('tipo-actividades.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> Nuevo Tipo
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($tipos->isEmpty())
        <div class="alert alert-info text-center py-5">
            <h4>No hay tipos registrados</h4>
            <p>Comienza <a href="{{ route('tipo-actividades.create') }}">agregando un tipo</a>.</p>
        </div>
    @else
        <div class="card shadow">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipos as $tipo)
                            <tr>
                                <td>{{ $tipo->id }}</td>
                                <td>{{ $tipo->nombre }}</td>
                                <td>
                                    <a href="{{ route('tipo-actividades.edit', $tipo->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('tipo-actividades.destroy', $tipo->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este tipo?')">
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