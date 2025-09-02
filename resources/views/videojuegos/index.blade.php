@extends('layouts.app')

@section('title', 'Videojuegos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Videojuegos</h1>
        <a href="{{ route('videojuegos.create') }}" class="btn btn-primary">Agregar Videojuego</a>
    </div>

    @if($videojuegos->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Género</th>
                        <th>Año</th>
                        <th>Plataformas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videojuegos as $videojuego)
                        <tr>
                            <td><strong>{{ $videojuego->titulo }}</strong></td>
                            <td>{{ $videojuego->genero }}</td>
                            <td>{{ $videojuego->año_lanzamiento->format('Y') }}</td>
                            <td>
                                @if($videojuego->plataformas->count() > 0)
                                    @foreach($videojuego->plataformas as $plataforma)
                                        <span class="badge bg-secondary me-1">{{ $plataforma->nombre }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">Sin plataformas</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('videojuegos.show', $videojuego) }}" class="btn btn-outline-primary">Ver</a>
                                    <a href="{{ route('videojuegos.edit', $videojuego) }}" class="btn btn-outline-secondary">Editar</a>
                                    <form method="POST" action="{{ route('videojuegos.destroy', $videojuego) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" 
                                                onclick="return confirm('¿Estás seguro de eliminar este videojuego?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center">
            {{ $videojuegos->links() }}
        </div>
    @else
        <div class="text-center">
            <h3>No hay videojuegos registrados</h3>
            <p class="text-muted">Comienza agregando tu primer videojuego.</p>
            <a href="{{ route('videojuegos.create') }}" class="btn btn-primary">Agregar Videojuego</a>
        </div>
    @endif
@endsection
