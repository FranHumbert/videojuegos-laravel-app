<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\PlataformaController;

//Pagina principal
Route::get('/', [HomeController::class, 'index'])->name('home');

//Rutas de recursos para videojuegos
Route::resource('videojuegos', VideojuegoController::class);

//Rutas de recursos para plataformas
Route::resource('plataformas', PlataformaController::class);
