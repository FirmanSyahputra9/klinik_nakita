<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::paginate(10);
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
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'status' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'username' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'doctor',
        ]);

        Dokter::create([
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'spesialisasi' => $request->spesialisasi,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect()->route('dokter.index')->with('success', 'Dokter baru berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Dokter $dokter)
    {
        //
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
