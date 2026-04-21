<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugador;

use function Pest\Laravel\json;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Jugador::all();
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'username' => 'required|string|max:50',
            'password' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'rol' => 'required|string|in:arbitro,jugador',

        ]);

          $jugador = Jugador::create($validated);
          return response()->json($jugador, 201);    }

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
