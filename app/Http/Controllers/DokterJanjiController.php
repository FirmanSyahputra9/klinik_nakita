<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterJanjiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = date('2025-11-26');
        $dokterId = Dokter::where('user_id', Auth::id())->value('id');

        $janji = Antrian::with(['pasien', 'registrasi', 'dokter'])
            ->where('dokter_id', $dokterId)
            ->whereHas('registrasi', function ($q) use ($today) {
                $q->whereDate('tanggal_kunjungan', $today);
            })
            ->orderBy('status', 'asc')
            ->get()->map(function ($item) {
                if ($item->registrasi && $item->registrasi->tanggal_kunjungan) {
                    $item->registrasi->tanggal_kunjungan = \Carbon\Carbon::parse($item->registrasi->tanggal_kunjungan)
                        ->format('d M Y');
                }
                return $item;
            });

        return view('pages.dokter.janji', compact('janji'));
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

    public function konfirmasi($id)
    {
        $janji = Antrian::findOrFail($id);
        $janji->status = true;
        $janji->save();

        return redirect()->route('janji.index')->with('success', 'Registrasi berhasil diselesaikan');
    }
}
