<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\JenisPemeriksaan;
use App\Models\Pasien;
use App\Models\Registrasi;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Controller
{
    use PasswordValidationRules;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.users');
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);

        $user->approved = true;
        $user->approved_at = now();
        $user->save();

        if ($user->pasien) {
            if (empty($user->pasien->no_rm)) {
                $lastRm = Pasien::orderBy('no_rm', 'desc')->value('no_rm');

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
        return view('pages.admin.registrasi-pasien-non');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'name' => ['required', 'string', 'max:255'],
            'gol_darah' => ['nullable', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255', 'unique:pasiens,alamat'],
            'nik' => ['required', 'string', 'max:255', 'unique:pasiens,nik'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female'],
            'phone' => ['required', 'string', 'max:255'],

        ]);


        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'approved' => true,
            'approved_at' => now(),
            'email_verified_at' => now(),
            'password' => Hash::make($validated['password']),
        ]);

        $formatPhone = trim(chunk_split(preg_replace('/\D/', '', $validated['phone']), 4, ' '));
        Pasien::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'gol_darah' => $validated['gol_darah'] ?? null,
            'alamat' => $validated['alamat'],
            'nik' => $validated['nik'],
            'birth_date' => $validated['birth_date'] ?? null,
            'gender' => $validated['gender'] ?? null,
            'phone' => $formatPhone,
            'no_rm' => null
        ]);
        if ($user->pasien) {
            if (empty($user->pasien->no_rm)) {
                $lastRm = Pasien::orderBy('no_rm', 'desc')->value('no_rm');

                $lastNumber = $lastRm ? intval(substr($lastRm, 2)) : 0;

                $newNumber = $lastNumber + 1;

                $newRm = 'RM' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

                $user->pasien->update(['no_rm' => $newRm]);
            }
        }


        return redirect()->route('users.index')->with('success', 'User berhasil disetujui dan nomor rekam medis telah dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userId = User::findOrFail($id);

        $user = User::where('id', $userId->id)->whereHas('pasien')->with('pasien')->first();

        if ($user) {
            if ($user->pasien->gender) {
                $user->pasien->gender_label = $user->pasien->gender == 'male' ? 'Laki-laki' : 'Perempuan';
            }
            $user->pasien->umur = Carbon::parse($user->pasien->birth_date)->age;
            if ($user->pasien->birth_date) {
                $user->pasien->tanggal_lahir = Carbon::parse($user->pasien->birth_date)->format('d M Y');
            }
            if ($user->created_at) {
                $user->create_at = Carbon::parse($user->created_at)->translatedFormat('d F Y');
            }
        }

        $pasienId = Pasien::where('user_id', $user->id)->value('id');

        // riwayat
        $riwayat = Antrian::where('pasien_id', $pasienId)->whereHas('kasir', function ($q) {
            $q->where('status', '!=', false);
        })->where('status', true)->with(['registrasi', 'resep', 'dokter', 'tindakan', 'data_pemeriksaan', 'kasir' => function ($q) {
            $q->where('status', '!=', false);
        }])->get()->map(function ($item) {
            if ($item->registrasi && $item->registrasi->tanggal_kunjungan) {
                $item->registrasi->tanggal_kunjungan = Carbon::parse($item->registrasi->tanggal_kunjungan)->format('d M Y');
                if ($item->created_at) {
                    $item->jam_dibuat = Carbon::parse($item->created_at)->format('h:i:s');
                }
            }
            return $item;
        });
        $riwayat = $riwayat ?? collect();

        // Hasil Lab
        $hasil = Antrian::where('pasien_id', $pasienId)->where('status', true)->whereHas('lab')->whereHas('data_pemeriksaan')->whereHas('tindakan')->with('registrasi', 'dokter', 'tindakan', 'data_pemeriksaan', 'lab', 'lab.jenis')->get()->map(function ($item) {
            if ($item->registrasi->tanggal_kunjungan) {
                $item->registrasi->tanggal_kunjungan = Carbon::parse($item->registrasi->tanggal_kunjungan)->format('d M Y');
                if ($item->created_at) {
                    $item->created_at = Carbon::parse($item->created_at)->format('h:i:s');
                }
            }
            return $item;
        });
        $hasil = $hasil ?? collect();

        return view('pages.admin.detail-pasien', compact('user', 'riwayat', 'hasil'));
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
