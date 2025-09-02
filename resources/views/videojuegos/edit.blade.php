@extends('layouts.app')

@section('title', 'Editar - ' . $videojuego->titulo)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Editar: {{ $videojuego->titulo }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('videojuegos.update', $videojuego) }}">
                        @csrf
                        @method('PUT')

                        <!-- Título -->
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" 
                                   id="titulo" name="titulo" value="{{ old('titulo', $videojuego->titulo) }}" required>
                            @error('titulo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Género -->
                        <div class="mb-3">
                            <label for="genero" class="form-label">Género</label>
                            <input type="text" class="form-control @error('genero') is-invalid @enderror" 
                                   id="genero" name="genero" value="{{ old('genero', $videojuego->genero) }}" required>
                            @error('genero')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Año de lanzamiento -->
                        <div class="mb-3">
                            <label for="año_lanzamiento" class="form-label">Año de Lanzamiento</label>
                            <input type="date" class="form-control @error('año_lanzamiento') is-invalid @enderror" 
                                   id="año_lanzamiento" name="año_lanzamiento" 
                                   value="{{ old('año_lanzamiento', $videojuego->año_lanzamiento->format('Y-m-d')) }}" required>
                            @error('año_lanzamiento')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Plataformas -->
                        <div class="mb-3">
                            <label class="form-label">Plataformas</label>
                            @if($plataformas->count() > 0)
                                <div class="row">
                                    @foreach($plataformas as $plataforma)
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       name="plataformas[]" value="{{ $plataforma->id }}" 
                                                       id="plataforma_{{ $plataforma->id }}"
                                                       {{ in_array($plataforma->id, old('plataformas', $videojuego->plataformas->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="plataforma_{{ $plataforma->id }}">
                                                    {{ $plataforma->nombre }} ({{ $plataforma->fabricante }})
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    No hay plataformas disponibles.
                                </div>
                            @endif
                            @error('plataformas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('videojuegos.show', $videojuego) }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar Videojuego</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
