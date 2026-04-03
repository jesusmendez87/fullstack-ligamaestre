<?php
use App\Models\Jugador;

use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Tests\TestCase;

class ApiJugadorTest  extends TestCase
{
    use MakesHttpRequests;


    public function testApiRespondeCorrectamente()
    {
        $response = $this->get('/api/jugadores');

        $response->assertStatus(200);
    }


    public function testMuestraElJugadorId1()
    {
        $jugador1 = Jugador::factory()->create([
            'id' => 1,
        ]);

        $id = 1;
        $response = $this->get("/api/jugadores/{$id}");

        $response->assertJson([
            'id' => $jugador1->id,
            'nombre' => $jugador1->nombre
        ]);
    }
}
