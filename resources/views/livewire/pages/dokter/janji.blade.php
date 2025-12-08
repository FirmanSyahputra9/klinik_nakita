<div>
    <div x-data="{
        show: false,
        message: '',
        action: '',
        open(msg, act) { this.message = msg; this.action = act; this.show = true; },
        close() { this.show = false; }
    }" x-cloak class="flex-1 space-y-6">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Janji Temu</h1>
        </div>

        <!-- Content Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">

            <!-- FILTER -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100">Daftar Janji Temu</h2>

                <div class="flex gap-3 w-full sm:w-auto">
                    <!-- Date Filter -->
                    <input type="date" wire:model.live="filterDate"
                        class="px-4 py-2 w-full sm:w-auto border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white" />

                    <!-- Status Filter -->
                    <select class="px-4 py-2 w-full sm:w-auto border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                        <option>Semua Status</option>
                        @foreach ($status ?? [] as $item)
                        <option value="{{ $item }}">{{ $item ? 'Terkonfirmasi' : 'Menunggu' }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- ============================= -->
            <!-- DESKTOP TABLE                 -->
            <!-- ============================= -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-blue-50 text-gray-700 dark:text-white dark:bg-gray-600">
                        <tr class="border border-gray-200 dark:border-gray-700">
                            <th class="py-3 px-4 text-left text-sm font-semibold">Kode</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Tanggal</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Nama Pasien</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Dokter</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Keluhan</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Status</th>
                            <th class="py-3 px-4 text-left text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($janji ?? [] as $item)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 dark:text-gray-300">

                            <td class="py-3 px-4 text-sm font-medium">
                                {{ $item->kode_antrian }}
                            </td>

                            <td class="py-3 px-4 text-sm">
                                {{ $item->registrasi->tanggal_kunjungan }}
                            </td>

                            <td class="py-3 px-4 text-sm">
                                <p class="font-semibold">{{ $item->pasien->name }}</p>
                                <p class="text-xs">{{ $item->pasien->phone }}</p>
                            </td>

                            <td class="py-3 px-4 text-sm">
                                {{ $item->dokter->name }}
                            </td>

                            <td class="py-3 px-4 text-sm">
                                {{ $item->registrasi->keluhan }}
                            </td>

                            <td class="py-3 px-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $item->status == 0 ? 'bg-blue-600 text-white' : 'bg-green-600 text-white' }}">
                                    {{ $item->status == 0 ? 'Menunggu' : 'Terkonfirmasi' }}
                                </span>
                            </td>

                            <td class="py-3 px-4">
                                <div class="flex gap-2 justify-left">

                                    @if ($item->status == 0)
                                    <button
                                        @click="open('Konfirmasi janji?', '{{ route('janji.konfirmasi', $item->id) }}')"
                                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded text-xs dark:bg-gray-600 dark:hover:bg-gray-900">
                                        ✔
                                    </button>
                                    @else
                                    <button disabled class="bg-gray-300 text-gray-500 p-2 rounded text-xs">
                                        ✔
                                    </button>
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $janji->links() }}
                </div>
            </div>

            <!-- ============================= -->
            <!-- MOBILE CARD VIEW              -->
            <!-- ============================= -->
            <div class="md:hidden space-y-4">

                @forelse ($janji as $item)
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 bg-white dark:bg-gray-800 shadow">

                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-semibold text-gray-800 dark:text-gray-100">{{ $item->kode_antrian }}</span>

                        <span class="px-2 py-1 text-xs rounded-full font-medium
                                {{ $item->status == 0 ? 'bg-blue-600 text-white' : 'bg-green-600 text-white' }}">
                            {{ $item->status == 0 ? 'Menunggu' : 'Terkonfirmasi' }}
                        </span>
                    </div>

                    <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Tanggal:</strong> {{ $item->registrasi->tanggal_kunjungan }}</p>
                    <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Pasien:</strong> {{ $item->pasien->name }} ({{ $item->pasien->phone }})</p>
                    <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Dokter:</strong> {{ $item->dokter->name }}</p>
                    <p class="text-sm text-gray-700 dark:text-gray-300"><strong>Keluhan:</strong> {{ $item->registrasi->keluhan }}</p>

                    <div class="mt-4 flex gap-2">

                        @if ($item->status == 0)
                        <button
                            @click="open('Konfirmasi janji?', '{{ route('janji.konfirmasi', $item->id) }}')"
                            class="bg-blue-600 text-white rounded-lg py-2 px-4 w-full text-sm hover:bg-blue-700">
                            Konfirmasi
                        </button>
                        @else
                        <button disabled
                            class="bg-gray-300 text-gray-500 rounded-lg py-2 px-4 w-full text-sm">
                            Sudah ACC
                        </button>
                        @endif

                    </div>

                </div>
                @empty
                <p class="text-center text-gray-500 py-6">Tidak ada janji temu</p>
                @endforelse

                <div class="mt-3">
                    {{ $janji->links() }}
                </div>
            </div>

        </div>

        <!-- MODAL -->
        <div x-show="show" class="fixed inset-0 bg-black/50 flex items-center justify-center" style="display:none">
            <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">

                <h2 class="text-lg font-semibold text-gray-800 mb-6 text-center" x-text="message"></h2>

                <form :action="action" method="POST" class="flex justify-center gap-4">
                    @csrf

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Iya</button>

                    <button @click.prevent="close"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Batal</button>
                </form>

            </div>
        </div>

    </div>
</div>