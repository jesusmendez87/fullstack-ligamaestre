<?php

namespace Tests;

use App\Models\Jugador;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use  RefreshDatabase;

public function test_calculo_dorsal_valido()
{
    $jugador = new Jugador();

    $resultado = $jugador->esDorsalValido(10);

    $this->assertTrue($resultado);
}