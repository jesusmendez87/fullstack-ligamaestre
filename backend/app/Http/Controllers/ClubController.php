<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();
        return view('club.nuevoclub', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('club.nuevoclub'); // usar la misma vista
    }

    /**
     * save new club
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'ciudad' => 'required|string|max:25',
            'categoria' => 'required|string|max:10',
        ]);

        $club = Club::create($validated);
       return redirect()->route('club.exito')
                        ->with('club_nombre', $club->nombre); // pasar el nombre del club
    }

    /**
     * show form to edit club
     */
    public function edit(Club $club)
    {
        return view('club.nuevoclub', compact('club')); // reutilizamos la vista
    }

    /**
     * Update existing club
     */
    public function update(Request $request, Club $club)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'ciudad' => 'required|string|max:25',
            'categoria' => 'required|string|max:10',
        ]);

        $club->update($validated);

        return redirect()->route('club.exito')
                        ->with('club_nombre', $club->nombre); // pasar el nombre del club para vista

    }

    /**
     * delete club
     */
    public function destroy(Club $club)
    {
        $club->delete();

        return redirect()->route('club.exito')
                         ->with('success', 'Club eliminado correctamente');
    }
}
