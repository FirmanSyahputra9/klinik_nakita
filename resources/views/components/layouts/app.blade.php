<x-layouts.app.sidebar :title="$title ?? null">

    <!-- Alpine Root -->
    <div x-data="{ loading: true }" x-init="window.addEventListener('load', () => loading = false)">

        <!-- Loader Global -->
        <div x-cloak x-show="loading" x-transition:leave="transition ease-in duration-700"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center bg-white z-[9999] transition-opacity">

            <div class="container relative scale-100 transition-transform duration-700 ease-out"
                x-transition:leave-start="scale-100" x-transition:leave-end="scale-90 opacity-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-10 h-10 text-red-500 animate-spin">
                    <rect width="24" height="24" fill="none" />
                    <path d="M17.5,13.5h-4v4h-3v-4h-4v-3h4v-4h3v4h4ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Konten utama -->
    <flux:main>
        {{ $slot }}
    </flux:main>

</x-layouts.app.sidebar>
