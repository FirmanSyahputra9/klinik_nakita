<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\DokterJadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hariKerja = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        $dokters = Dokter::all();

        foreach ($dokters??[] as $dokter) {
            foreach ($hariKerja??[] as $hari) {
                DokterJadwal::create([
                    'dokter_id'     => $dokter->id,
                    'hari'          => $hari,
                    'aktif_mulai'   => fake()->randomElement(['08:00:00', '09:00:00', '10:00:00']),
                    'aktif_selesai' => fake()->randomElement(['15:00:00', '16:00:00', '17:00:00']),
                    'keterangan'    => fake()->randomElement(['Praktik rutin', 'Shift pagi', 'Shift sore']),
                ]);
            }
        }
    }
}
