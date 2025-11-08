<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;


class AdminDashboard extends Component
{
    public $totalPengguna;
    public $penggunaBaru;
    public $penggunaHariIni;

    public function mount()
    {
        $this->totalPengguna = User::where('role', 'user')->count();
        $this->penggunaBaru = User::where('role', 'user')
            ->where('approved', true)
            ->whereNotNull('approved_at')
            ->whereBetween('approved_at', [Carbon::now()->subDays(30), Carbon::now()])
            ->count();
        $this->penggunaHariIni = User::where('role', 'user')
            ->where('approved', true)
            ->whereNotNull('approved_at')
            ->whereBetween('approved_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
            ->count();
    }

    public function render()
    {

        return view('livewire.admin-dashboard', [
            'totalPengguna' => $this->totalPengguna,
            'penggunabaru' => $this->penggunaBaru,
            'penggunaHariIni' => $this->penggunaHariIni
        ]);
    }
}
