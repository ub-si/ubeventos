<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'title' => 'Administrador'],
            ['id' => 2, 'title' => 'Palestrante'],
            ['id' => 3, 'title' => 'Participante'],
        ]);
    }
}
