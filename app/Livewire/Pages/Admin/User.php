<?php

namespace App\Livewire\Pages\Admin;

use App\Models\DokterAktif;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\User as ModelsUser;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $search = '';
    public $tab = 'pasien';
    public $filterGender = '';
    public $filterUmur = '';
    public $filterSpesialis = '';
    public $filterStatus = '';



    public function updatingFilterGender()
    {
        $this->resetPage('pasien_page');
    }

    public function updatingFilterUmur()
    {
        $this->resetPage('pasien_page');
    }

    public function updatingFilterSpesialis()
    {
        $this->resetPage('dokter_page');
    }

    public function updatingFilterStatus()
    {
        $this->resetPage('dokter_page');
    }

    protected $queryString = [
        'search' => ['except' => ''],
        'tab'    => ['except' => 'pasien'],
    ];

    public function updatingSearch()
    {
        $this->resetPage($this->tab);
    }

    public function updatingTab()
    {
        $this->resetPage($this->tab);
    }

    public function mount()
    {
        $this->search = request()->query('search', '');
        $this->tab = request()->query('tab', 'pasien');
    }

    public function render()
    {
        $pasiens = ModelsUser::join('pasiens', 'pasiens.user_id', '=', 'users.id')
            ->whereHas('pasien', function ($query) {

                if ($this->search) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                }

                if ($this->filterGender !== '') {
                    $query->where('gender', $this->filterGender);
                }

                if ($this->filterUmur !== '' && $this->filterUmur !== '60+') {
                    if (str_contains($this->filterUmur, '-')) {
                        [$min, $max] = explode('-', $this->filterUmur);
                        $query->whereRaw("TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN $min AND $max");
                    }
                } elseif ($this->filterUmur === '60+') {
                    $query->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) >= 60');
                } else {
                    $query->whereRaw('TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) BETWEEN 0 AND 150');
                }
            })
            ->orderBy('pasiens.no_rm', 'asc')
            ->select('users.*')
            ->paginate(10, ['*'], 'pasien_page');

        $pasiens->getCollection()->transform(function ($user) {
            if ($user->pasien) {
                $birthDate = Carbon::parse($user->pasien->birth_date);
                $user->pasien->birth_date_formatted = $birthDate->format('d-m-Y');
                $user->pasien->gender_label = $user->pasien->gender === 'female'
                    ? 'Perempuan'
                    : 'Laki-laki';
                $user->pasien->umur = $birthDate->age . ' tahun';
            }
            return $user;
        });

        $admins = ModelsUser::whereHas('admin', function ($q) {
            if ($this->search) {
                $q->where('name', 'like', '%' . $this->search . '%');
            }
        })
            ->with('admin')
            ->paginate(10, ['*'], 'admin_page');

        $dokters = ModelsUser::whereHas('dokter', function ($q) {
            if ($this->search) {
                $q->where('name', 'like', '%' . $this->search . '%');
            }
            if ($this->filterSpesialis) {
                $q->where('spesialisasi', $this->filterSpesialis);
            }
            if ($this->filterStatus) {
                $q->where('status', $this->filterStatus);
            }
        })
            ->with('dokter')
            ->select('users.*')
            ->paginate(10, ['*'], 'dokter_page');

        $spesialis = Dokter::select('spesialisasi')
            ->distinct()
            ->pluck('spesialisasi');

        $aktif = Dokter::select('status')
            ->distinct()
            ->pluck('status');

        $role = ModelsUser::select('role')
            ->distinct()
            ->pluck('role');

        return view('livewire.pages.admin.user', [
            'pasiens' => $pasiens,
            'admins'  => $admins,
            'dokters' => $dokters,
            'spesialis' => $spesialis,
            'aktif' => $aktif,
            'role' => $role
        ]);
    }
}
