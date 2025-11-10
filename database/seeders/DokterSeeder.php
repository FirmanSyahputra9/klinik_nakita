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
            'nama_lengkap' => 'Adit Muhammad Prasetya Hutagalung, MKM',
            'spesialisasi' => 'Dokter Umum',
            'no_telepon' => '08116150141',
            'email' => 'amphutagalung@gmail.com',
            'status' => 'aktif',
        ]);
        Dokter::factory(10)->create();
    }
}
