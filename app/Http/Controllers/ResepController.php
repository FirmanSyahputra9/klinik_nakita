<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Kasir;
use App\Models\Obat;
use App\Models\Resep;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $antrian = Antrian::where('status', true)->whereHas('data_pemeriksaan')->whereDoesntHave('kasir')
            ->with(['pasien', 'dokter', 'registrasi', 'data_pemeriksaan'])
            ->get()->map(function ($item) {
                $item->pasien->umur = Carbon::parse($item->pasien->birth_date)->age . ' tahun';
                $item->pasien->gender_label = $item->pasien->gender == 'female' ? 'Perempuan' : 'Laki-laki';
                return $item;
            });

        $obats = Obat::get()->map(function ($item) {
            $item->kuantitas = $item->kuantitas . ' ' . $item->satuan;
            $item->harga = 'Rp. ' . number_format($item->harga_jual, 0, ',', '.');
            return $item;
        });
        $antrian = $antrian ?? collect();
        $obats = $obats ?? collect();


        return view('pages.dokter.resep', compact('antrian', 'obats'));
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
        $request->validate([
            'antrian_id' => 'required|exists:antrians,id',
            'obat.*.obat_id' => 'required|exists:obats,id',
            'obat.*.dosis' => 'required|string',
            'obat.*.frekuensi' => 'nullable|string',
            'obat.*.waktu_konsumsi' => 'nullable|array',
            'obat.*.kuantitas' => 'nullable|numeric',
        ]);

        $antrian = Antrian::findOrFail($request->antrian_id);
        $kasir = Kasir::where('antrian_id', $request->antrian_id)->first();
        DB::transaction(function () use ($request, $antrian, $kasir) {
            if ($antrian->data_pemeriksaan) {
                $updated = $antrian->data_pemeriksaan->update([
                    'diagnosa' => $request->diagnosa,
                ]);

                if (!$updated) {
                    throw new \Exception("Gagal update diagnosa!");
                }
            } else {
                $created = $antrian->data_pemeriksaan()->create([
                    'diagnosa' => $request->diagnosa,
                ]);

                if (!$created) {
                    throw new \Exception("Gagal membuat diagnosa baru!");
                }
            }

            if ($kasir > 0) {
                throw new \Exception("Error Internal");
            } else {
                Kasir::create([
                    'antrian_id' => $antrian->id,
                ]);
            }

            foreach ($request->obat??[] as $item) {
                if (!empty($item['obat_id'])) {
                    $kuantitas = $item['kuantitas'] ?? 0;

                    $obat = Obat::where('id', $item['obat_id'])->lockForUpdate()->first();

                    if (!$obat) {
                        throw new \Exception("Obat tidak ditemukan!");
                    }

                    if ($obat->stok < $kuantitas) {
                        throw new \Exception("Stok obat {$obat->nama} tidak mencukupi!");
                    }
                    $updatedStock = $obat->decrement('stok', $kuantitas);

                    if ($updatedStock === 0 && $kuantitas > 0) {
                        throw new \Exception("Gagal mengurangi stock obat {$obat->nama}!");
                    }

                    $resep = Resep::create([
                        'antrian_id' => $antrian->id,
                        'obat_id' => $item['obat_id'],
                        'dosis' => $item['dosis'],
                        'frekuensi' => $item['frekuensi'] ?? null,
                        'waktu_konsumsi' => isset($item['waktu_konsumsi']) ? implode(',', $item['waktu_konsumsi']) : null,
                        'kuantitas' => $kuantitas,
                    ]);

                    if (!$resep) {
                        throw new \Exception("Gagal menyimpan resep obat {$obat->nama}!");
                    }
                }
            }
        });

        return redirect()->route('resep.index')->with('success', 'Resep berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resep $resep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resep $resep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resep $resep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resep $resep)
    {
        //
    }
}
