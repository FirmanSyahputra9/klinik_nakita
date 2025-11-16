<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Registrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pasien = User::whereHas('pasien')->with(['pasien'])->where('id', Auth::User()->id)->first();
        $dokter = Dokter::with(['jadwals', 'aktif'])->where('id', $id)->first();

        $dayOrder = ['Senin' => 1, 'Selasa' => 2, 'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6, 'Minggu' => 7];

        $sortedJadwals = $dokter->jadwals->sortBy(function ($jadwal) use ($dayOrder) {
            return $dayOrder[$jadwal->hari] ?? 99;
        });
        $groupedJadwals = $sortedJadwals->reduce(function ($carry, $item) {
            $mulai = $item->aktif_mulai->format('H:i');
            $selesai = $item->aktif_selesai->format('H:i');
            $signature = $mulai . ' - ' . $selesai;

            $lastGroup = end($carry);
            if ($lastGroup && $lastGroup['signature'] === $signature) {
                $carry[key($carry)]['hari_selesai'] = $item->hari;
            } else {
                $carry[] = [
                    'hari_mulai' => $item->hari,
                    'hari_selesai' => $item->hari,
                    'signature' => $signature,
                    'mulai' => $mulai,
                    'selesai' => $selesai,
                ];
            }

            return $carry;
        }, []);

        return view('pages.pasien.registrasi', compact('dokter', 'groupedJadwals', 'pasien'));
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
        $validated = $request->validate([
            'tanggal_kunjungan' => 'required|date',
            'jam_berobat' => 'required|date_format:H:i',
        ]);

        Registrasi::create(
            [
                'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
                'jam_berobat' => $validated['jam_berobat'],
                'keluhan' => $request->keluhan,
                'pasiens_id' => Auth::User()->id,
                'dokters_id' => $request->dokter_id,
            ]
        );

        return redirect()->route('jadwaldokter.index', $request->dokter_id)
            ->with('success', 'Registrasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Registrasi $registrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registrasi $registrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registrasi $registrasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registrasi $registrasi)
    {
        //
    }
}
