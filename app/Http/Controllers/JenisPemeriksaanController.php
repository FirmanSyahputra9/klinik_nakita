<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class JenisPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
                'new_pemeriksaan' => 'required|string|unique:jenis_pemeriksaans,jenis_pemeriksaan',
                'new_normal' => 'required',
                'new_satuan' => 'required',
            ]);
        } catch (ValidationException $e) {
            return Redirect::back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa form Anda.');
        }

        return DB::transaction(function () use ($validated, $request) {
            $sudahAda = JenisPemeriksaan::where('jenis_pemeriksaan', $validated['new_pemeriksaan'])->lockForUpdate()->first();

            if ($sudahAda) {
                return Redirect::back()
                    ->with('error', 'Jenis pemeriksaan sudah ada.');
            }


        $jenisPemeriksaan = $validated['new_pemeriksaan'];

        JenisPemeriksaan::create([
            'jenis_pemeriksaan' => $jenisPemeriksaan,
            'nilai_normal' => $validated['new_normal'],
            'satuan' => $validated['new_satuan'],
        ]);

        return Redirect::back()
            ->with('success', 'Pemeriksaan' . $jenisPemeriksaan . 'berhasil ditambahkan.');
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPemeriksaan $jenisPemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPemeriksaan $jenisPemeriksaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPemeriksaan $jenisPemeriksaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPemeriksaan $jenisPemeriksaan)
    {
        //
    }
}
