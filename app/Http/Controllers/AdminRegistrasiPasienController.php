<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\DokterJadwal;
use App\Models\Kasir;
use App\Models\Pasien;
use App\Models\Registrasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AdminRegistrasiPasienController extends Controller
{
    public function index()
    {

        return view('pages.admin.registrasi-pasien');
    }

    public function store(Request $request)
    {

        try {
            $validated = $request->validate([
                'pasien' => 'required',
                'no_rm' => 'required',
                'no_telepon' => 'required',
                'dokter' => 'required',
                'tanggal_kunjungan' => 'required|date',
                'keluhan'           => 'required|string|max:255',

            ]);
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa form Anda.');
        }


        return DB::transaction(function () use ($validated, $request) {

            $pasienId = Pasien::where('user_id', $validated['pasien'])->value('id');

            $sudahAda = Registrasi::where('pasien_id', $pasienId)
                ->where('dokter_id', $request->dokter)
                ->whereDate('tanggal_kunjungan', $validated['tanggal_kunjungan'])
                ->lockForUpdate()
                ->first();

            if ($sudahAda) {
                return redirect()->back()
                    ->with('error', 'Anda sudah mendaftar ke dokter ini di tanggal tersebut.');
            }

            $urut = Registrasi::whereDate('tanggal_kunjungan', $validated['tanggal_kunjungan'])
                ->lockForUpdate()
                ->count() + 1;

            $code = str_pad($urut, 4, '0', STR_PAD_LEFT) . '/' . now()->format('d.m.y');
            $appointment_code = 'REG-' . $code;

            $dayMapping = [
                'Monday'    => 'Senin',
                'Tuesday'   => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday'  => 'Kamis',
                'Friday'    => 'Jumat',
                'Saturday'  => 'Sabtu',
                'Sunday'    => 'Minggu',
            ];

            $hariInggris = date('l', strtotime($validated['tanggal_kunjungan']));
            $hari = $dayMapping[$hariInggris];

            $dokter_jadwal = DokterJadwal::where('dokter_id', $request->dokter)
                ->where('hari', $hari)
                ->lockForUpdate()
                ->first();

            if (!$dokter_jadwal) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Dokter tidak praktik pada hari tersebut.');
            }
            $nama_dokter = Dokter::where('id', $dokter_jadwal->dokter_id)->value('name');

            if ($validated['tanggal_kunjungan'] == now()->format('Y-m-d')) {
                $now = now();
                $jamSelesai = Carbon::parse($dokter_jadwal->aktif_selesai);


                if ($now->greaterThan($jamSelesai)) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', "Jadwal dokter $nama_dokter hari ini sudah selesai.");
                }
            }


            $reg = Registrasi::create([
                'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
                'dokter_jadwal_id'  => $dokter_jadwal->id,
                'appointment_code'  => $appointment_code,
                'keluhan'           => $request->keluhan,
                'pasien_id'         => $pasienId,
                'dokter_id'         => $request->dokter,
                'status'            => true,
            ]);



            // tes
            $antrianUrut = Antrian::where('dokter_id', $reg->dokter_id)
                ->whereHas('registrasi', function ($q) use ($reg) {
                    $q->whereDate('tanggal_kunjungan', $reg->tanggal_kunjungan);
                })
                ->lockForUpdate()
                ->count() + 1;

            $kodeAntrian = 'A-' . str_pad($antrianUrut, 4, '0', STR_PAD_LEFT)
                . '/' . date('d.m.Y', strtotime($reg->tanggal_kunjungan));

            Antrian::create([
                'kode_antrian'  => $kodeAntrian,
                'registrasi_id' => $reg->id,
                'dokter_id'     => $reg->dokter_id,
                'pasien_id'     => $reg->pasien_id,
            ]);


            return redirect()->route('appointment.index')
                ->with('success', 'Registrasi berhasil! Kode: ' . $appointment_code);
        });
    }
}
