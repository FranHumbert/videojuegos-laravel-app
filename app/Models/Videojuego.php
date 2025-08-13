<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    protected $table = 'videojuegos';

    protected $fillable = [
        'titulo',
        'año_lanzamiento',
        'genero'
    ];

    protected $dates = [
        'año_lanzamiento'
    ];

    public function plataformas() {
        return $this->belongsToMany(Plataforma::class, 'videojuego_plataforma', 'id_videojuego', 'id_plataforma');
    }
}
