<?php

namespace App\Http\Controllers;

use App\Models\Alergi;
use App\Models\DataPemeriksaan;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPemeriksaanController extends Controller
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

        $isUpdate = false;
        $validated = $request->validate([
            'antrian_id' => 'required|integer|exists:antrians,id',
            'alergi' => 'nullable|string',
            'reaksi' => 'nullable|string',
            'diagnosis' => 'required|string',
            'nama_tindakan' => 'nullable|string',
            'jenis_tindakan' => 'nullable|string',
            'catatan_tindakan' => 'nullable|string',
        ]);

        $antrian_id = $validated['antrian_id'];

        DB::transaction(function () use ($validated, $antrian_id) {
            $alergi = Alergi::where('antrian_id', $antrian_id)->first();

            if ($alergi) {
                $alergi->update([
                    'alergi' => $validated['alergi'],
                    'reaksi' => $validated['reaksi'],
                ]);
                $isUpdate = true;
            } else {
                if (!empty($validated['alergi'])) {
                    Alergi::create([
                        'antrian_id' => $antrian_id,
                        'alergi'     => $validated['alergi'],
                        'reaksi'     => $validated['reaksi'],
                    ]);
                }
            }
            $tindakan = Tindakan::where('antrian_id', $antrian_id)->first();

            if ($tindakan) {
                $tindakan->update([
                    'nama_tindakan'  => $validated['nama_tindakan'],
                    'jenis_tindakan' => $validated['jenis_tindakan'],
                    'catatan'        => $validated['catatan_tindakan'],
                ]);
                $isUpdate = true;
            } else {
                if (!empty($validated['nama_tindakan'])) {
                    Tindakan::create([
                        'antrian_id'     => $antrian_id,
                        'nama_tindakan'  => $validated['nama_tindakan'],
                        'jenis_tindakan' => $validated['jenis_tindakan'],
                        'catatan'        => $validated['catatan_tindakan'],
                    ]);
                }
            }

            $pemeriksaan = DataPemeriksaan::where('antrian_id', $antrian_id)->first();

            if ($pemeriksaan) {
                $pemeriksaan->update([
                    'diagnosa' => $validated['diagnosis'],
                ]);
                $isUpdate = true;
            } else {
                DataPemeriksaan::create([
                    'antrian_id' => $antrian_id,
                    'diagnosa'   => $validated['diagnosis'],
                ]);
            }
        });
        $message = $isUpdate
            ? 'Data berhasil diperbarui.'
            : 'Data berhasil disimpan.';

        return redirect()->back()->with('success', $message);
    }





    /**
     * Display the specified resource.
     */
    public function show(DataPemeriksaan $dataPemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPemeriksaan $dataPemeriksaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPemeriksaan $dataPemeriksaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPemeriksaan $dataPemeriksaan)
    {
        //
    }
}
