<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use App\Models\Resep;
use Carbon\Carbon;
use Illuminate\Http\Request;

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



        return view('pages.admin.kasir', compact('kasir'));
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

    public function konfirmasi($id){
        $kasir = Kasir::where('id', $id)->first();
        $kasir->status = true;
        $kasir->save();
        return redirect()->route('kasir.index')->with('success', 'Kasir berhasil dikonfirmasi');
    }
}
