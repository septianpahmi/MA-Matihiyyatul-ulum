<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'user_id' => 3,
            'kelas' => 'A',
            'gender' => 'Perempuan',
            'tempat_lahir' => 'Cianjur',
            'tanggal_lahir' => '2000-01-01'
        ]);
    }
}
