<?php

namespace Database\Seeders;

use App\Models\DataUmumPasien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataUmumPasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataUmumPasien::create([
            'nama_du' => 'Tekanan Darah',
            'satuan' => 'mmHg',
        ]);

        DataUmumPasien::create([
            'nama_du' => 'Nadi',
            'satuan' => 'x/menit',
        ]);

        DataUmumPasien::create([
            'nama_du' => 'Suhu Tubuh',
            'satuan' => '°C',
        ]);

        DataUmumPasien::create([
            'nama_du' => 'Respirasi',
            'satuan' => 'x/menit',
        ]);

        DataUmumPasien::create([
            'nama_du' => 'Berat Badan',
            'satuan' => 'kg',
        ]);

        DataUmumPasien::create([
            'nama_du' => 'Tinggi Badan',
            'satuan' => 'cm',
        ]);

        DataUmumPasien::create([
            'nama_du' => 'Kesadaran',
            'satuan' => '-',
        ]);

        DataUmumPasien::create([
            'nama_du' => 'Keadaan Umum',
            'satuan' => '-',
        ]);
    }
}
