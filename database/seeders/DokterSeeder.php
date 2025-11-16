<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Dokter::factory()->create([
            'name' => 'Adit Muhammad Prasetya Hutagalung, MKM',
            'nik' => '1234567890',
            'spesialisasi' => 'Dokter Umum',
            'no_telepon' => '08116150141',
            'email' => 'amphutagalung@gmail.com',
            'status' => 'aktif',
        ]);
    }
}
