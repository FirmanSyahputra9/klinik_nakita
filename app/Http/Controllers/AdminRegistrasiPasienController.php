<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Kasir;
use App\Models\Registrasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminRegistrasiPasienController extends Controller
{
    public function index()
    {

        return view('pages.admin.registrasi-pasien');
    }
}
