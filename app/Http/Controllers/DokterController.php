<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\DokterAktif;
use App\Models\Obat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = User::whereHas('dokter')->with(['dokter'])->paginate(10)->appends(request()->query());
        return view('pages.admin.data-dokter', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.tambah-dokter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'spesialisasi' => 'required',
            'phone' => 'required',
            'nik' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $existing = User::where('email', $request->email)
                ->lockForUpdate()
                ->first();

            if ($existing) {
                return back()->withErrors(['email' => 'Email sudah terdaftar.']);
            }

            $user = User::create([
                'username' => $request->name . Str::random(6),
                'email' => $request->email,
                'approved' => true,
                'approved_at' => now(),
                'email_verified_at' => now(),
                'role' => 'doctor',
                'password' => bcrypt($request->password),
            ]);

            Dokter::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'alamat' => $request->alamat,
                'spesialisasi' => $request->spesialisasi,
                'phone' => $request->phone,
                'status' => 'aktif',
                'nik' => $request->nik
            ]);

            DokterAktif::create([
                'dokter_id' => $user->dokter->id
            ]);

            DB::commit();

            return redirect()
                ->route('dokter.index')
                ->with('success', 'Dokter baru berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        $dokterId = $dokter->id;

        $dokter = User::with('dokter', 'dokter.jadwals')
            ->whereHas('dokter', function ($q) use ($dokterId) {
                $q->where('id', $dokterId);
            })->first();

        if ($dokter && $dokter->dokter && $dokter->dokter->jadwals) {
            foreach ($dokter->dokter->jadwals as $jadwal) {
                // Properti baru untuk jam saja
                $jadwal->mulai_aktif = date('H:i', strtotime($jadwal->aktif_mulai));
                $jadwal->selesai_aktif = date('H:i', strtotime($jadwal->aktif_selesai));
            }
        }

        return view('pages.admin.detail-dokter', compact('dokterId', 'dokter'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        //
    }
}
