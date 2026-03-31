<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Jugador::all();
    }

       public function create() {
            return view('jugadores.exito');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'nombre' => 'required|string|max:50',
            'posicion' => 'required|string|max:50',
            'dorsal' => 'required|integer|min:1|max:99',
            'club_id' => 'required|exists:clubs,id',
        ]);

          $jugador = Jugador::create($validated);
          return view('jugador.exito', compact('jugador'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Jugador::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->update($request->all());
        return response()->json($jugador, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jugador::destroy($id);
        return response()->json(null, 204);
    }
}
