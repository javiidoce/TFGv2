<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FechasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fechas')->insert([
            'id' => 1,
            'Tipo' => 0,
            'Dia' => '2024-04-19',
            'Inicio' => '19:00',
            'Final' => '21:00',
            'equipo_id' => 1,
        ]);

        DB::table('fechas')->insert([
            'id' => 2,
            'Tipo' => 1,
            'Dia' => '2024-04-21',
            'Inicio' => '16:00',
            'equipo_id' => 1,
        ]);
    }
}
