<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {
    public string $name = '';
    public string $email = '';
    public string $username = '';
    public string $alamat = '';
    public string $nik = '';
    public string $phone = '';
    public string $no_rm = '';
    public string $gender = '';
    public string $birth_date = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $id = Auth::id();
        $role_label = Auth::user()->role;
        $user = User::find($id)->where('role', $role_label)->first();
        if ($role_label == 'doctor') {
            $role_label = 'dokter';
        }elseif ($role_label == 'admin'|| $role_label == 'superadmin') {
            $role_label = 'admin';
        }else {
            $role_label = 'pasien';
        }

        $this->name = $user?->$role_label->name ?? '';
        $this->username = $user?->username ?? '';
        $this->alamat = $user?->$role_label->alamat ?? '';
        $this->nik = $user?->$role_label->nik ?? '';
        $this->phone = $user?->$role_label->phone ?? '';
        $this->no_rm = $user?->$role_label->no_rm ?? '';
        $this->gender = $user?->$role_label->gender == 'male' ? 'Laki-laki' : 'Perempuan';
        $this->birth_date = $user?->$role_label->birth_date ?? '';
        $this->birth_date = Carbon::parse($this->birth_date)->locale('id')->translatedFormat('d F Y');
        $this->email = $user?->email ?? '';

    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],


        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', username: $user->username);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit.prevent="updateProfileInformation" class="my-6 w-full space-y-6">
            <!-- Name -->
            <flux:input wire:model="name" :label="__('Name')" value="{{ $this->name }}" type="text" required autofocus autocomplete="name"
                readonly />

            <!-- Username -->
            <flux:input wire:model="username" :label="__('Username')" value="{{ $this->username }}" type="text" required autofocus autocomplete="username"  />

            @if (Auth::user()->role !== 'admin')
                <flux:input wire:model="alamat" label="Alamat" type="text" value="{{ $this->alamat }}" readonly />
                <flux:input wire:model="nik" label="NIK" type="text" value="{{ $this->nik }}" readonly />
                <flux:input wire:model="phone" label="Nomor Telepon" type="text" value="{{ $this->phone }}" readonly />

                @if (!in_array(Auth::user()->role, ['doctor', 'admin']))
                    <flux:input wire:model="no_rm" label="No. Rekam Medis (MR No)" type="text" value="{{ $this->no_rm }}" readonly />
                    <flux:input wire:model="gender" label="Jenis Kelamin" type="text" value="{{ $this->gender }}" readonly />
                    <flux:input wire:model="birth_date" label="Tanggal Lahir" type="text" value="{{ $this->birth_date }}" readonly />
                @endif
            @endif

            <!-- Email -->
            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                    <div>
                        <flux:text class="mt-4">
                            {{ __('Your email address is unverified.') }}
                            <flux:link class="text-sm cursor-pointer"
                                wire:click.prevent="resendVerificationNotification">
                                {{ __('Click here to re-send the verification email.') }}
                            </flux:link>
                        </flux:text>

                        @if (session('status') === 'verification-link-sent')
                            <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </flux:text>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Submit button -->
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full" data-test="update-profile-button">
                        {{ __('Save') }}
                    </flux:button>
                </div>
                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>


        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
