<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partido;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
     $partidos = Partido::all();
    return response()->json($partidos);
}

    public function create()
    {
        return view('partido.exit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'local_id' => 'required|exists:clubs,id|numeric',
            'artbitro_id' => 'required|exists:clubs,id|numeric',
            'liga_id' => 'required|exists:ligas,id|max:10',
            'fecha' => 'required|date',
            'resultado' => 'nullable|string|max:10',
        ]);

        $partido = Partido::create($validated);

        return redirect()->route('partidos.index')
                         ->with('success', 'Partido creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Partido::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('partido.edit', ['partido' => Partido::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return Partido::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Partido::findOrFail($id)->delete();
    }
}
