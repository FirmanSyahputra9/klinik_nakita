<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        $name = $faker->name();
        $username = $faker->unique()->userName();
        $email = $faker->unique()->safeEmail();
        $nik = $faker->unique()->nik();

        return [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'birth_date' => $faker->date(),
            'role' => 'user',
            'nik' => $nik,
            'gender' => $faker->randomElement(['male', 'female']),
            'phone' => $faker->phoneNumber(),
            'approved' => $faker->boolean(80),
            'email_verified_at' => now(),
            'approved_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'password' => static::$password ??= \Illuminate\Support\Facades\Hash::make('password'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'two_factor_secret' => \Illuminate\Support\Str::random(10),
            'two_factor_recovery_codes' => \Illuminate\Support\Str::random(10),
            'two_factor_confirmed_at' => now(),
        ];
    }





    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the model does not have two-factor authentication configured.
     */
    public function withoutTwoFactor(): static
    {
        return $this->state(fn(array $attributes) => [
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ]);
    }

    /**
     * Indicate that the user is unapproved.
     */
    public function unapproved(): static
    {
        return $this->state(fn(array $attributes) => [
            'approved' => false,
        ]);
    }
}
