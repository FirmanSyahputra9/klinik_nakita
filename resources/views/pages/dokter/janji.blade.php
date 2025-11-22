<x-layouts.app :title="__('Janji')">
    <div x-data="{
        show: false,
        message: '',
        action: '',

        open(msg, act) {
            this.message = msg;
            this.action = act;
            this.show = true;
        },
        close() {
            this.show = false;
        }
    }"x-cloak class="flex-1 space-y-6">

        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Janji Temu</h1>
            </div>

        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <!-- Filter Section -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Daftar Janji Temu</h2>

                <div class="flex items-center gap-3">
                    <!-- Date Filter -->
                    <input type="date" value="2024-01-15"
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />

                    <!-- Status Filter -->
                    <select
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Semua Status</option>
                        <option>Menunggu</option>
                        <option>Selesai</option>
                        <option>Dibatalkan</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Kode</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Tanggal</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Nama Pasien</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Dokter</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Keluhan</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($janji as $item)
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-4">
                                    <span class="text-sm font-medium text-gray-900">{{ $item->kode_antrian }}</span>
                                </td>

                                <td class="py-4 px-4">
                                    <span
                                        class="text-sm font-medium text-gray-900">{{ $item->registrasi->tanggal_kunjungan }}</span>
                                </td>

                                <td class="py-4 px-4">
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $item->pasien->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $item->pasien->phone }}</p>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-700">{{ $item->dokter->name }}</span>
                                </td>

                                <td class="py-4 px-4">
                                    <span class="text-sm text-gray-700">{{ $item->registrasi->keluhan }}</span>
                                </td>

                                <td class="py-4 px-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $item->status == 0 ? 'bg-blue-600' : 'bg-green-600' }}">
                                        {{ $item->status == 0 ? 'Menunggu' : 'Terkonfirmasi' }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex justify-center gap-2">
                                        <!-- Konfirmasi -->
                                        <div class="flex-1">
                                            <button
                                                @click="open('Konfirmasi janji?', '{{ route('janji.konfirmasi', $item->id) }}')"
                                                class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Selesai -->
                                        <div class="flex-1">
                                            <button
                                                @click="open('Tandai sebagai selesai?', 'selesai', {{ $item->id }})"
                                                class="bg-indigo-500 text-white px-2 py-1 rounded hover:bg-indigo-600 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Batalkan -->
                                        <div class="flex-1">
                                            <button
                                                @click="open('Batalkan appointment ini?', 'batalkan', {{ $item->id }})"
                                                class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <!-- Empty State (jika tidak ada data) -->
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="text-gray-500 text-sm">Tidak ada janji temu</p>
            </div>
        </div>

        <!-- MODAL ALPINE -->
        <div x-show="show" class="fixed inset-0 bg-black/50 flex items-center justify-center" style="display:none">

            <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">

                <h2 class="text-lg font-semibold text-gray-800 mb-6 text-center" x-text="message"></h2>

                <form :action="action" method="POST" class="flex justify-center gap-4">
                    @csrf

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Iya
                    </button>

                    <button @click.prevent="close"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                        Batal
                    </button>
                </form>

            </div>

        </div>

    </div>
</x-layouts.app>
