<x-layouts.app :title="__('Data Dokter')">
<<<<<<< HEAD
    <div>
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
        <div class="mb-4">
            <input type="text" placeholder="Cari nama atau spesialisasi..."
                class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Table -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3">Nama Lengkap</th>
                        <th class="px-4 py-3">Spesialisasi</th>
                        <th class="px-4 py-3">No. Telepon</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Dibuat Pada</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
=======
                    </tr>
                </thead>

<<<<<<< HEAD
                <tbody>
                    @foreach ($dokters as $dokter)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $dokter->nama_lengkap }}</td>
                            <td class="px-4 py-3">{{ $dokter->spesialisasi }}</td>
                            <td class="px-4 py-3">{{ $dokter->no_telepon }}</td>
                            <td class="px-4 py-3">{{ $dokter->email }}</td>
                            <td class="px-4 py-3 text-center">{{ $dokter->status }} </td>
                            <td class="px-4 py-3 text-center">{{ $dokter->created_at }} </td>
                            <td class="px-4 py-3 text-center flex justify-center gap-2">
                                <a href="#"
                                    class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <button class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $dokters->links() }}
        </div>
=======
    <!-- Pagination -->
    <div class="mt-4">
        {{ $dokters->links() }}
>>>>>>> e73829759016e4f8ed848a941fe2ce7cf7fd2b14
    </div>
</x-layouts.app>
