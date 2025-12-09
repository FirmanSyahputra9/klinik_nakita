<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DokterJanjiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dokter.janji');
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

    public function konfirmasi($id)
    {
        try {
            DB::beginTransaction();

            $janji = Antrian::where('id', $id)->lockForUpdate()->firstOrFail();

            if ($janji->status === true) {
                DB::rollBack();
                return back()->with('error', 'Janji sudah dikonfirmasi sebelumnya');
            }

            $janji->status = true;
            $janji->save();

            DB::commit();

            return redirect()
                ->route('data.show', $janji->id)
                ->with('success', 'Registrasi berhasil diselesaikan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function selesai($id)
    {
        try {
            DB::beginTransaction();

            $janji = Antrian::where('id', $id)->lockForUpdate()->firstOrFail();

            if ($janji->status === true) {
                DB::rollBack();
                return back()->with('error', 'Janji sudah dikonfirmasi sebelumnya');
            }

            $janji->status = true;
            $janji->save();

            DB::commit();

            return redirect()
                ->route('data.show', $janji->pasien)
                ->with('success', 'Registrasi berhasil diselesaikan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
