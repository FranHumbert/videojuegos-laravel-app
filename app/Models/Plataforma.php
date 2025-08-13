<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    protected $table = 'plataformas';

    protected $fillable = [
        'nombre',
        'fabricamte'
    ];

    //relacion de muchos a muchos con videojuego
    public function videojuegos() {
        return $this->belongsToMany(Videojuego::class, 'videojuego_plataforma', 'id_plataforma', 'id_videojuego');
    }
}
