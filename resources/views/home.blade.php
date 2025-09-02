@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Pagina Principal de al APP</h1>
    
    <!-- Estadísticas básicas -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h2>{{ $totalVideojuegos }}</h2>
                    <p>Videojuegos</p>
                    <a href="{{ route('videojuegos.index') }}" class="btn btn-light btn-sm">Ver todos</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h2>{{ $totalPlataformas }}</h2>
                    <p>Plataformas</p>
                    <a href="{{ route('plataformas.index') }}" class="btn btn-light btn-sm">Ver todas</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Videojuegos recientes -->
    @if($videojuegosRecientes->count() > 0)
        <h3>Videojuegos Recientes</h3>
        <div class="row">
            @foreach($videojuegosRecientes as $videojuego)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $videojuego->titulo }}</h5>
                            <p class="text-muted">{{ $videojuego->genero }} - {{ $videojuego->año_lanzamiento->format('Y') }}</p>
                            <a href="{{ route('videojuegos.show', $videojuego) }}" class="btn btn-primary btn-sm">Ver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center">
            <h3>¡Empieza tu colección!</h3>
            <p>No tienes videojuegos aún.</p>
            <a href="{{ route('videojuegos.create') }}" class="btn btn-primary">Agregar Videojuego</a>
            <a href="{{ route('plataformas.create') }}" class="btn btn-success">Agregar Plataforma</a>
        </div>
    @endif
@endsection
