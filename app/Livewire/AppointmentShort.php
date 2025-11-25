<?php

namespace App\Livewire;

use App\Models\Registrasi;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentShort extends Component
{
    use WithPagination;
    public $totalAppointment;


    public function mount(){
        $this->totalAppointment = Registrasi::count();
    }

    public function render()
    {
        $appointment = Registrasi::with(['pasiens', 'dokters', 'dokter_jadwals'])->orderBy('status', 'asc')->paginate(5)->map(function ($item) {
            if ($item->tanggal_kunjungan) {
                $item->tanggal_kunjungan = \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d M Y');
            }
            return $item;
        });

        return view('livewire.appointment-short', [
            'totalAppointment' => $this->totalAppointment,
            'appointment' => $appointment
        ]);
    }
}
