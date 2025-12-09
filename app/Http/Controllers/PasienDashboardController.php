<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\DokterJadwal;
use App\Models\Pasien;
use App\Models\Registrasi;
use App\Models\Resep;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienDashboardController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $next_day = date('Y-m-d', strtotime('+1 day'));

        $dokterId = Dokter::where('user_id', Auth::id())->value('id');
        $pasienId = Pasien::where('user_id', Auth::id())->value('id');
        $dayMapping = [
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu',
            'Sunday'    => 'Minggu',
        ];

        $hariInggris = date('l', strtotime($today));
        $hari = $dayMapping[$hariInggris];

        $janjinow = Antrian::with([
            'pasien',
            'dokter',
            'registrasi'
        ])
            ->where('pasien_id', $pasienId)
            ->whereHas('registrasi', function ($q) use ($today) {
                $q
                    // ->whereDate('tanggal_kunjungan', $today)
                    ->where('status', true);
            })
            ->get()->map(function ($item) use ($hari) {
                if ($item->registrasi && $item->registrasi->tanggal_kunjungan) {
                    $item->registrasi->tanggal_kunjungan = Carbon::parse($item->registrasi->tanggal_kunjungan)
                        ->format('d M Y');
                }
                $dokterId = $item->dokter_id;

                $item->antrian_sekarang = Antrian::where('dokter_id', $dokterId)
                    ->where('status', true)
                    ->count() + 1;

                $item->jadwal_dokter_now = DokterJadwal::where('dokter_id', $dokterId)
                    ->where('hari', $hari)
                    ->first();

                if ($item->jadwal_dokter_now) {
                    $item->jadwal_dokter_now->awal_aktif =
                        Carbon::parse($item->jadwal_dokter_now->aktif_mulai)->format('H:i');
                }



                $item->registrasi->hari_kunjungan =
                    Carbon::parse($item->registrasi->tanggal_kunjungan)
                    ->locale('id')
                    ->diffForHumans();

                $item->sisa_antrian = Antrian::where('dokter_id', $dokterId)
                    ->where('status', false)
                    ->where('id', '<', $item->id)
                    ->count();

                return $item;
            });

        $janjinext = Antrian::with([
            'pasien',
            'dokter',
            'registrasi'
        ])
            ->where('pasien_id', $pasienId)
            ->whereHas('registrasi', function ($q) use ($next_day) {
                $q->whereDate('tanggal_kunjungan', $next_day)
                    ->where('status', true);
            })
            ->get()->map(function ($item) use ($next_day) {
                if ($item->registrasi && $item->registrasi->tanggal_kunjungan) {
                    $item->registrasi->tanggal_kunjungan = Carbon::parse($item->registrasi->tanggal_kunjungan)
                        ->format('d M Y');
                }
                $dokterId = $item->dokter_id;

                $item->antrian_sekarang = Antrian::where('dokter_id', $dokterId)
                    ->where('status', true)
                    ->count() + 1;

                $item->jadwal_dokter_now = DokterJadwal::where('dokter_id', $dokterId)
                    ->where('hari', $next_day)
                    ->first();

                if ($item->jadwal_dokter_now) {
                    $item->jadwal_dokter_now->awal_aktif =
                        Carbon::parse($item->jadwal_dokter_now->aktif_mulai)->format('H:i');
                }

                $item->registrasi->hari_kunjungan =
                    Carbon::parse($item->registrasi->tanggal_kunjungan)
                    ->locale('id')
                    ->diffForHumans();

                $item->sisa_antrian = Antrian::where('dokter_id', $dokterId)
                    ->where('status', false)
                    ->where('id', '<', $item->id)
                    ->count();

                return $item;
            });

        $antrianjanji = Antrian::with(['pasien', 'dokter', 'registrasi'])
            ->get();

        $antrian_registrasi = Registrasi::where('pasien_id', $pasienId)->where('status', '=', false)->with('dokters', 'pasiens', 'dokter_jadwals')->get()->map(function ($item) {
            if ($item->created_at) {
                $item->create_at = Carbon::parse($item->created_at)->format('d M Y');
            }

            $item->nama_dokter = $item->dokters->name;

            $item->antrian_registrasi = Registrasi::where('status', '=', false)->where('tanggal_kunjungan', $item->tanggal_kunjungan)->count();

            if ($item->tanggal_kunjungan) {
                $item->tanggal_kunjungan = Carbon::parse($item->tanggal_kunjungan)->format('d M Y');
            }

            return $item;
        });

        $user = User::with('pasien')->find(Auth::id());
        if ($user && $user->pasien) {
            $user->pasien->umur = Carbon::parse($user->pasien->birth_date)->age;
            $user->pasien->birth_date_formatted = Carbon::parse($user->pasien->birth_date)->format('d M Y');
        }


        // obat pasien
        $pasienId = Pasien::where('user_id', Auth::user()->id)->value('id');
        $antrian_id = Antrian::where('pasien_id', $pasienId)->value('id');
        $obat = Antrian::where('pasien_id', $pasienId)->whereHas('kasir', function ($q) {
            $q->where('status', '!=', false);
        })->where('status', true)->with(['registrasi', 'resep', 'dokter', 'tindakan', 'data_pemeriksaan', 'kasir'])->first();

        if ($obat) {
            $obat->registrasi->tanggal_kunjungan = \Carbon\Carbon::parse($obat->registrasi->tanggal_kunjungan)->format('d M Y');
            if ($obat->created_at) {
                $obat->created_at = \Carbon\Carbon::parse($obat->created_at)->format('h:i:s');
            }
        }


        $tindakanIds = $obat->tindakan->pluck('id');



        $resep = Resep::whereHas('antrian.tindakan', function ($q) use ($tindakanIds) {
            $q->where('id', $tindakanIds);
        })->with('obat', 'antrian.kasir')->first();

        if ($resep){
            $resep->obat->harga = 'Rp. ' . number_format($resep->obat->harga_jual + $resep->antrian->kasir->biaya_layanan, 0, ',', '.');
        }

        $resep = $resep ?: [];





        return view('pages.pasien.dashboard', compact('janjinow', 'antrianjanji', 'antrian_registrasi', 'user', 'janjinext', 'obat', 'resep'));
    }
}
