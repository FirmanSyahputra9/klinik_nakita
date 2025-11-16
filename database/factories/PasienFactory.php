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

        $last = \App\Models\Pasien::max('no_rm');
        if (!$last) {
            $nextNumber = 1;
        } else {
            $lastNumber = intval(substr($last, 2));
            $nextNumber = $lastNumber + 1;
        }

        $newRm = 'RM' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        return [
            'name' => $faker->name(),
            'no_rm' => $newRm,
            'gol_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
            'alamat' => $faker->address(),
            'nik' => $faker->unique()->nik(),
            'birth_date' => $faker->date(),
            'gender' => $faker->randomElement(['male', 'female']),
            'phone' => $faker->unique()->phoneNumber(),
        ];
    }
}
