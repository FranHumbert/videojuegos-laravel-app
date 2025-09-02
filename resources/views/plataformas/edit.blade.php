@extends('layouts.app')

@section('title', 'Editar - ' . $plataforma->nombre)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Editar: {{ $plataforma->nombre }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('plataformas.update', $plataforma) }}">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre', $plataforma->nombre) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fabricante -->
                        <div class="mb-3">
                            <label for="fabricante" class="form-label">Fabricante</label>
                            <input type="text" class="form-control @error('fabricante') is-invalid @enderror" 
                                   id="fabricante" name="fabricante" value="{{ old('fabricante', $plataforma->fabricante) }}" required>
                            @error('fabricante')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Información adicional -->
                        <div class="alert alert-info">
                            <small>
                                <strong>Videojuegos asociados:</strong> {{ $plataforma->videojuegos->count() }}<br>
                                <strong>Creada:</strong> {{ $plataforma->created_at->format('d/m/Y H:i') }}
                            </small>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('plataformas.show', $plataforma) }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Actualizar Plataforma</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
