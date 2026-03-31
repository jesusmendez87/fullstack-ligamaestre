<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;

class clubes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::create([
            'nombre' => '1 DAW',
            'ciudad' => 'Ciudad Real',
            'categoria' => '1ª Division',
        ]);




        Club::create([
            'nombre' => '2 DAW',
            'ciudad' => 'Alcazar de San Juan',
            'categoria' => '1ª Division',
        ]);

        Club::create([
            'nombre' => '1 ASIR',
            'ciudad' => 'Valdepeñas',
            'categoria' => '2ª Division',
        ]);

        Club::create([
            'nombre' => '2 ASIR',
            'ciudad' => 'Manzanares',
            'categoria' => '2ª Division',
        ]);
    }
}
