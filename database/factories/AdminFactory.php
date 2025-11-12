<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');

        return [
            'name' => $faker->name(),
        ];
    }
}
