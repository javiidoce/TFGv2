<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JugadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jugadores')->insert([
            'Nombre' => 'Cristian Álvarez',
            'Dorsal' => 1,
            'Posicion' => 'POR',
            'Minutos' => 1054,
            'Amarillas' => 2,
            'Rojas' => 1,
            'Goles' => 0,
            'Asistencias' => 0,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Álvaro Ratón',
                'Dorsal' => 13,
                'Posicion' => 'POR',
                'Minutos' => 720,
                'Amarillas' => 0,
                'Rojas' => 0,
                'Goles' => 0,
                'Asistencias' => 0,
                'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Adrián González',
            'Dorsal' => 8,
            'Posicion' => 'DEF',
            'Minutos' => 950,
            'Amarillas' => 1,
            'Rojas' => 0,
            'Goles' => 3,
            'Asistencias' => 2,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Daniel Torres',
            'Dorsal' => 16,
            'Posicion' => 'DEF',
            'Minutos' => 680,
            'Amarillas' => 3,
            'Rojas' => 0,
            'Goles' => 0,
            'Asistencias' => 1,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Bertín',
            'Dorsal' => 20,
            'Posicion' => 'DEF',
            'Minutos' => 800,
            'Amarillas' => 2,
            'Rojas' => 0,
            'Goles' => 2,
            'Asistencias' => 1,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Bermejo',
            'Dorsal' => 14,
            'Posicion' => 'MC',
            'Minutos' => 1050,
            'Amarillas' => 2,
            'Rojas' => 0,
            'Goles' => 6,
            'Asistencias' => 3,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Francho',
            'Dorsal' => 3,
            'Posicion' => 'MC',
            'Minutos' => 780,
            'Amarillas' => 4,
            'Rojas' => 0,
            'Goles' => 1,
            'Asistencias' => 0,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Puche',
            'Dorsal' => 12,
            'Posicion' => 'MC',
            'Minutos' => 650,
            'Amarillas' => 1,
            'Rojas' => 0,
            'Goles' => 0,
            'Asistencias' => 2,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Narváez',
            'Dorsal' => 22,
            'Posicion' => 'DEL',
            'Minutos' => 830,
            'Amarillas' => 3,
            'Rojas' => 0,
            'Goles' => 4,
            'Asistencias' => 1,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Tebas',
            'Dorsal' => 19,
            'Posicion' => 'DEL',
            'Minutos' => 590,
            'Amarillas' => 2,
            'Rojas' => 0,
            'Goles' => 0,
            'Asistencias' => 3,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Delmás',
            'Dorsal' => 15,
            'Posicion' => 'DEL',
            'Minutos' => 970,
            'Amarillas' => 5,
            'Rojas' => 1,
            'Goles' => 1,
            'Asistencias' => 4,
            'equipo_id' => 1,
        ]);
    }
}
