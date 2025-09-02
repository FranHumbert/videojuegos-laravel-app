<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    protected $table = 'videojuegos';
    //use HasFactory;

    protected $fillable = [
        'titulo',
        'año_lanzamiento',
        'genero'
    ];

    protected $casts = [
        'año_lanzamiento' => 'datetime'
    ];

    public function plataformas() {
        return $this->belongsToMany(Plataforma::class, 'videojuego_plataforma', 'id_videojuego', 'id_plataforma');
    }
}
