<x-layouts.app.sidebar :title="$title ?? null">

    <!-- Alpine Root -->
    <div x-data="{ loading: true }" x-init="loading = false">

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

    <!-- Notifikasi Flash -->
    <div x-data="{ show: true }" x-show="show" x-transition.opacity x-init="setTimeout(() => show = false, 3000)"
        class="fixed top-4 right-4 z-[9999]">
        @if (session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded shadow-lg flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded shadow-lg flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                {{ session('error') }}
            </div>
        @endif
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            if (Notification.permission !== "granted") {
                Notification.requestPermission();
            }

            @if (session('success'))
                if (Notification.permission === "granted") {
                    new Notification("Berhasil 🎉", {
                        body: "{{ session('success') }}",
                        icon: "/icon-success.png"
                    });
                }
            @endif

            @if (session('error'))
                if (Notification.permission === "granted") {
                    new Notification("Gagal ❌", {
                        body: "{{ session('error') }}",
                        icon: "/icon-error.png"
                    });
                }
            @endif

        });
    </script>
</x-layouts.app.sidebar>
