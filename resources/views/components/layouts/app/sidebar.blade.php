<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')">
                @if ((auth()->check() && auth()->user()->role == 'admin') || auth()->user()->role == 'superadmin')
                    <flux:navlist.item class="mb-2" icon="home" :href="route('dashboard')"
                        :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>

                    <flux:navlist.item class="mb-2" icon="home" :href="route('users.index')"
                        :current="request()->routeIs('users')" wire:navigate>
                        {{ __('Users') }}
                    </flux:navlist.item>

                    <flux:navlist.item class="mb-2" icon="cube" :href="route('dokter.index')"
                        :current="request()->routeIs('dokter.*')" wire:navigate>
                        {{ __('Data Dokter') }}
                    </flux:navlist.item>

                    <flux:navlist.item class="mb-2" icon="home" :href="route('appointmentadmin')"
                        :current="request()->routeIs('appointmentadmin')" wire:navigate>
                        {{ __('Appointments') }}
                    </flux:navlist.item>

                    <flux:navlist.item class="mb-2" icon="home" :href="route('kasir')"
                        :current="request()->routeIs('kasir')" wire:navigate>
                        {{ __('Kasir') }}
                    </flux:navlist.item>

                    <flux:navlist.item class="mb-2" icon="inbox-stack" :href="route('stok-obat.index')"
                        :current="request()->routeIs('stok-obat.*')" wire:navigate>
                        {{ __('Stok') }}
                    </flux:navlist.item>
                @endif

                @if (auth()->check() && auth()->user()->role == 'user')
                    <flux:navlist.item class="mb-2" icon="home" :href="route('dashboarduser')"
                        :current="request()->routeIs('dashboarduser')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="mb-2" icon="calendar-days" :href="route('jadwaluser')"
                        :current="request()->routeIs('jadwaluser')" wire:navigate>
                        {{ __('Jadwal') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="mb-2" icon="clipboard-document-list" :href="route('riwayatuser')"
                        :current="request()->routeIs('riwayatuser')" wire:navigate>
                        {{ __('Riwayat') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="mb-2" icon="clipboard-document-list" :href="route('hasiluser')"
                        :current="request()->routeIs('hasiluser')" wire:navigate>
                        {{ __('Hasil Lab') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="mb-2" icon="clipboard-document-list" :href="route('obatuser')"
                        :current="request()->routeIs('obatuser')" wire:navigate>
                        {{ __('Obat') }}
                    </flux:navlist.item>
                @endif

                @if (auth()->check() && auth()->user()->role == 'doctor')
                    <flux:navlist.item class="mb-2" icon="home" :href="route('dashboarddokter')"
                        :current="request()->routeIs('dashboarddokter')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="mb-2" icon="clock" :href="route('janjidokter')"
                        :current="request()->routeIs('janjidokter')" wire:navigate>
                        {{ __('Janji') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="mb-2" icon="users" :href="route('data.index')"
                        :current="request()->routeIs('data.*')" wire:navigate>
                        {{ __('Data') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="mb-2" icon="cube" :href="route('resep')"
                        :current="request()->routeIs('resep')" wire:navigate>
                        {{ __('Resep') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="mb-2" icon="cube" :href="route('jadwalpraktek')"
                        :current="request()->routeIs('jadwalpraktek')" wire:navigate>
                        {{ __('Jadwal') }}
                    </flux:navlist.item>
                @endif

            </flux:navlist.group>





        </flux:navlist>

        <flux:spacer />

        {{-- <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                target="_blank">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist> --}}

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->username" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" data-test="sidebar-menu-button" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
