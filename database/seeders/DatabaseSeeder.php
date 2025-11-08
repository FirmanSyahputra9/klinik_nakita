<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'TSAdmin',
            'phone' => '(+62) 81234567890',
            'email' => 'super@example.com',
            'gender' => 'male',
            'birth_date' => '2000-01-01',
            'role' => 'superadmin',
            'approved' => true,
            'approved_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'TAdmin',
            'email' => 'admin@example.com',
            'phone' => '(+62) 8123456789',
            'gender' => 'male',
            'birth_date' => '2000-01-01',
            'role' => 'admin',
            'approved' => true,
            'approved_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Dokter',
            'username' => 'TDokter',
            'email' => 'dokter@example.com',
            'phone' => '(+62) 812345678912',
            'birth_date' => '2000-01-01',
            'gender' => 'male',
            'role' => 'doctor',
            'approved' => true,
            'approved_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'User',
            'username' => 'TUser',
            'email' => 'user@example.com',
            'phone' => '(+62) 812345678913',
            'birth_date' => '2000-01-01',
            'gender' => 'male',
            'role' => 'user',
            'approved' => true,
            'approved_at' => now(),
        ]);

        User::factory(2)->create();

    }
}
