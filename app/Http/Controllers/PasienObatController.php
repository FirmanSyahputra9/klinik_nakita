<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Registrasi;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasienId = Pasien::where('user_id', Auth::user()->id)->value('id');
        $antrian_id = Antrian::where('pasien_id', $pasienId)->value('id');
        $obat = Antrian::where('pasien_id', $pasienId)->whereHas('kasir', function ($q) {
            $q->where('status', '!=', false);
        })->where('status', true)->with(['registrasi', 'resep', 'dokter', 'tindakan', 'data_pemeriksaan', 'kasir'])->get()->map(function ($item) {
            if ($item->registrasi->tanggal_kunjungan) {
                $item->registrasi->tanggal_kunjungan = \Carbon\Carbon::parse($item->registrasi->tanggal_kunjungan)->format('d M Y');
                if ($item->created_at) {
                    $item->created_at = \Carbon\Carbon::parse($item->created_at)->format('h:i:s');
                }
            }
            return $item;
        });

        $tindakanIds = $obat->flatMap(function ($antrian) {
            return $antrian->tindakan->pluck('id');
        })->toArray();


        $resep = Resep::whereHas('antrian.tindakan', function ($q) use ($tindakanIds) {
            $q->where('id', $tindakanIds);
        })->with('obat', 'antrian.kasir')->get()->map(function ($item) {
            $item->obat->harga = 'Rp. ' . number_format($item->obat->harga_jual + $item->antrian->kasir->biaya_layanan, 0, ',', '.');
            return $item;
        });


        return view('pages.pasien.obat', compact('obat', 'resep'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
