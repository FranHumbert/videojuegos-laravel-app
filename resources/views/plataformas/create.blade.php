@extends('layouts.app')

@section('title', 'Agregar Plataforma')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Agregar Nueva Plataforma</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('plataformas.store') }}">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre') }}" 
                                   placeholder="PlayStation 5, Xbox Series X, Nintendo Switch..." required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fabricante -->
                        <div class="mb-3">
                            <label for="fabricante" class="form-label">Fabricante</label>
                            <input type="text" class="form-control @error('fabricante') is-invalid @enderror" 
                                   id="fabricante" name="fabricante" value="{{ old('fabricante') }}" 
                                   placeholder="Sony, Microsoft, Nintendo..." required>
                            @error('fabricante')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('plataformas.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar Plataforma</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
