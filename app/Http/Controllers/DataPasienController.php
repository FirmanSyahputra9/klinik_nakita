<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\DataPasien;
use App\Models\Dokter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokterId = Dokter::where('user_id', Auth::id())->value('id');
        $antrian = Antrian::where('status', true)->with(['pasien', 'dokter', 'registrasi'])
            ->where('dokter_id', $dokterId)
            ->get()
            ->map(function ($item) {
                $item->pasien->umur = Carbon::parse($item->pasien->birth_date)->age;
                $item->pasien->gender_label = $item->pasien->gender == 'female' ? 'Perempuan' : 'Laki-laki';

                if ($item->registrasi->tanggal_kunjungan) {
                    $item->registrasi->tanggal_kunjungan = Carbon::parse($item->registrasi->tanggal_kunjungan)->locale('id')->translatedFormat('d F Y');
                }

                return $item;
            });


        return view('pages.dokter.data', compact('antrian'));
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
    public function show(DataPasien $dataPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPasien $dataPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPasien $dataPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPasien $dataPasien)
    {
        //
    }
}
