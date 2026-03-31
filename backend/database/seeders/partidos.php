<?php

namespace Database\Seeders;

use App\Models\Partido;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class partidos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partido::create([
            'liga_id' => 1,
            'club_Local_Id' => 1,
            'club_Visitante_Id' => 2,
            'fecha' => '2025-07-01 18:00:00',
            'resultado' => '2-1',
        ]);
        Partido::create([
            'liga_id' => 1,
            'club_Local_Id' => 3,
            'club_Visitante_Id' => 4,
            'fecha' => '2025-07-02 20:00:00',
            'resultado' => '0-0',
        ]);
    }
}
