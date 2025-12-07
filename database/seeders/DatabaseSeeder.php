<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Admin;
use App\Models\DokterAktif;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $superadmin = User::factory()->create([
            'username'    => 'superadmin',
            'email'       => 'superadmin@example.com',
            'role'        => 'superadmin',
            'approved'    => true,
            'approved_at' => now(),
            'password'    => Hash::make('password'),
        ]);

        Admin::factory()->create([
            'user_id' => $superadmin->id,
        ]);

        $admin = User::factory()->create([
            'username'    => 'admin',
            'email'       => 'admin@example.com',
            'role'        => 'admin',
            'approved'    => true,
            'approved_at' => now(),
            'password'    => Hash::make('password'),
        ]);

        Admin::factory()->create([
            'user_id' => $admin->id,
        ]);

        // Dokter pasti
        $dokterAdit = User::factory()->create([
            'username'    => 'Adit Muhammad Prasetya Hutagalung',
            'email'       => 'sewaalkesmedan@gmail.com',
            'role'        => 'doctor',
            'approved'    => true,
            'approved_at' => now(),
            'password'    => Hash::make('doktersatu'),
        ]);

        Dokter::factory()->create([
            'user_id'      => $dokterAdit->id,
            'name'         => 'dr. Adit Muhammad Prasetya Hutagalung',
            'alamat'       => 'Jl. Kemenyan Raya No. 82 P. Simalingkar',
            'spesialisasi' => 'Dokter Umum',
            'phone'        => '08116150141',
            'nik'          => '1271070719040000',
        ]);

        DokterAktif::create([
            'dokter_id' => $dokterAdit->dokter->id,
            'aktif'     => true,
        ]);


        $doctorUser = User::factory()->create([
            'username'    => 'doctor',
            'email'       => 'dokter@example.com',
            'role'        => 'doctor',
            'approved'    => true,
            'approved_at' => now(),
            'password'    => Hash::make('password'),
        ]);

        $dokterUtama = Dokter::factory()->create([
            'user_id' => $doctorUser->id,
        ]);

        DokterAktif::create([
            'dokter_id' => $dokterUtama->id,
            'aktif'     => true,
        ]);

        $userUtama = User::factory()->create([
            'username'    => 'user',
            'email'       => 'user@example.com',
            'role'        => 'user',
            'approved'    => true,
            'approved_at' => now(),
            'password'    => Hash::make('password'),
        ]);

        Pasien::factory()->create([
            'user_id' => $userUtama->id,
        ]);

        $users = User::factory(30)->create();

        foreach ($users ?? [] as $user) {
            switch ($user->role) {
                case 'user':
                    Pasien::factory()->create(['user_id' => $user->id]);
                    break;

                // case 'doctor':
                //     $dokter = Dokter::factory()->create(['user_id' => $user->id]);
                //     DokterAktif::create([
                //         'dokter_id' => $dokter->id,
                //         'aktif'     => false,
                //     ]);
                //     break;

                case 'admin':
                case 'superadmin':
                    Admin::factory()->create(['user_id' => $user->id]);
                    break;
            }
        }

        $this->call([
            ObatSeeder::class,
            DokterJadwalSeeder::class,
        ]);
    }
}
