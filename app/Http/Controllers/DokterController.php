<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use Illuminate\Http\Request;

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
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:dokters',
            'status' => 'required|string|max:255',
        ]);

        Dokter::create($validated);

        return redirect()->route('dokter.index')
            ->with('success', 'Dokter berhasil ditambahkan!');
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
