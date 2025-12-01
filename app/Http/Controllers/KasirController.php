<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Kasir;
use App\Models\Resep;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasir = Kasir::with(['antrian', 'antrian.pasien', 'antrian.registrasi', 'antrian.data_pemeriksaan', 'antrian.resep.obat', 'antrian.resep'])->get()->map(function ($item) {
            $item->antrian->tanggal = Carbon::parse($item->antrian->registrasi->tanggal_kunjungan)->translatedFormat('d M y');
            $harga_resep = $item->antrian->resep->kuantitas * $item->antrian->resep->obat->harga_jual;
            $item->total_harga = 'Rp ' . number_format($harga_resep, 0, ',', '.');
            $item->nama_pasien = $item->antrian->pasien->name;
            return $item;
        });

        $hargaObat = Resep::join('obats', 'reseps.obat_id', '=', 'obats.id')
            ->selectRaw('SUM(reseps.kuantitas * obats.harga_jual) as total_harga')
            ->first()
            ->total_harga;

        $pendapatanHariIni = Antrian::join('reseps', 'antrians.id', '=', 'reseps.antrian_id')
            ->join('obats', 'reseps.obat_id', '=', 'obats.id')
            ->join('kasirs', 'kasirs.antrian_id', '=', 'antrians.id')
            ->whereDate('antrians.created_at', Carbon::today())
            ->sum(DB::raw('(reseps.kuantitas * obats.harga_jual) + kasirs.biaya_layanan'));

        $pendapatanHariIni = $pendapatanHariIni ?? 0;
        $pendapatanHariIni = 'Rp' . number_format($pendapatanHariIni, 0, ',', '.') . ',00';

        $pendapatanMingguIni = Antrian::join('reseps', 'antrians.id', '=', 'reseps.antrian_id')
            ->join('obats', 'reseps.obat_id', '=', 'obats.id')
            ->join('kasirs', 'kasirs.antrian_id', '=', 'antrians.id')
            ->whereBetween('antrians.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum(DB::raw('(reseps.kuantitas * obats.harga_jual) + kasirs.biaya_layanan'));

        $pendapatanMingguIni = $pendapatanMingguIni ?? 0;
        $pendapatanMingguIni = 'Rp' . number_format($pendapatanMingguIni, 0, ',', '.') . ',00';

        $pendapatanBulanIni = Antrian::join('reseps', 'antrians.id', '=', 'reseps.antrian_id')
            ->join('obats', 'reseps.obat_id', '=', 'obats.id')
            ->join('kasirs', 'kasirs.antrian_id', '=', 'antrians.id')
            ->whereBetween('antrians.created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->sum(DB::raw('(reseps.kuantitas * obats.harga_jual) + kasirs.biaya_layanan'));

        $pendapatanBulanIni = $pendapatanBulanIni ?? 0;
        $pendapatanBulanIni = 'Rp' . number_format($pendapatanBulanIni, 0, ',', '.') . ',00';

        $totalTransaksi = Kasir::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count('status', true);
        $totalTransaksi = $totalTransaksi ?? 0;
        $totalTransaksi = $totalTransaksi . ' Transaksi';

        $totalObatTerjual = Resep::join('obats', 'reseps.obat_id', '=', 'obats.id')
            ->whereBetween('reseps.created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->sum('reseps.kuantitas');

        $totalObatTerjual = $totalObatTerjual ?? 0;
        $totalObatTerjual = $totalObatTerjual . ' Obat';






        $kasir = $kasir ?? collect();
        return view('pages.admin.kasir', compact('kasir', 'pendapatanHariIni', 'hargaObat', 'pendapatanMingguIni', 'pendapatanBulanIni', 'totalTransaksi', 'totalObatTerjual'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.tambah-kas');
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
    public function show(Kasir $kasir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kasir $kasir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kasir $kasir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kasir $kasir)
    {
        //
    }

    public function konfirmasi(Request $request, $id)
    {
        $request->validate([
            'biaya_layanan' => 'required',
        ]);
        Kasir::where('id', $id)->first()->update([
            'biaya_layanan' => $request->biaya_layanan,
            'status' => true,
        ]);
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil dikonfirmasi');
    }
}
