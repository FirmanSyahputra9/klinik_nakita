<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Registrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasienId = Pasien::where('user_id', Auth::user()->id)->value('id');
        $riwayat = Registrasi::where('pasien_id', $pasienId)->where('status', true)->with('antrians')->get()->map(function ($item){
            return $item;
        });
        
        return view('pages.pasien.riwayat', compact('riwayat'));
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
}
