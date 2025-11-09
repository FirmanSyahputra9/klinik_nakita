<?php

namespace Database\Factories;

use App\Models\Obat;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{

    protected $model = Obat::class;


    public function definition(): array
    {

        $faker = \Faker\Factory::create('id_ID');
        $kode = $faker->unique()->lexify('OBT???');
        return [
            'kode' => strtoupper($kode),
            'nama' => $faker->randomElement([
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
