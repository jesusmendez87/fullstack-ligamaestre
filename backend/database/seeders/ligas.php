<?php

namespace Database\Seeders;

use App\Models\Liga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ligas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Liga::create([
            'nombre' => 'La Liga',
            'deporte' => 'Futbol',
            'temporada' => '2025/2026',
        ]);
    }
}
