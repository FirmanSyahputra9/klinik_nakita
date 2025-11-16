<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class UserJadwalDokter extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dayOrder = ['Senin' => 1, 'Selasa' => 2, 'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6, 'Minggu' => 7];

        $dokters = Dokter::with(['jadwals', 'aktif'])
            ->whereHas('jadwals')
            ->get();
        $dokters = $dokters->map(function ($dokter) use ($dayOrder) {

            $sortedJadwals = $dokter->jadwals->sortBy(function ($jadwal) use ($dayOrder) {
                return $dayOrder[$jadwal->hari] ?? 99;
            });

            $groupedJadwals = $sortedJadwals->reduce(function ($carry, $item) {

                $mulai = $item->aktif_mulai->format('H:i');
                $selesai = $item->aktif_selesai->format('H:i');
                $signature = $mulai . ' - ' . $selesai;

                $lastGroup = end($carry);

                if ($lastGroup && $lastGroup['signature'] === $signature) {

                    $carry[key($carry)]['hari_selesai'] = $item->hari;
                } else {
                    $carry[] = [
                        'hari_mulai' => $item->hari,
                        'hari_selesai' => $item->hari,
                        'signature' => $signature,
                        'mulai' => $mulai,
                        'selesai' => $selesai,
                    ];
                }

                return $carry;
            }, []);

            $dokter->grouped_jadwals = $groupedJadwals;
            return $dokter;
        });

        return view('pages.pasien.jadwal', compact('dokters'));
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
    public function store(Request $request) {}

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
