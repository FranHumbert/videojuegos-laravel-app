<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use App\Models\Plataforma;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return "Pagina principal";
    }
}
