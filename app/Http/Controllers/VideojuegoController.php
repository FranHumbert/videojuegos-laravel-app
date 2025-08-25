<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use App\Models\Plataforma;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videojuegos = Videojuego::with('plataformas')->paginate(10);
        return view('videojuegos.index', compact('videojuegos')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plataformas = Plataforma::all();
        return view('videojuegos.create', compact('plataformas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'titulo' => 'required|string|max:150',
           'año_lanzamiento' => 'required|date',
           'genero' => 'required|string|max:150',
           'plataformas' => 'array|exists:plataformas,id' 
        ]);

        //Crear el videojuego
        $videojuego = Videojuego::create([
            'titulo' => $validated['titulo'],
            'año_lanzamiento' => $validated['año_lanzamiento'],
            'genero' => $validated['genero']
        ]);

        //Asociar plataformas si se seleccionaron
        if (isset($validated['plataformas'])) {
            $videojuego->plataformas()->attach($validated['plataformas']);
        }

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        $videojuego->load('plataformas');
        return view('videojuegos.show', compact('videojuego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        $plataformas = Plataforma::all();
        $videojuego->load('plataformas');
        return view('videojuegos.edit', compact('videojuego', 'plataformas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {
        //Mismas validaciones que el metodo store
        $validated = $request->validate([
            'titulo' => 'required|string|max:150',
            'año_lanzamiento' => 'required|date',
            'genero' => 'required|string|max:150',
            'plataformas' => 'array|exists:plataformas,id' 
         ]);

         //Actualizar datos del videojuego
         $videojuego->update([
            'titulo' => $validated['titulo'],
            'año_lanzamiento' => $validated['año_lanzamiento'],
            'genero' => $validated['genero']
        ]);

        //Sincornizar plataformas (elimina las que no estan y agrega las nuevas)
        if (isset($validated['plataformas'])) {
            $videojuego->plataformas()->sync($validated['plataformas']);
        } else {
            $videojuego->plataformas()->detach();
        }

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->plataformas()->detach();  //Eliminar relaciones primero de la tabla pivot
        $videojuego->delete();
        return redirect()->route('videojuegos.index')->with('success', 'Videojuego eliminado con exito');
    }
}
