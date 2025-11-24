<?php

namespace App\Http\Controllers;

use App\Models\PemeriksaanLaboratorium;
use Illuminate\Http\Request;

class PemeriksaanLaboratoriumController extends Controller
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
        $validated = $request->validate([
            'antrian_id'            => 'required|integer|exists:antrians,id',
            'jenis_pemeriksaan_id'  => 'required|integer|exists:jenis_pemeriksaans,id',
            'nilai'                 => 'nullable|string',
            'catatan'               => 'nullable|string',
        ]);

        $existing = PemeriksaanLaboratorium::where('antrian_id', $validated['antrian_id'])
            ->where('jenis_pemeriksaan_id', $validated['jenis_pemeriksaan_id'])
            ->first();

        if ($existing) {
            $existing->update([
                'nilai'   => $validated['nilai'],
                'catatan' => $validated['catatan'],
            ]);

            return back()->with('success', 'Nilai pemeriksaan berhasil diperbarui.');
        }

        PemeriksaanLaboratorium::create([
            'antrian_id'           => $validated['antrian_id'],
            'jenis_pemeriksaan_id' => $validated['jenis_pemeriksaan_id'],
            'nilai'                => $validated['nilai'],
            'catatan'              => $validated['catatan'],
            'status'               => 1 ,
        ]);

        return back()->with('success', 'Nilai pemeriksaan berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(PemeriksaanLaboratorium $pemeriksaanLaboratorium)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemeriksaanLaboratorium $pemeriksaanLaboratorium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PemeriksaanLaboratorium $pemeriksaanLaboratorium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemeriksaanLaboratorium $pemeriksaanLaboratorium)
    {
        //
    }
}
