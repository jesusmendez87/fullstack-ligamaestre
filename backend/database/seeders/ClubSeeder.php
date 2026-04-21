<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    public function run(): void
    {
        Club::insert([
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
