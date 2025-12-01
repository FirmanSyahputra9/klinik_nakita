<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\DokterJadwal;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDokterJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DokterJadwal $dokter)
    {
        $jadwals = $request->input('jadwals', []);

        foreach ($jadwals?? [] as $jadwalId => $data) {
            $isChecked = isset($data['aktif']); // checkbox dicentang atau tidak

            if (str_starts_with($jadwalId, 'new_')) {
                // jika jadwal baru, dan checkbox dicentang, buat baru
                if ($isChecked && !empty($data['mulai']) && !empty($data['selesai'])) {
                    DokterJadwal::create([
                        'dokter_id' => $request->dokterId,
                        'hari' => substr($jadwalId, 4), // ambil nama hari
                        'aktif_mulai' => $data['mulai'],
                        'aktif_selesai' => $data['selesai'],
                        'keterangan' => $data['keterangan'] ?? null,
                    ]);
                }
                // jika checkbox tidak dicentang atau jam kosong, abaikan saja
            } else {
                // jadwal existing
                $jadwal = DokterJadwal::find($jadwalId);
                if (!$jadwal) continue;

                if ($isChecked) {
                    // checkbox dicentang => update
                    $jadwal->update([
                        'aktif_mulai' => $data['mulai'],
                        'aktif_selesai' => $data['selesai'],
                        'keterangan' => $data['keterangan'] ?? null,
                    ]);
                } else {
                    // checkbox tidak dicentang => kosongkan jam saja
                    $jadwal->update([
                        'aktif_mulai' => null,
                        'aktif_selesai' => null,
                        'keterangan' => $data['keterangan'] ?? $jadwal->keterangan,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui');
    }








    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
