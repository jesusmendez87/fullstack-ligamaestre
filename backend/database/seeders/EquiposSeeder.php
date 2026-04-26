<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;

class EquiposSeeder extends Seeder
{
    public function run(): void
    {
        Equipo::insert([
            [
                'name' => 'fp automocion',
                'city' => 'ciudad real',
                'category' => 'Primera',
                'sport' => 'Fútbol',
                'players' => [],
            ],
            [
                'name' => 'Fp automocion',
                'city' => 'puertollano',
                'category' => 'Primera',
                'sport' => 'Fútbol',
                'players' => [],
            ],
            [
                'name' => 'Atlético de Madrid',
                'city' => 'Madrid',
                'category' => 'Primera',
                'sport' => 'Fútbol',
                'players' => [],
            ],
        ]);
    }
}
