@extends('layouts.app')

@section('title', $videojuego->titulo)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $videojuego->titulo }}</h3>
                    <div>
                        <a href="{{ route('videojuegos.edit', $videojuego) }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary btn-sm">Volver</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Información Básica</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Título:</strong></td>
                                    <td>{{ $videojuego->titulo }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Género:</strong></td>
                                    <td>{{ $videojuego->genero }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Año de Lanzamiento:</strong></td>
                                    <td>{{ $videojuego->año_lanzamiento->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Registrado:</strong></td>
                                    <td>{{ $videojuego->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            <h5>Plataformas</h5>
                            @if($videojuego->plataformas->count() > 0)
                                <div class="list-group">
                                    @foreach($videojuego->plataformas as $plataforma)
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $plataforma->nombre }}</strong>
                                                <br>
                                                <small class="text-muted">{{ $plataforma->fabricante }}</small>
                                            </div>
                                            <a href="{{ route('plataformas.show', $plataforma) }}" class="btn btn-outline-primary btn-sm">Ver</a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-info">
                                    Este videojuego no tiene plataformas asignadas.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('videojuegos.destroy', $videojuego) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('¿Estás seguro de eliminar este videojuego?')">
                            Eliminar Videojuego
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
