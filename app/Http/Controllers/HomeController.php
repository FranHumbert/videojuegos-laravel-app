<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use App\Models\Plataforma;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        //Estadisticas basicas
        $totalVideojuegos = Videojuego::count();
        $totalPlataformas = Plataforma::count();

        //Ultimos 3 videojuegos agregados
        $videojuegosRecientes = Videojuego::with('plataformas')->latest()->limit(3)->get();

        return view('home', compact('totalVideojuegos', 'totalPlataformas', 'videojuegosRecientes'));
    }
}
