<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'), 
        ]);
        $admin->addRole(1);

        $palestrante1 = User::create([
            'name' => 'Palestrante One',
            'email' => 'palestrante1@gmail.com',
            'password' => Hash::make('12345678'), 
        ]);
        $palestrante1->addRole(2);

        $participante1 = User::create([
            'name' => 'Participante One',
            'email' => 'participante1@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $participante1->addRole(3);
    }
}
