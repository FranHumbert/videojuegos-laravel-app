@extends('layouts.app')

@section('title', $plataforma->nombre)

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>{{ $plataforma->nombre }}</h4>
                    <div>
                        <a href="{{ route('plataformas.edit', $plataforma) }}" class="btn btn-success btn-sm">Editar</a>
                        <a href="{{ route('plataformas.index') }}" class="btn btn-secondary btn-sm">Volver</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Nombre:</strong></td>
                            <td>{{ $plataforma->nombre }}</td>
                        </tr>
                        <tr>
                            <td><strong>Fabricante:</strong></td>
                            <td>{{ $plataforma->fabricante }}</td>
                        </tr>
                        <tr>
                            <td><strong>Videojuegos:</strong></td>
                            <td>{{ $plataforma->videojuegos->count() }}</td>
                        </tr>
                        <tr>
                            <td><strong>Registrada:</strong></td>
                            <td>{{ $plataforma->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('plataformas.destroy', $plataforma) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('¿Estás seguro de eliminar esta plataforma?')"
                                {{ $plataforma->videojuegos->count() > 0 ? 'disabled title=No se puede eliminar porque tiene videojuegos asociados' : '' }}>
                            Eliminar Plataforma
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Videojuegos en esta Plataforma</h5>
                </div>
                <div class="card-body">
                    @if($plataforma->videojuegos->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Género</th>
                                        <th>Año</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($plataforma->videojuegos as $videojuego)
                                        <tr>
                                            <td><strong>{{ $videojuego->titulo }}</strong></td>
                                            <td>{{ $videojuego->genero }}</td>
                                            <td>{{ $videojuego->año_lanzamiento->format('Y') }}</td>
                                            <td>
                                                <a href="{{ route('videojuegos.show', $videojuego) }}" class="btn btn-outline-primary btn-sm">Ver</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center">
                            <p class="text-muted">Esta plataforma no tiene videojuegos registrados aún.</p>
                            <a href="{{ route('videojuegos.create') }}" class="btn btn-primary btn-sm">Agregar Videojuego</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
