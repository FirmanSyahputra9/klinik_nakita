<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Appointment;
use App\Models\Kasir;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrasi = Registrasi::with([
            'pasiens',
            'dokters',
            'dokter_jadwals',
            'antrians.kasir'
        ])
            ->orderBy(
                Kasir::select('status')
                    ->whereIn(
                        'kasirs.antrian_id',
                        Antrian::select('id')
                            ->whereColumn('antrians.registrasi_id', 'registrasis.id')
                    )
                    ->limit(1),
                'asc'
            )
            ->orderBy('tanggal_kunjungan', 'asc')->paginate(10, ['*'], 'appointment-page')->tap(function ($paginator) {
                $paginator->getCollection()->transform(function ($item) {
                    if ($item->tanggal_kunjungan) {
                        $item->tanggal_kunjungan = Carbon::parse($item->tanggal_kunjungan)->format('d M Y');
                    }
                    return $item;
                });
            });
        return view('pages.admin.appointment', compact('registrasi'));
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
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }



    public function konfirmasi($id)
    {
        DB::beginTransaction();

        try {
            $reg = Registrasi::where('id', $id)->lockForUpdate()->firstOrFail();

            if ($reg->status === true) {
                DB::rollBack();
                return redirect()->route('appointment.index')
                    ->with('error', 'Registrasi sudah dikonfirmasi sebelumnya.');
            }

            $reg->status = true;
            $reg->save();

            $dokterId = $reg->dokter_id;
            $tanggal  = $reg->tanggal_kunjungan;

            $antrianUrut = Antrian::where('dokter_id', $dokterId)
                ->whereHas('registrasi', function ($q) use ($tanggal) {
                    $q->whereDate('tanggal_kunjungan', $tanggal);
                })
                ->lockForUpdate()
                ->count() + 1;

            $kode = str_pad($antrianUrut, 4, '0', STR_PAD_LEFT)
                . '/' . date('d.m.Y', strtotime($tanggal));

            $kodeAntrian = 'A-' . $kode;

            $antrianExists = Antrian::where('registrasi_id', $reg->id)->exists();

            if ($antrianExists) {
                DB::rollBack();
                return redirect()->route('appointment.index')
                    ->with('error', 'Nomor antrian sudah pernah dibuat sebelumnya.');
            }

            Antrian::create([
                'kode_antrian'  => $kodeAntrian,
                'registrasi_id' => $reg->id,
                'dokter_id'     => $dokterId,
                'pasien_id'     => $reg->pasien_id,
            ]);

            DB::commit();

            return redirect()->route('appointment.index')
                ->with('success', 'Registrasi berhasil dikonfirmasi. Nomor antrian: ' . $kodeAntrian);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('appointment.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function selesai($id)
    {
        $reg = Registrasi::findOrFail($id);
        $reg->status = 'selesai';
        $reg->save();

        return redirect()->route('appointment.index')->with('success', 'Registrasi berhasil diselesaikan');
    }

    public function batalkan($id)
    {
        $reg = Registrasi::findOrFail($id);
        $reg->status = 'batal';
        $reg->save();

        return redirect()->route('appointment.index')->with('success', 'Registrasi berhasil dibatalkan');
    }
}
