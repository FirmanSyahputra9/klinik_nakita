<x-layouts.app :title="__('Pengguna')">
    <div x-data="{ tab: '{{ request('tab', 'pasien') }}' }" class="!mt-0 !p-0">

        <!-- Tabs -->
        <div class="flex gap-3 mb-4">
            <button @click="window.location='?tab=pasien'"
                :class="tab === 'pasien' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">Pasien</button>

            <button @click="window.location='?tab=dokter'"
                :class="tab === 'dokter' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">Dokter</button>

            <button @click="window.location='?tab=admin'"
                :class="tab === 'admin' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700'"
                class="px-4 py-2 rounded-lg font-medium transition">Admin</button>

        </div>

<!-- Search + Filter -->
<div class="mb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">

    <!-- Search -->
    <form method="GET" class="w-full sm:w-auto">
        <input type="hidden" name="tab" :value="tab">
        <div class="relative w-full sm:w-64">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari data..."
                class="w-full px-4 py-2 border rounded-lg text-sm focus:ring focus:ring-blue-200">

            <button type="submit" class="absolute right-3 top-2.5 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-4.35-4.35m0 0a7.5 7.5 0 1 0-10.607-10.607 7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </div>
    </form>

    <!-- FILTER UI (no logic) -->
    <!-- FILTER UI (No Logic) -->
<div class="flex gap-3">

    <!-- Filter PASIEN -->
    <template x-if="tab === 'pasien'">
        <div class="flex gap-3">
            <!-- Gender -->
            <select class="px-3 py-2 border rounded-lg text-sm text-gray-700 focus:ring focus:ring-blue-200">
                <option>Semua Gender</option>
                <option>Laki-Laki</option>
                <option>Perempuan</option>
            </select>

            <!-- Rentang Umur -->
            <select class="px-3 py-2 border rounded-lg text-sm text-gray-700 focus:ring focus:ring-blue-200">
                <option>Semua Umur</option>
                <option>0-12</option>
                <option>13-18</option>
                <option>19-35</option>
                <option>36-60</option>
                <option>60+</option>
            </select>

        </div>
    </template>

    <!-- Filter DOKTER -->
    <template x-if="tab === 'dokter'">
        <div class="flex gap-3">
            <!-- Spesialis -->
            <select class="px-3 py-2 border rounded-lg text-sm text-gray-700 focus:ring focus:ring-blue-200">
                <option>Semua Spesialis</option>
                <option>Umum</option>
                <option>Gigi</option>
                <option>Anak</option>
                <option>Kandungan</option>
                <option>THT</option>
            </select>

            <!-- Status -->
            <select class="px-3 py-2 border rounded-lg text-sm text-gray-700 focus:ring focus:ring-blue-200">
                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Nonaktif</option>
            </select>
        </div>
    </template>

    <!-- Filter ADMIN -->
    <template x-if="tab === 'admin'">
        <div class="flex gap-3">
            <!-- Role Admin -->
            <select class="px-3 py-2 border rounded-lg text-sm text-gray-700 focus:ring focus:ring-blue-200">
                <option>Semua Role</option>
                <option>Admin</option>
                <option>Super Admin</option>
            </select>

        </div>
    </template>

</div>

</div>



        <!-- Table Container -->
        <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-100">
            <table class="min-w-full text-left border-collapse overflow-x-auto whitespace-nowrap">
                <thead class="text-base">
                    <tr>
                        <template x-if="tab === 'pasien'">
                            <th class="py-2 px-4 text-gray-700 font-semibold text-sm">Data Pasien</th>
                        </template>
                        <template x-if="tab === 'dokter'">
                            <th colspan="7" class="py-2 px-4 text-gray-700 font-semibold text-sm">Data Dokter</th>
                        </template>
                        <template x-if="tab === 'admin'">
                            <th colspan="7" class="py-2 px-4 text-gray-700 font-semibold text-sm">Data Admin</th>
                        </template>
                    </tr>
                    <template x-if="tab === 'pasien'">
                        <tr class="bg-blue-50">
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">NO</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">RM</th>
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
                        <tr class="bg-blue-50">
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
                        <tr class="bg-blue-50">
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">NO</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Nama</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Email</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Role</th>
                            <th class="py-3 px-4 text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </template>
                </thead>
                <tbody x-show="tab === 'pasien'" class=" text-[14px]">
                    @forelse ($pasiens as $pasien)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 text-gray-500">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->no_rm }}</td>
                            <td class="py-2 px-4 text-gray-500">
                                {{ $pasien->pasien->name }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->nik }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->email }}
                            </td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->gender_label }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $pasien->pasien->umur }}</td>
                            <td class="py-2 px-4 text-gray-500">
                                {{ $pasien->pasien->alamat }}</td>
                            <td class="py-2 px-4 text-gray-500 ">restdgvftyhfg{{ $pasien->pasien->phone }}</td>
                            <td class="py-2 px-4 whitespace-nowrap">
                                <a href="{{ route('users.show', $pasien->id) }}"
                                    class="text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>


                                @if (!$pasien->approved && !$pasien->pasien->no_rm)
                                    <form id="approve-form-{{ $pasien->id }}"
                                        action="{{ route('users.approve', $pasien->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="button"
                                            @click="$dispatch('open-approve', { id: {{ $pasien->id }} })"
                                            class="text-green-600 hover:text-green-800 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </button>


                                    </form>
                                    <form>
                                        <button type="submit" class="text-red-600 hover:text-red-800 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-6 text-gray-400">
                                Belum ada data pasien
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tbody x-show="tab === 'dokter'" class=" text-[14px]">
                    @forelse ($dokters as $dokter)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 text-gray-500">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->name }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->spesialisasi }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->email }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->phone }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->alamat }}</td>
                            <td class="py-2 px-4 text-gray-500">{{ $dokter->dokter->status }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('users.show', $dokter->id) }}"
                                    class="text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-6 text-gray-400">
                                Belum ada data dokter
                            </td>
                        </tr>
                    @endforelse
                </tbody>

                <!-- ADMIN -->
                <tbody x-show="tab === 'admin'" class=" text-[14px]">
                    @forelse ($admins as $admin)
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
                    @empty
                        <tr>
                            <td colspan="9" class="text-center py-6 text-gray-400">
                                Belum ada data admin
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        <div class="mt-2">
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

    <!-- Modal Konfirmasi -->
    <div x-data="{ openModal: false, userId: null }" x-cloak @open-approve.window="openModal = true; userId = $event.detail.id"
        class="relative">
        <div x-show="openModal" x-transition class="fixed inset-0 flex items-center justify-center bg-black/40 z-50">
            <div class="bg-white rounded-lg shadow p-6 w-64">
                <h2 class="font-semibold text-gray-800 text-sm mb-3">Apakah Anda yakin?</h2>

                <div class="flex justify-end gap-2 text-xs">
                    <button @click="openModal=false"
                        class="px-3 py-1 bg-gray-200 text-gray-700 rounded">Batal</button>

                    <!-- Submit form yang benar -->
                    <button @click="document.getElementById(`approve-form-${userId}`).submit()"
                        class="px-3 py-1 bg-blue-600 text-white rounded">Ya</button>
                </div>
            </div>
        </div>
    </div>



</x-layouts.app>
