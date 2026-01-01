<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\DataUmumPasien;
use App\Models\JenisPemeriksaan;
use App\Models\Pasien;
use App\Models\Registrasi;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

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
        $antrian = Antrian::with('alergi', 'data_pemeriksaan', 'tindakan', 'lab', 'nilai_du.dataUmumPasien')->find($id);

        if (!$antrian) {
            return view('pages.dokter.data')->with('error', 'Antrian tidak ditemukan');
        }

        $data = Registrasi::where('id', $antrian->registrasi_id)
            ->with(['dokters', 'pasiens', 'dokter_jadwals'])
            ->first();

        if ($data) {
            if ($data->pasiens->created_at) {
                $data->pasiens->create_at = Carbon::parse($data->pasiens->created_at)->translatedFormat('d F Y');
            }
            if ($data->pasiens->gender) {
                $data->pasiens->gender_label = $data->pasiens->gender == 'female' ? 'Perempuan' : 'Laki-laki';
            }
            if ($data->pasiens->birth_date) {
                $data->pasiens->birth_date_formatted = Carbon::parse($data->pasiens->birth_date)->translatedFormat('d F Y');
                $data->pasiens->umur = Carbon::parse($data->pasiens->birth_date)->age;
            }
        }

        $jenisPemeriksaans = JenisPemeriksaan::all();

        return view('pages.dokter.tindakan-pasien', compact('data', 'antrian', 'jenisPemeriksaans'))->with('refresh', true);
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
