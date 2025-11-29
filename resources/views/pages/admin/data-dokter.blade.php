<x-layouts.app :title="__('Data Dokter')">
    <div x-data="{
        show: false,
        message: '',
        action: '',
        open(message, act) {
            this.message = message;
            this.action = act;
            this.show = true;
        },
        close() {
            this.show = false;
        },
        confirm() {
            console.log('Action:', this.action);
            this.close();
        }
    }">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Data Dokter</h1>

            <a href="{{ route('dokter.create') }}"
                class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Dokter
            </a>
        </div>
        <!-- Search -->
        <div class="mb-4 flex flex-col sm:flex-row gap-3 sm:items-center justify-between">

            <!-- Search -->
            <div class="w-full sm:w-1/3">
                <input type="text" placeholder="Cari nama atau spesialisasi..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg
                        focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Filters -->
            <div class="flex flex-col sm:flex-row gap-3">

                <!-- Filter Spesialisasi -->
                <select
                    class="px-3 py-2 border rounded-lg text-gray-700
                        focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option>Semua Spesialisasi</option>
                    <option>Umum</option>
                    <option>Anak</option>
                    <option>Gigi</option>
                </select>

                <!-- Filter Status -->
                <select
                    class="px-3 py-2 border rounded-lg text-gray-700
                        focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Tidak Aktif</option>
                </select>

            </div>
        </div>


        <!-- Table -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-blue-50 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="px-4 py-3">Nama Lengkap</th>
                        <th class="px-4 py-3">Spesialisasi</th>
                        <th class="px-4 py-3">No. Telepon</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Jadwal</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">BErgabung Pada</th>
                        {{-- <th class="px-4 py-3 text-center">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dokters as $data)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-800"><a href="{{ route('dokter.show', $data->dokter->id) }}">{{ $data->dokter->name }}</a></td>
                        <td class="px-4 py-3">{{ $data->dokter->spesialisasi }}</td>
                        <td class="px-4 py-3">{{ $data->dokter->phone }}</td>
                        <td class="px-4 py-3">{{ $data->email }}</td>
                        <td class="px-4 py-3">Senin-Jumat, 08.00-17.00</td>
                        <td class="px-4 py-3 text-center">{{ $data->dokter->status }}</td>
                        <td class="px-4 py-3 text-center">{{ $data->created_at }}</td>

                        {{-- <td class="px-4 py-3 text-center flex justify-center gap-2"> --}}
                            <!-- Online -->
                            {{-- <button @click="open('Anda yakin ingin membuat jadwal dokter online?', 'online')"
                                class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                            </button> --}}

                            <!-- Offline -->
                            {{-- <button @click="open('Anda yakin ingin membuat jadwal dokter offline?', 'offline')"
                                class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button> --}}

                            <!-- Delete -->
                            {{-- <button @click="open('Anda yakin ingin menghapus jadwal dokter?', 'delete')"
                                class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button> --}}
                        {{-- </td> --}}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-400">
                            Belum ada data dokter
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $dokters->links() }}
        </div>

        <!-- Modal Background -->
        <div
            x-show="show"
            x-transition.opacity
            @click.self="close"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center
                z-50 px-4"
            style="display:none">

            <div
                x-show="show"
                x-transition.scale.origin.center
                class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">

                <h2 class="text-lg font-semibold text-gray-800 mb-6 text-center" x-text="message"></h2>

                <div class="flex justify-center gap-4">
                    <button @click="confirm"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Iya
                    </button>

                    <button @click="close"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                        Batal
                    </button>
                </div>

            </div>
        </div>

    </div>
</x-layouts.app>
