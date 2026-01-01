<?php

namespace App\Http\Controllers;

use App\Models\Alergi;
use App\Models\DataPemeriksaan;
use App\Models\Tindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataUmumPasien;
use App\Models\NilaiDataUmumPasien;


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


            'tekanan_darah' => 'nullable|string',
            'nadi'          => 'nullable|string',
            'suhu'          => 'nullable|string',
            'respirasi'     => 'nullable|string',
            'berat_badan'   => 'nullable|string',
            'tinggi_badan'  => 'nullable|string',
            'kesadaran'     => 'nullable|string',
            'keadaan_umum'  => 'nullable|string',

        ]);

        if (!empty($validated['tekanan_darah']) && !str_contains($validated['tekanan_darah'], '/')) {
            return redirect()->back()
                ->with('error', 'Format tekanan darah harus angka/angka (contoh: 120/80)')
                ->withInput();
        }



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

        $dataUmum = [
            'Tekanan Darah' => $validated['tekanan_darah'] ?? null,
            'Nadi'          => $validated['nadi'] ?? null,
            'Suhu Tubuh'    => $validated['suhu'] ?? null,
            'Respirasi'     => $validated['respirasi'] ?? null,
            'Berat Badan'   => $validated['berat_badan'] ?? null,
            'Tinggi Badan'  => $validated['tinggi_badan'] ?? null,
            'Kesadaran'     => $validated['kesadaran'] ?? null,
            'Keadaan Umum'  => $validated['keadaan_umum'] ?? null,
        ];

        foreach ($dataUmum as $nama => $nilai) {
            if ($nilai === null || $nilai === '') {
                continue;
            }

            $dataUmumModel = DataUmumPasien::firstOrCreate([
                'nama_du' => $nama
            ]);

            NilaiDataUmumPasien::updateOrCreate(
                [
                    'data_umum_pasien_id' => $dataUmumModel->id,
                    'antrian_id'          => $antrian_id,
                ],
                [
                    'nilai' => $nilai,
                ]
            );
        }


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
