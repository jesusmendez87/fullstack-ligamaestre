<?php
use App\Models\Jugador;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

it('returns a successful response', function () {
    $response = $this->get('/api/jugadores');

    $response->assertStatus(200);
});


it('muestra el jugador id 1', function () {


    $jugador1 = Jugador::factory()->create([
        'id' => 1,
    ]);

    $jugador2 = Jugador::factory()->create([
        'id' => 2
    ]);

    $id = 1;
    $response = $this->get("/api/jugadores/{$id}");

    $response->assertJson([
    'id' => $jugador1->id,
    'nombre' => $jugador1->nombre
]);
});
