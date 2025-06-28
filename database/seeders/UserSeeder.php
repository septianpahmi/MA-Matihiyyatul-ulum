<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Moramu',
            'email' => 'admin@moramu.com',
            'role_id' => 1,
            'password' => bcrypt('12345678'),
            'password_plain' => '12345678',
        ]);
        User::create([
            'name' => 'Guru Moramu',
            'email' => 'guru@moramu.com',
            'role_id' => 2,
            'password' => bcrypt('12345678'),
            'password_plain' => '12345678',
        ]);
        User::create([
            'name' => 'Shafa',
            'nis' => '123456',
            'role_id' => 3,
            'password' => bcrypt('12345678'),
            'password_plain' => '12345678',
        ]);
    }
}
