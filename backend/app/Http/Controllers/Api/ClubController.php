<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
    // GET /api/clubs
    public function index()
    {
        return response()->json(Club::all());
    }

    //  POST /api/clubs
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'city' => 'required|string|max:25',
            'category' => 'required|string|max:10',
            'sport' => 'required|string|max:50',
        ]);

        $club = Club::create($validated);

        return response()->json([
            'message' => 'Club creado correctamente',
            'club' => $club
        ], 201);
    }

    // GET /api/clubs/{id}
    public function show($id)
    {
        return response()->json(Club::find($id));
    }

    // PUT /api/clubs/{id}
    public function update(Request $request, $id)
    {
        $club = Club::find($id);

        $club->update($request->all());

        return response()->json([
            'message' => 'Club actualizado',
            'club' => $club
        ]);
    }

    //   DELETE /api/clubs/{id}
    public function destroy($id)
    {
        Club::destroy($id);

        return response()->json([
            'message' => 'Club eliminado'
        ]);
    }
}
