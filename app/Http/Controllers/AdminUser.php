<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Dokter;
use App\Models\Pasien;
use Carbon\Carbon;


class AdminUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = User::whereHas('pasien')
            ->join('pasiens', 'pasiens.user_id', '=', 'users.id')
            ->with('pasien')
            ->orderBy('pasiens.no_rm', 'asc')
            ->orderBy('users.created_at', 'desc')
            ->select('users.*')
            ->paginate(10)
            ->appends(request()->query());

        $admins = User::whereHas('admin')->with(['admin'])->paginate(10)->appends(request()->query());;
        $dokters = User::whereHas('dokter')->with(['dokter'])->paginate(10)->appends(request()->query());;
        $pasiens->getCollection()->transform(function ($user) {
            if ($user->pasien) {
                $birthDate = Carbon::parse($user->pasien->birth_date);
                $user->pasien->birth_date_formatted = Carbon::parse($user->pasien->birth_date)->format('d-m-Y');
                $user->pasien->gender_label = $user->pasien->gender === 'female' ? 'Perempuan' : 'Laki-laki';
                $user->pasien->umur = $birthDate->age . ' tahun';
            }
            return $user;
        });

        return view('pages.admin.users', compact('pasiens', 'admins', 'dokters'));
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);

        $user->approved = true;
        $user->approved_at = now();
        $user->save();

        if ($user->pasien) {
            if (empty($user->pasien->no_rm)) {
                $lastRm = \App\Models\Pasien::orderBy('no_rm', 'desc')->value('no_rm');

                $lastNumber = $lastRm ? intval(substr($lastRm, 2)) : 0;

                $newNumber = $lastNumber + 1;

                $newRm = 'RM' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

                $user->pasien->update(['no_rm' => $newRm]);
            }
        }

        return redirect()->route('users.index')->with('success', 'User berhasil disetujui dan nomor rekam medis telah dibuat.');
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
        $pasien = (object) [
            'id' => $id,
            'nama' => 'Nama Pasien',
            'jenis_kelamin' => 'L',
            'usia' => 25,
            'gol_darah' => 'O',
            'tanggal_lahir' => '9 Agustus 2004',
            'alamat' => "Jl. Contoh No. 10",
            'no_telepon' => '08123456789',
            'email' => 'pasien@example.com',
            'nik' => '12710308000402',
            'created_at' => Carbon::parse("2024-11-09"),
        ];

        return view('pages.admin.detail-pasien', compact('pasien'));
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
