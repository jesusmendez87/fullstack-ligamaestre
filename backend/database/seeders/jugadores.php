<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Schema\Blueprint;
use  \App\Models\Jugador;

class jugadores extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Jugador::create([
                'nombre' => 'Paco Pico',
                'posicion' => 'Delantero',
                'dorsal' => 10,
                'club_id' => 1,
            ]);

                        Jugador::create([
                'nombre' => 'Antonio Marquez',
                'posicion' => 'Delantero',
                'dorsal' => 10,
                'club_id' => 1,
            ]);

                        Jugador::create([
                'nombre' => 'Juan Lopez',
                'posicion' => 'Portero',
                'dorsal' => 10,
                'club_id' => 1,
            ]);
                    Jugador::create([
                'nombre' => 'Miguel Angel',
                'posicion' => 'Defensa',
                'dorsal' => 10,
                'club_id' => 2,
            ]);
                Jugador::create([
                'nombre' => 'Carlos Ruiz',
                'posicion' => 'Centrocampista',
                'dorsal' => 10,
                'club_id' => 2,
            ]);


            Jugador::create([
                'nombre' => 'Luis Fernandez',
                'posicion' => 'Delantero',
                'dorsal' => 10,
                'club_id' => 3,
            ]);
    }
}
