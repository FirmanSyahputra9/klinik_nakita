<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // SUPERADMIN
        User::factory()->create([
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'role' => 'superadmin',
            'approved' => true,
            'approved_at' => now(),
            'password' => bcrypt('password'),
        ]);

        // ADMIN
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'approved' => true,
            'approved_at' => now(),
            'password' => bcrypt('password'),
        ]);

        // DOCTOR
        User::factory()->create([
            'username' => 'doctor',
            'email' => 'doctor@example.com',
            'role' => 'doctor',
            'approved' => true,
            'approved_at' => now(),
            'password' => bcrypt('password'),
        ]);

        // USER
        User::factory()->create([
            'username' => 'user',
            'email' => 'user@example.com',
            'role' => 'user',
            'approved' => true,
            'approved_at' => now(),
            'password' => bcrypt('password'),
        ]);

        // USER + DATA PASIEN
        $users = User::factory(30)->create();
        foreach ($users as $user) {
            match ($user->role) {
                'user' => Pasien::factory()->create(['user_id' => $user->id]),
                'doctor' => Dokter::factory()->create(['user_id' => $user->id]),
                'admin' => Admin::factory()->create(['user_id' => $user->id]),
                default => null,
            };
        }

        $this->call([
            ObatSeeder::class,
        ]);
    }
}
