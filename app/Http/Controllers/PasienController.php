<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

        return view('pages.dokter.tindakan-pasien', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        //
    }
}
