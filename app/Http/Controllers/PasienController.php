<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PasienController extends Controller
{
    public function show($id)
{
    $pasien = (object) [
        'id' => $id,
        'nama' => 'Nama Pasien',
        'jenis_kelamin' => 'L',
        'usia' => 25,
        'gol_darah' => 'O',
        'tanggal_lahir' => '9 Agustus 2004',
        'alamat' => "Jl. Contoh No. 10",
        'no_telepon' => '08123456789',
        'email' => 'pasien@example.com',
        'nik' => '12710308000402',
        'created_at' => Carbon::parse("2024-11-09"),
    ];

    return view('pages.admin.detail-pasien', compact('pasien'));
}

}
