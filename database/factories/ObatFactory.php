<?php

namespace Database\Factories;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{

    protected $model = Obat::class;


    public function definition(): array
    {

        $faker = \Faker\Factory::create('id_ID');
        $kode = 'OBT' . strtoupper(Str::random(3)) . $faker->randomNumber(3, true);
        return [
            // pastikan kode selalu unik
            'kode' => $kode,

            // tambahkan ->unique() di nama juga biar tidak dobel
            'nama' => $faker->unique()->randomElement([
                'Paracetamol',
                'Amoxicillin',
                'Ibuprofen',
                'Cetirizine',
                'Vitamin C',
                'Ranitidine',
                'Simvastatin',
                'Metformin',
                'Amlodipine',
                'Omeprazole',
                'Captopril',
                'Antasida DOEN',
                'Salbutamol',
                'Hydrocortisone',
                'Azithromycin',
                'Diazepam',
                'Chlorpheniramine',
                'Loperamide',
                'Diclofenac',
                'Prednisone'
            ]),

            'stok' => $faker->numberBetween(10, 200),
            'satuan' => $faker->randomElement(['Strip', 'Box', 'Botol', 'Tube', 'Tablet', 'Kapsul', 'Pcs']),
            'harga_beli' => $faker->randomFloat(2, 1000, 50000),
            'harga_jual' => function (array $attributes) use ($faker) {
                return $attributes['harga_beli'] + $faker->randomFloat(2, 500, 20000);
            },
            'tanggal_kadaluwarsa' => $faker->dateTimeBetween('now', '+2 years'),
            'deskripsi' => $faker->sentence(),
        ];
    }
}
