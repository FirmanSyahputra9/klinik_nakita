<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\DataPasien;
use App\Models\Dokter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dokter.data');
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
    public function show(DataPasien $dataPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPasien $dataPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPasien $dataPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPasien $dataPasien)
    {
        //
    }
}
