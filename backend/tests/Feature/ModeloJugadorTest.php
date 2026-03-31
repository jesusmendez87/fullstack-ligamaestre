<?php
use App\Models\Jugador;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('un jugador pertenece a un club', function () {

    $club = Club::factory()->create([
        'nombre' => 'Maestre de cva'
    ]);

    $jugador = Jugador::factory()->create([
        'club_id' => $club->id
    ]);

    expect($jugador->club)->not->toBeNull();
    expect($jugador->club->id)->toBe($club->id);
    expect($jugador->club->nombre)->toBe('Maestre de cva');
});
