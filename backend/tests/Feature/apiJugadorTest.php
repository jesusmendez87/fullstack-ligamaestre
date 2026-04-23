<?php
use App\Models\Jugador;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use MongoDB\Laravel\Auth\User as AuthUser;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Tests\Unit\JugadorTest;

class ApiJugadorTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_responde_correctamente() // Prueba para verificar que la API responde correctamente
    {
                  $this->withoutExceptionHandling();
          $user = Jugador::factory()->create();
          $jugador = Jugador::factory()->create();
          $token = JWTAuth::fromUser($user);
        $response = $this->withHeader('Authorization', "Bearer $token")
                         ->getJson('/api/jugadores');


        $response->assertStatus(200);
    }



    public function testMuestraElJugadorId1() // Prueba para mostrar el jugador con ID 1 mokeado
    {
          $this->withoutExceptionHandling();

    $user = Jugador::factory()->create();
    $jugador = Jugador::factory()->create();

    $token = JWTAuth::fromUser($user);

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
          $jugador = Jugador::factory()->create();
          $token = JWTAuth::fromUser($user);

        $response = $this->withHeader('Authorization', "Bearer $token")
        ->deleteJson("/api/delete/jugadores/{$jugador->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('jugadors', ['id' => $jugador->id]);
    }
}
