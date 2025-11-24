<?php

namespace App\Http\Controllers;

use App\Models\Alergi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AlergiController extends Controller
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
        try{
            $validated = $request->validate([
                'alergi' => 'required|string',
                'reaksi' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return Redirect::back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa form Anda.');
        }

        return DB::transaction(function () use ($validated, $request) {
            $sudahAda = Alergi::where('alergi', $validated['alergi'])->where('pemeriksaan_laboratorium_id', $request->pemeriksaan_laboratorium_id)->lockForUpdate()->first();

            if ($sudahAda) {
                return Redirect::back()
                    ->with('error', 'Alergi sudah ada.');
            }

            Alergi::create([
                'alergi' => $validated['alergi'],
                'reaksi' => $validated['reaksi'],
                'pemeriksaan_laboratorium_id' => $request->pemeriksaan_laboratorium_id,
            ]);

            return Redirect::back()
                ->with('success', 'Alergi berhasil ditambahkan.');
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Alergi $alergi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alergi $alergi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alergi $alergi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alergi $alergi)
    {
        //
    }
}
