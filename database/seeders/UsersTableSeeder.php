<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Dummy',
            'email' => 'dummy@gmail.com',
            'password' => '$2y$10$92fmQUUevX6ApkiX2lDgJOXnevI8hObvM1SclqW4M2O1CFk3gQJjW', //prueba0101
        ]);
    }
}
