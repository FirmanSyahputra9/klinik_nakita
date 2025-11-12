@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<x-layouts.app :title="__('Pengguna')">
    <div x-data="{ tab: 'pasien' }" class="p-6">
        <!-- Tabs -->
        <div class="flex gap-3 mb-4">
            <button @click="tab = 'pasien'"
                :class="tab === 'pasien' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">Pasien</button>
            <button @click="tab = 'dokter'"
                :class="tab === 'dokter' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">Dokter</button>
            <button @click="tab = 'admin'"
                :class="tab === 'admin' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">Admin</button>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-100">
            <table class="min-w-full text-left border-collapse">
                <thead class="bg-pink-50">
                    <tr>
                        <template x-if="tab === 'pasien'">
                            <th colspan="7" class="py-3 px-4 text-gray-700 font-semibold text-sm">Data Pasien</th>
                        </template>
                        <template x-if="tab === 'dokter'">
                            <th colspan="7" class="py-3 px-4 text-gray-700 font-semibold text-sm">Data Dokter</th>
                        </template>
                        <template x-if="tab === 'admin'">
                            <th colspan="7" class="py-3 px-4 text-gray-700 font-semibold text-sm">Data Admin</th>
                        </template>
                    </tr>
                    <template x-if="tab === 'pasien'">
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">NO</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">No. RM</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Nama</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">NIK</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Email</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Gender</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Umur</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Alamat</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Telepon</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </template>

                    <!-- Untuk Dokter -->
                    <template x-if="tab === 'dokter'">
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">NO</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Nama Lengkap</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Spesialis</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Email</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Telepon</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Alamat</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Status</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </template>

                    <!-- Untuk Admin -->
                    <template x-if="tab === 'admin'">
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">NO</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Nama</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Email</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Role</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </template>
                </thead>
                <tbody x-show="tab === 'pasien'" class=" text-[10px]">
                    @foreach ($pasiens as $pasien)
                        <tr class="border-b hover:bg-gray-50">

                            <td class="py-2 px-4 text-gray-500">{{ $pasien->approved }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->no_rm }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->name }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->nik }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->email }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->gender_label }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->umur }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->alamat }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->phone }}</td>
                            <td class="py-2 px-4 whitespace-nowrap">
                                <a href="{{ route('users.show', $pasien->id) }}"
                                    class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if (!$pasien->approved)
                                    <form action="{{ route('users.approve', $pasien->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-800 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form>
                                        <button type="submit" class="text-red-600 hover:text-red-800 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tbody x-show="tab === 'dokter'" class=" text-[10px]">
                    @foreach ($dokters as $dokter)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 text-gray-500">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->nama_lengkap }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->spesialisasi }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->email }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->phone }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->alamat }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->status }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('users.show', $dokter->id) }}"
                                    class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <!-- ADMIN -->
                <tbody x-show="tab === 'admin'" class=" text-[10px]">
                    @foreach ($admins as $admin)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 text-gray-500">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $admin->admin->name }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $admin->email }}</td>
                            <td class="py-2 px-4 text-gray-500">Admin</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('users.show', $admin->id) }}"
                                    class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- PAGINATION DI LUAR TABLE -->
        <div class="mt-4">
            <div x-show="tab === 'pasien'">
                {{ $pasiens->links() }}
            </div>
            <div x-show="tab === 'dokter'">
                {{ $dokters->links() }}
            </div>
            <div x-show="tab === 'admin'">
                {{ $admins->links() }}
            </div>
        </div>
    </div>
    </div>
</x-layouts.app>
