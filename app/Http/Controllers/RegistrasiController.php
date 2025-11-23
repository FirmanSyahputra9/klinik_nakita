<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\AntrianRegistrasi;
use App\Models\Dokter;
use App\Models\Registrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\DokterJadwal;
use App\Models\Pasien;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;



class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $pasien = User::whereHas('pasien')->with(['pasien'])->where('id', Auth::User()->id)->first();
        $dokter = Dokter::with(['jadwals', 'aktif'])->where('id', $id)->first();

        $dayOrder = ['Senin' => 1, 'Selasa' => 2, 'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6, 'Minggu' => 7];

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

        return view('pages.pasien.registrasi', compact('dokter', 'groupedJadwals', 'pasien'));
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
        try {
            $validated = $request->validate([
                'tanggal_kunjungan' => 'required|date',
                'keluhan'           => 'required|string|max:255',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa form Anda.');
        }

        return DB::transaction(function () use ($validated, $request) {

            $pasienId = Pasien::where('user_id', Auth::id())->value('id');

            $sudahAda = Registrasi::where('pasien_id', $pasienId)
                ->where('dokter_id', $request->dokter_id)
                ->whereDate('tanggal_kunjungan', $validated['tanggal_kunjungan'])
                ->lockForUpdate()
                ->first();

            if ($sudahAda) {
                return redirect()->route('dashboarduser')
                    ->with('error', 'Anda sudah mendaftar ke dokter ini di tanggal tersebut.');
            }

            $urut = Registrasi::whereDate('tanggal_kunjungan', $validated['tanggal_kunjungan'])
                ->lockForUpdate()
                ->count() + 1;

            $code = str_pad($urut, 4, '0', STR_PAD_LEFT) . '/' . now()->format('d.m.y');
            $appointment_code = 'REG-' . $code;

            $dayMapping = [
                'Monday'    => 'Senin',
                'Tuesday'   => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday'  => 'Kamis',
                'Friday'    => 'Jumat',
                'Saturday'  => 'Sabtu',
                'Sunday'    => 'Minggu',
            ];

            $hariInggris = date('l', strtotime($validated['tanggal_kunjungan']));
            $hari = $dayMapping[$hariInggris];

            $dokter_jadwal = DokterJadwal::where('dokter_id', $request->dokter_id)
                ->where('hari', $hari)
                ->lockForUpdate()
                ->first();

            if (!$dokter_jadwal) {
                return redirect()->route('registrasi.index', $request->dokter_id)
                    ->withInput()
                    ->with('error', 'Dokter tidak praktik pada hari tersebut.');
            }

            if ($validated['tanggal_kunjungan'] == now()->format('Y-m-d')) {
                $now = now()->format('H:i:s');

                if ($now > $dokter_jadwal->aktif_selesai) {
                    return redirect()->route('registrasi.index', $request->dokter_id)
                        ->withInput()
                        ->with('error', 'Jadwal dokter hari ini sudah selesai.');
                }
            }

            Registrasi::create([
                'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
                'dokter_jadwal_id'  => $dokter_jadwal->id,
                'appointment_code'  => $appointment_code,
                'keluhan'           => $request->keluhan,
                'pasien_id'         => $pasienId,
                'dokter_id'         => $request->dokter_id,
            ]);

            return redirect()->route('dashboarduser')
                ->with('success', 'Registrasi berhasil! Kode: ' . $appointment_code);
        });
    }






    /**
     * Display the specified resource.
     */
    public function show(Registrasi $registrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registrasi $registrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registrasi $registrasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registrasi $registrasi)
    {
        //
    }
}
