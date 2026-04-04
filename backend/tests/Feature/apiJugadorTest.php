<?php
use App\Models\Jugador;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiJugadorTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_responde_correctamente()
    {
        $response = $this->getJson('/api/jugadores');

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

    public function testDestroyJugador()
    {
        $jugador = Jugador::factory()->create();

        $response = $this->delete("/api/jugadores/{$jugador->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('jugadors', ['id' => $jugador->id]);
    }
}
