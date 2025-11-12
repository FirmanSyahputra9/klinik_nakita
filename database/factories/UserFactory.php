<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'show' => true,
            'username' => $faker->unique()->userName(),
            'email' => $faker->unique()->safeEmail(),
            'role' => $faker->randomElement(['user', 'doctor', 'admin']),
            'approved' => $faker->boolean(80),
            'approved_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
