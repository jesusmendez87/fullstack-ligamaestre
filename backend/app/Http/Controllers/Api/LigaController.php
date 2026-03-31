<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Liga;

class LigaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Liga::all();
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request){
    $validated =  $request->validate([
        'nombre' => 'required|string|max:50',
        'deporte' => 'required|string|max:25',
        'temporada' => 'required|integer|min:11',
    ]);

      $liga = Liga::create($validated);
      return view('liga.exito', compact('liga')); }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Liga::findOrFail($id);
    }


    public function create() {
    return view('liga.exito');
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $liga = Liga::findOrFail($id);
        $liga->update($request->all());
        return response()->json($liga, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Liga::destroy($id);
        return response()->json(null, 204);
    }
}
