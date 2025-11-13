<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\DokterAktif;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DokterAktif>
 */
class DokterAktifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DokterAktif::class;

    public function definition(): array
    {
        return [
            'dokter_id' => Dokter::factory(),
            'aktif' => $this->faker->boolean(50),
        ];
    }
}
