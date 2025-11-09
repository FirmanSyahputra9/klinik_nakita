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
            'spesialisasi' => $faker->jobTitle,
            'no_telepon' => $faker->phoneNumber,
            'email' => $faker->email,
            'status' => $faker->randomElement(['aktif', 'tidak aktif']),
        ];
    }
}
