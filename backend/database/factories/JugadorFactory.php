<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Club;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jugador>
 */
class JugadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                    'nombre' => fake()->name(),
                    'posicion' => fake()->randomElement(['Portero', 'Defensa', 'Centrocampista', 'Delantero']),
                    'dorsal' => fake()->numberBetween(1, 99),
                    'name' => EquipoFactory::factory(),
    ];

            }
}
