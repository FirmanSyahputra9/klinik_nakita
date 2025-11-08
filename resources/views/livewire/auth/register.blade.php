<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
            @csrf
            <!-- NIK -->
            <flux:input name="nik" :label="'NIK'" type="text" :value="old('nik')" required autofocus autocomplete="nik"
                :placeholder="'NIK'" />

            <!-- Name -->
            <flux:input name="name" :label="__('Name')" value="{{ old('name') }}" type="text" required autofocus autocomplete="name"
                :placeholder="__('Full name')" />

            <!-- Username -->
            <flux:input name="username" :label="__('Username')" value="{{ old('username') }}" type="text" required autofocus
                autocomplete="username" :placeholder="__('Username')" />

            <!-- gender -->
            <div class="flex flex-col gap-1">
                <label for="gender" class="text-sm font-medium text-zinc-700 dark:text-zinc-300">
                    {{ __('Gender') }}
                </label>
                <select name="gender" id="gender" required autocomplete="gender"
                    class="block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 shadow-sm transition-colors duration-150 focus:border-indigo-500 focus:ring-indigo-500 dark:border-zinc-700 dark:bg-zinc-800 dark:text-zinc-100 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                    <option value="" disabled selected>{{ __('Select gender') }}</option>
                    <option value="male">{{ __('Male') }}</option>
                    <option value="female">{{ __('Female') }}</option>
                </select>
            </div>

            <!-- Tanggal Lahir -->
            <flux:input name="birth_date" :label="__('Tanggal Lahir')" value="{{ old('birth_date') }}" type="date" required autofocus
                autocomplete="tanggal_lahir" :placeholder="__('Tanggal Lahir')" />


            <!-- Email Address -->
            <flux:input name="email" :label="__('Email address')" value="{{ old('email') }}" type="email" required autocomplete="email"
                placeholder="email@example.com" />

            <!-- Phone -->
            <flux:input name="phone" :label="__('Phone')" value="{{ old('phone') }}" type="text" required autofocus autocomplete="phone"
                :placeholder="__('Phone')" />

            <!-- Password -->
            <flux:input name="password" :label="__('Password')" type="password" required autocomplete="new-password"
                :placeholder="__('Password')" viewable />

            <!-- Confirm Password -->
            <flux:input name="password_confirmation"  :label="__('Confirm password')" type="password" required
                autocomplete="new-password" :placeholder="__('Confirm password')" viewable />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button">
                    {{ __('Create account') }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Already have an account?') }}</span>
            <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
        </div>
    </div>
</x-layouts.auth>
