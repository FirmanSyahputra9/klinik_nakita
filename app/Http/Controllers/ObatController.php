<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all(); // ambil semua data obat
        return view('pages.admin.stok-obat', compact('obats'));
    }

    public function create()
    {
        return view('pages.admin.tambah-obat');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'kode' => 'required|string|max:50|unique:obats,kode',
        'nama' => 'required|string|max:255',
        'stok' => 'required|integer|min:0',
        'satuan' => 'required|string',
        'harga_beli' => 'required|numeric|min:0',
        'harga_jual' => 'required|numeric|min:0',
        'tanggal_kadaluwarsa' => 'required|date',
        'deskripsi' => 'nullable|string',
    ]);

    Obat::create($validated);

    return redirect()->route('obat.index')
                     ->with('success', 'Obat berhasil ditambahkan!');
}

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('pages.admin.edit-obat', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'tanggal_kadaluwarsa' => 'required|date',
        ]);

        $obat->update($request->all());
        return redirect()->route('obat.index')->with('success', 'Data obat diperbarui');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat dihapus');
    }
}
