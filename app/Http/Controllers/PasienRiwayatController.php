<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Registrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasienId = Pasien::where('user_id', Auth::user()->id)->value('id');
        $riwayat = Antrian::where('pasien_id', $pasienId)->whereHas('kasir', function ($q) {
            $q->where('status', '!=', false);
        })->where('status', true)->with(['registrasi', 'dokter', 'tindakan', 'data_pemeriksaan', 'kasir' => function ($q) {
            $q->where('status', '!=', false);
        }])->get()->map(function ($item) {
            if ($item->registrasi && $item->registrasi->tanggal_kunjungan) {
                $item->registrasi->tanggal_kunjungan = \Carbon\Carbon::parse($item->registrasi->tanggal_kunjungan)->format('d M Y');
                if ($item->created_at) {
                    $item->created_at = \Carbon\Carbon::parse($item->created_at)->format('h:i:s');
                }
            }
            return $item;
        });

        $riwayat = $riwayat ?? collect();

        return view('pages.pasien.riwayat', compact('riwayat'));
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
