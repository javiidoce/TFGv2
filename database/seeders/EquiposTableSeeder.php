<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipos')->insert([
            'id' => 1,
            'Nombre' => 'Real Zaragoza',
            'Categoria' => 'Segunda división española',
            'user_id' => 1,
        ]);
    }
}
