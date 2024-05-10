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
        // Jugadores históricos del Manchester United
        DB::table('jugadores')->insert([
            'Nombre' => 'George Best',
            'Dorsal' => 7,
            'Posicion' => 'DEL',
            'Minutos' => 5000,
            'Amarillas' => 10,
            'Rojas' => 2,
            'Goles' => 15,
            'Asistencias' => 8,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Bobby Charlton',
            'Dorsal' => 9,
            'Posicion' => 'MC',
            'Minutos' => 5200,
            'Amarillas' => 12,
            'Rojas' => 1,
            'Goles' => 10,
            'Asistencias' => 5,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Eric Cantona',
            'Dorsal' => 10,
            'Posicion' => 'DEL',
            'Minutos' => 4500,
            'Amarillas' => 8,
            'Rojas' => 3,
            'Goles' => 18,
            'Asistencias' => 12,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Ryan Giggs',
            'Dorsal' => 11,
            'Posicion' => 'MC',
            'Minutos' => 5800,
            'Amarillas' => 15,
            'Rojas' => 0,
            'Goles' => 8,
            'Asistencias' => 10,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'David Beckham',
            'Dorsal' => 10,
            'Posicion' => 'MC',
            'Minutos' => 5300,
            'Amarillas' => 13,
            'Rojas' => 2,
            'Goles' => 22,
            'Asistencias' => 18,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Cristiano Ronaldo',
            'Dorsal' => 17,
            'Posicion' => 'DEL',
            'Minutos' => 4000,
            'Amarillas' => 5,
            'Rojas' => 0,
            'Goles' => 30,
            'Asistencias' => 20,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Paul Scholes',
            'Dorsal' => 8,
            'Posicion' => 'MC',
            'Minutos' => 5100,
            'Amarillas' => 11,
            'Rojas' => 1,
            'Goles' => 12,
            'Asistencias' => 15,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Gary Neville',
            'Dorsal' => 2,
            'Posicion' => 'DEF',
            'Minutos' => 5200,
            'Amarillas' => 9,
            'Rojas' => 0,
            'Goles' => 1,
            'Asistencias' => 4,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Roy Keane',
            'Dorsal' => 16,
            'Posicion' => 'MC',
            'Minutos' => 4900,
            'Amarillas' => 14,
            'Rojas' => 3,
            'Goles' => 7,
            'Asistencias' => 10,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Rio Ferdinand',
            'Dorsal' => 5,
            'Posicion' => 'DEF',
            'Minutos' => 5500,
            'Amarillas' => 10,
            'Rojas' => 1,
            'Goles' => 3,
            'Asistencias' => 8,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Peter Schmeichel',
            'Dorsal' => 1,
            'Posicion' => 'POR',
            'Minutos' => 4900,
            'Amarillas' => 6,
            'Rojas' => 0,
            'Goles' => 0,
            'Asistencias' => 2,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Denis Law',
            'Dorsal' => 20,
            'Posicion' => 'DEL',
            'Minutos' => 4200,
            'Amarillas' => 7,
            'Rojas' => 1,
            'Goles' => 25,
            'Asistencias' => 15,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Nobby Stiles',
            'Dorsal' => 26,
            'Posicion' => 'DEF',
            'Minutos' => 4800,
            'Amarillas' => 10,
            'Rojas' => 2,
            'Goles' => 2,
            'Asistencias' => 5,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Steve Bruce',
            'Dorsal' => 6,
            'Posicion' => 'DEF',
            'Minutos' => 4600,
            'Amarillas' => 8,
            'Rojas' => 1,
            'Goles' => 5,
            'Asistencias' => 3,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Mark Hughes',
            'Dorsal' => 62,
            'Posicion' => 'DEL',
            'Minutos' => 4800,
            'Amarillas' => 9,
            'Rojas' => 1,
            'Goles' => 20,
            'Asistencias' => 10,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Dwight Yorke',
            'Dorsal' => 19,
            'Posicion' => 'DEL',
            'Minutos' => 4200,
            'Amarillas' => 6,
            'Rojas' => 0,
            'Goles' => 18,
            'Asistencias' => 12,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Andy Cole',
            'Dorsal' => 23,
            'Posicion' => 'DEL',
            'Minutos' => 4700,
            'Amarillas' => 7,
            'Rojas' => 1,
            'Goles' => 23,
            'Asistencias' => 15,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Gary Pallister',
            'Dorsal' => 3,
            'Posicion' => 'DEF',
            'Minutos' => 4900,
            'Amarillas' => 9,
            'Rojas' => 1,
            'Goles' => 4,
            'Asistencias' => 6,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Norman Whiteside',
            'Dorsal' => 16,
            'Posicion' => 'MC',
            'Minutos' => 4400,
            'Amarillas' => 6,
            'Rojas' => 1,
            'Goles' => 15,
            'Asistencias' => 10,
            'equipo_id' => 1,
        ]);

        DB::table('jugadores')->insert([
            'Nombre' => 'Ole Gunnar Solskjær',
            'Dorsal' => 21,
            'Posicion' => 'DEL',
            'Minutos' => 3800,
            'Amarillas' => 5,
            'Rojas' => 0,
            'Goles' => 20,
            'Asistencias' => 8,
            'equipo_id' => 1,
        ]);
    }
}
