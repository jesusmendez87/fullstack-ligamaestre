<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Jugador;

class JugadorTest extends TestCase
{
    public function test_model_puede_crearse()
    {
        $jugador = new Jugador([
            'nombre' => 'Juan',
            'posicion' => 'Delantero',
            'dorsal' => 9,
            'club_id' => 1
        ]);

        $this->assertEquals('Juan', $jugador->nombre);
        $this->assertEquals(9, $jugador->dorsal);
    }
}
