<?php

namespace App\Livewire;

use App\Models\Antrian;
use App\Models\Kasir;
use App\Models\Registrasi;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentShort extends Component
{
    use WithPagination;
    public $totalAppointment;

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->totalAppointment = Registrasi::count();
    }

    public function render()
    {
        $appointment = Registrasi::with([
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
            ->orderBy('tanggal_kunjungan', 'asc')
            ->paginate(4, ['*'], 'Appointment-short')
            ->tap(function ($paginator) {
                $paginator->getCollection()->transform(function ($item) {
                    if ($item->tanggal_kunjungan) {
                        $item->tanggal_kunjungan = Carbon::parse($item->tanggal_kunjungan)->format('d M Y');
                    }
                    return $item;
                });
            });

        return view('livewire.appointment-short', [
            'totalAppointment' => $this->totalAppointment,
            'appointment' => $appointment
        ]);
    }
}
