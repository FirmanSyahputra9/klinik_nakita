<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\DokterDashboard;
use App\Models\Registrasi;
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
        $user_id = Auth::user()->id;
        $dokter = User::whereHas('dokter')->with(['dokter'])->where('id', $user_id)->first();

        // Query untuk janji yang aktif dan sesuai dengan dokter
        $janji = Registrasi::where('status', true)
            ->whereHas('antrians', function ($query) {
                $query->where('status', true);
            })
            ->whereHas('dokters', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->with(['pasiens', 'dokters'])
            ->orderBy('tanggal_kunjungan', 'desc');

        // Hitung jumlah janji yang selesai
        $janji_selesai = Registrasi::where('status', true)
            ->whereHas('antrians', function ($query) {
                $query->where('status', true);
            })
            ->whereHas('dokters', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->whereHas('antrians.kasir', function ($query) {
                $query->where('status', true);
            })
            ->count();

        // Paginasi untuk janji yang ada
        $janji = $janji->paginate(4);



        return view('pages.dokter.dashboard', compact('dokter', 'janji', 'janji_selesai', ));
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
