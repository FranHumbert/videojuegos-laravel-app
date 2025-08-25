<?php

namespace App\Http\Controllers;


use App\Models\Plataforma;
use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $plataformas = Plataforma::withCount('videojuegos')->paginate(10);
       return view('plataformas.index', compact('plataformas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plataformas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:plataformas,nombre',
            'fabricante' => 'required|string|max:150'
        ]);

        Plataforma::create($validated);

        return redirect()->route('plataformas.index')->with('success', 'Plataforma creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plataforma $plataforma)
    {
        $plataforma->load('videojuegos');
        return view('plataformas.show', compact('plataforma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plataforma $plataforma)
    {
        return view('plataformas.edit', compact('plataforma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plataforma $plataforma)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:plataformas,nombre,' . $plataforma->id,
            'fabricante' => 'required|string|max:150'
        ]);

        $plataforma->update($validated);

        return redirect()->route('plataformas.index')->with('success', 'Plataforma actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plataforma $plataforma)
    {
        //Verificar si tiene videojuegos asociados
        if ($plataforma->videojuegos()->count() > 0) {
            return redirect()->route('plataformas.index')->with('error', 'No se puede eliminar la plataforma porque tiene videojuegos asociados');
        }

        $plataforma->delete();

        return redirect()->route('plataformas.index')->with('success', 'Plataforma eliminada con exito');
    }
}
