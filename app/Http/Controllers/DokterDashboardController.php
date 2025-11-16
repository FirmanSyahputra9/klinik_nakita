<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\DokterDashboard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DokterDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::User()->id;
        $dokter = User::whereHas('dokter')->with(['dokter'])->where('id', $user_id)->first();
        return view('pages.dokter.dashboard', compact('dokter'));
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
    public function show(DokterDashboard $dokterDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DokterDashboard $dokterDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DokterDashboard $dokterDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DokterDashboard $dokterDashboard)
    {
        //
    }
}
