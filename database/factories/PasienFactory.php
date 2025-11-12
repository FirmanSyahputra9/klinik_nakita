<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pasien;

class PasienFactory extends Factory
{
    protected $model = Pasien::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'name' => $faker->name(),
            'no_rm' => 'RM-' . strtoupper($faker->bothify('??###')),
            'gol_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
            'alamat' => $faker->address(),
            'nik' => $faker->unique()->nik(),
            'birth_date' => $faker->date(),
            'gender' => $faker->randomElement(['male', 'female']),
            'phone' => $faker->unique()->phoneNumber(),
        ];
    }
}
