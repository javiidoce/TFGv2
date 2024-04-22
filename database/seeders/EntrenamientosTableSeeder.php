<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrenamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('entrenamientos')->insert([
            'Ejercicios' => 'Burpees, 10 vueltas al campo, dribbling con conos, tiro a puerta.',
            'fecha_id' => 1,
        ]);
    }
}
