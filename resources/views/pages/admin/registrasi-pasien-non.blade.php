<x-layouts.app :title="__('Registrasi Pasien Non-Terdaftar')">

    <div>
        <div class="flex-1 space-y-6 p-6">

            <!-- Header -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    Registrasi Pasien Baru
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mt-1">
                    Isi data di bawah ini untuk mendaftarkan pasien non-terdaftar.
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

                <form method="POST" action="{{ route('users.store') }}" class="flex flex-col gap-6">
                    @csrf
                    <!-- NIK -->
                    <div x-data="{ nik: '{{ old('nik') }}'.replace(/[^0-9]/g, '') }" class="w-full">
                        <div class="flex justify-between items-center mb-1">
                            <label class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                                NIK
                            </label>
                            <span class="text-xs text-gray-400">
                                <span x-text="nik.length"></span>/16
                            </span>
                        </div>
                        <flux:input name="nik" label="" type="text" x-model="nik" maxlength="16" required
                            autocomplete="nik" :placeholder="'NIK'" x-on:input="nik = nik.replace(/[^0-9]/g, '')" />

                    </div>

                    <!-- Name -->
                    <flux:input name="name" :label="__('Name')" value="{{ old('name') }}" type="text"
                        required autofocus autocomplete="name" :placeholder="__('Full name')" />

                    <!-- Username -->
                    <flux:input name="username" :label="__('Username')" value="{{ old('username') }}" type="text"
                        required autofocus autocomplete="username" :placeholder="__('Username')" />

                    <!-- Gol Darah -->
                    <div class="flex flex-col gap-1">
                        <label for="gol_darah" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            {{ __('Golongan Darah') }}
                        </label>
                        <select name="gol_darah" id="gol_darah" required autocomplete="gol_darah"
                            class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 shadow-sm transition-colors duration-150 focus:border-indigo-500 focus:ring-indigo-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-100 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">

                            <option value="" disabled selected>{{ __('Golongan Darah') }}</option>
                            <option value="">Tidak Tahu</option>

                            <option value="A+">A+</option>
                            <option value="A-">A−</option>
                            <option value="B+">B+</option>
                            <option value="B-">B−</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB−</option>
                            <option value="O+">O+</option>
                            <option value="O-">O−</option>
                            <option value="Bombay (hh)">Bombay (hh) — Langka</option>
                            <option value="Rh Null">Rh Null — Sangat Langka</option>
                        </select>
                    </div>

                    <!-- gender -->
                    <div class="flex flex-col gap-1">
                        <label for="gender" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                            {{ __('Gender') }}
                        </label>
                        <select name="gender" id="gender" required autocomplete="gender"
                            class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 shadow-sm transition-colors duration-150 focus:border-indigo-500 focus:ring-indigo-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-100 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                            <option value="" disabled selected>{{ __('Select gender') }}</option>
                            <option value="male">{{ __('Laki-laki') }}</option>
                            <option value="female">{{ __('Perempuan') }}</option>
                        </select>
                    </div>

                    <!-- Tanggal Lahir -->
                    <flux:input name="birth_date" :label="__('Tanggal Lahir')" value="{{ old('birth_date') }}"
                        type="date" required autofocus autocomplete="tanggal_lahir"
                        :placeholder="__('Tanggal Lahir')" min="1900-01-01" max="{{ now()->toDateString() }}" />

                    <!-- Alamat -->
                    <flux:input name="alamat" :label="__('Alamat')" value="{{ old('alamat') }}" type="text"
                        required autofocus autocomplete="alamat" :placeholder="__('Alamat')" />

                    <!-- Email Address -->
                    <flux:input name="email" :label="__('Email address')" value="{{ old('email') }}" type="email"
                        required autocomplete="email" placeholder="email@example.com" />

                    <!-- Phone -->
                    <div x-data="{ phone: '{{ old('phone') }}'.replace(/[^0-9]/g, '') }" class="w-full">
                        <div class="flex justify-between items-center mb-1">
                            <label class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                                Phone
                            </label>
                            <span class="text-xs text-gray-400">
                                <span x-text="phone.length"></span>/15
                            </span>
                        </div>
                        <flux:input name="phone" label="" type="text" x-model="phone" maxlength="15" required
                            autocomplete="phone" :placeholder="'Phone'"
                            x-on:input="phone = phone.replace(/[^0-9]/g, '')" />
                    </div>

                    <!-- Password -->
                    <flux:input name="password" :label="__('Password')" type="password" required
                        autocomplete="new-password" :placeholder="__('Password')" viewable />

                    <!-- Confirm Password -->
                    <flux:input name="password_confirmation" :label="__('Confirm password')" type="password" required
                        autocomplete="new-password" :placeholder="__('Confirm password')" viewable />

                    <div class="flex items-center justify-end">
                        <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                            {{ __('Create account') }}
                        </flux:button>
                    </div>
                </form>

            </div>

        </div>
    </div>

</x-layouts.app>
