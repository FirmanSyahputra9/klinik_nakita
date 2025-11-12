<?php

namespace Database\Factories;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class DokterFactory extends Factory
{

    protected $model = Dokter::class;


    public function definition(): array
    {

        $faker = \Faker\Factory::create('id_ID');


        return [
            'nama_lengkap' => $faker->name,
            'spesialisasi' => $faker->randomElement([
                'Dokter Umum',
                'Spesialis Anak',
                'Spesialis Kandungan',
                'Spesialis Penyakit Dalam',
                'Spesialis Bedah',
                'Spesialis Saraf',
                'Spesialis THT',
                'Spesialis Kulit dan Kelamin',
                'Spesialis Mata',
                'Spesialis Gigi',
                'Spesialis Jantung',
                'Spesialis Paru',
                'Spesialis Psikiatri',
            ]),
            'phone' => $faker->phoneNumber,
            'nik' => $faker->unique()->nik,
            'alamat' => $faker->address,
            'status' => $faker->randomElement(['aktif', 'tidak aktif']),
        ];
    }
}
