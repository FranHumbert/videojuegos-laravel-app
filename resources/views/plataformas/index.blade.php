@extends('layouts.app')

@section('title', 'Plataformas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Plataformas</h1>
        <a href="{{ route('plataformas.create') }}" class="btn btn-success">Agregar Plataforma</a>
    </div>

    @if($plataformas->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Fabricante</th>
                        <th>Videojuegos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plataformas as $plataforma)
                        <tr>
                            <td><strong>{{ $plataforma->nombre }}</strong></td>
                            <td>{{ $plataforma->fabricante }}</td>
                            <td>
                                <span class="badge bg-info">{{ $plataforma->videojuegos_count }} videojuegos</span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('plataformas.show', $plataforma) }}" class="btn btn-outline-primary">Ver</a>
                                    <a href="{{ route('plataformas.edit', $plataforma) }}" class="btn btn-outline-secondary">Editar</a>
                                    <form method="POST" action="{{ route('plataformas.destroy', $plataforma) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" 
                                                onclick="return confirm('¿Estás seguro de eliminar esta plataforma?')">
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
            {{ $plataformas->links() }}
        </div>
    @else
        <div class="text-center">
            <h3>No hay plataformas registradas</h3>
            <p class="text-muted">Comienza agregando tu primera plataforma.</p>
            <a href="{{ route('plataformas.create') }}" class="btn btn-success">Agregar Plataforma</a>
        </div>
    @endif
@endsection
