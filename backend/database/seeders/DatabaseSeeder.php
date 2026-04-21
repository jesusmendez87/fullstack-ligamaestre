<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\clubes;
use Database\Seeders\ligas;
use Database\Seeders\jugadores;
use Database\Seeders\partidos;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            clubs::class,
            ligas::class,
            jugadors::class,
            partidos::class,
        ]);

    }
}
