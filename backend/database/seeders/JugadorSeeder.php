<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jugador;
use Illuminate\Support\Facades\Hash;

class JugadorSeeder extends Seeder
{
    public function run(): void
    {
        Jugador::create([
            'username' => 'amarquez',
            'password' => Hash::make('password123'),
            'nombre' => 'Antonio Marquez',
            'posicion' => 'Delantero',
            'dorsal' => 10,
            'club_id' => '69dd30d340fb174b070ae692',
            'rol' => 'jugador',
        ]);

        Jugador::create([
            'username' => 'jlopez',
            'password' => Hash::make('password123'),
            'nombre' => 'Juan Lopez',
            'posicion' => 'Portero',
            'dorsal' => 1,
            'club_id' => '69dd30d340fb174b070ae692',
            'rol' => 'jugador',
        ]);

        Jugador::create([
            'username' => 'mangel',
            'password' => Hash::make('password123'),
            'nombre' => 'Miguel Angel',
            'posicion' => 'Defensa',
            'dorsal' => 4,
            'club_id' => '69dd30d340fb174b070ae693',
            'rol' => 'jugador',
        ]);

        Jugador::create([
            'username' => 'cruiz',
            'password' => Hash::make('password123'),
            'nombre' => 'Carlos Ruiz',
            'posicion' => 'Centrocampista',
            'dorsal' => 8,
            'club_id' => '69dd30d340fb174b070ae693',
            'rol' => 'jugador',
        ]);

                Jugador::create([
            'username' => 'pepe domingo',
            'password' => Hash::make('password123'),
            'nombre' => 'Pepe domingo Ruiz',
            'posicion' => 'arbitro',
            'dorsal' => 8,

            'rol' => 'arbitro',
        ]);

        Jugador::create([
            'username' => 'lfernandez',
            'password' => Hash::make('password123'),
            'nombre' => 'Luis Fernandez',
            'posicion' => 'Delantero',
            'dorsal' => 9,
            'club_id' => '69dd30d340fb174b070ae694',
            'rol' => 'jugador',
        ]);

        // Admin
        Jugador::create([
            'username' => 'admin',
            'password' => Hash::make('1234'),
            'nombre' => 'Administrador',
            'posicion' => null,
            'dorsal' => null,
            'club_id' => null,
            'rol' => 'admin',
        ]);
    }
}
