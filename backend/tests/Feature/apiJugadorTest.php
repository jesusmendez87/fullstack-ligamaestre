<?php

use App\Http\Middleware\ApiTokenAuth;
use App\Models\Jugador;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiJugadorTest extends TestCase
{
    use DatabaseTransactions;

    public function test_api_responde_correctamente() // Prueba para verificar que la API responde correctamente
    {
        $this->withoutExceptionHandling();
        $user = Jugador::factory()->create();
        $user->api_token = 'test_token_' . $user->id;
        $user->save();
        $token = $user->api_token;

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->getJson('/api/jugadores');

        $response->assertStatus(200);
    }

    public function testMuestraElJugadorId1() // Prueba para mostrar el jugador con ID 1 mokeado
    {
        $this->withoutExceptionHandling();

        $user = Jugador::factory()->create();
        $user->api_token = 'test_token_' . $user->id;
        $user->save();
        $token = $user->api_token;

        $jugador = Jugador::factory()->create();

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->getJson("/api/jugadores/{$jugador->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'id' => $jugador->id,
                     'nombre' => $jugador->nombre
                 ]);
    }

    public function testDestroyJugador() // Prueba para eliminar un jugador
    {
        $this->withoutExceptionHandling();
        $user = Jugador::factory()->create();
        $user->api_token = 'test_token_' . $user->id;
        $user->save();
        $token = $user->api_token;

        $jugador = Jugador::factory()->create();

        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->deleteJson("/api/delete/jugadores/{$jugador->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('jugadors', ['id' => $jugador->id]);
    }
}
