<div>
    <div class="flex-1 space-y-6">

        <!-- Header -->
        <div>
            <h2 class="text-2xl font-bold">Jadwal Praktik Dokter</h2>
        </div>

        <!-- Content Card -->
        <div class="card bg-white dark:bg-gray-800 rounded-lg shadow p-6" x-data="jadwalFilter()">

            <!-- FILTER SECTION -->
            <div class="card mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- Search -->
                <div>
                    <label for="search" class="card text-xs font-semibold text-gray-600">Cari Dokter</label>
                    <input id="search" wire:model.live.debounce.500ms="search" type="text" placeholder="Cari nama dokter..."
                        class="card mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-200 focus:outline-none">
                </div>

                <!-- Filter Spesialisasi -->
                <div>
                    <label for="spesialisasi" class="card text-xs font-semibold text-gray-600">Spesialisasi</label>
                    <select id="spesialisasi" wire:model.live.debounce.500ms="filterSpesialisasi"
                        class="card mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-200 focus:outline-none dark:focus:bg-gray-700 dark:text-white dark:focus:ring-gray-200">
                        <option value="">Semua Spesialisasi</option>

                        @foreach ($spesialisai??[] as $sp)
                        <option value="{{ $sp }}">{{ $sp }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Status -->
                <div>
                    <label for="status" class="card text-xs font-semibold text-gray-600">Status</label>
                    <select id="status" wire:model.live.debounce.500ms="filterStatus"
                        class="card mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-200 focus:outline-none dark:focus:bg-gray-700 dark:text-white dark:focus:ring-gray-200">
                        <option value="">Semua Status</option>
                        @foreach ($status??[] as $st)
                        <option value="{{ $st }}">
                            {{ $st == 1 ? 'online' : 'offline' }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- TABLE -->
            <div class="card overflow-x-auto">
                <table class="card w-full whitespace-nowrap text-xs dark:border">
                    <thead>
                        <tr class="card border-b border-gray-200  dark:text-white dark:bg-gray-600 dark:border-y">
                            <th class="text-left py-3 px-4 font-semibold  md:max-w-20 md:min-w-10">Nama
                            </th>
                            <th class="text-left py-3 px-4 font-semibold ">Dokter</th>
                            <th class="text-left py-3 px-4 font-semibold hidden md:block">Jadwal</th>
                            <th class="text-left py-3 px-4 font-semibold ">Status</th>
                            <th
                                class="py-3 px-4 font-semibold  hidden md:flex justify-center items-center text-center">
                                Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($dokters??[] as $dokter)
                        <tr class="card border-b border-gray-100 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                            x-show="matched({
                                name: '{{ strtolower($dokter->name) }}',
                                spesialis: '{{ strtolower($dokter->spesialisasi) }}',
                                status: '{{ $dokter->aktif && $dokter->aktif->aktif == 1 ? 'online' : 'offline' }}'
                            })">
                            <!-- Nama -->
                            <td
                                class="py-4 px-4  md:max-w-20 md:min-w-10 overflow-x-auto overflow-y-auto thin-scroll">
                                <div class="flex inline-flex">
                                    <div class="flex md:hidden">
                                        <a href="{{ route('registrasi.index', $dokter->id) }}"
                                            class="inline-flex items-center gap-2 px-2 mx-2 py-2 bg-green-500 dark:bg-gray-600 text-white dark:text-gray-300 rounded-lg hover:bg-green-600 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span class="hidden md:flex">Registrasi</span>
                                        </a>
                                    </div>
                                    {{ $dokter->name }}
                                </div>

                                <!-- Mobile Jadwal -->
                                <div class="card flex flex-col gap-1 block md:hidden mt-2">
                                    @foreach ($dokter->grouped_jadwals??[] as $jadwalGroup)
                                    @php
                                    $hariTampil =
                                    $jadwalGroup['hari_mulai'] === $jadwalGroup['hari_selesai']
                                    ? $jadwalGroup['hari_mulai']
                                    : $jadwalGroup['hari_mulai'] .
                                    ' – ' .
                                    $jadwalGroup['hari_selesai'];
                                    @endphp

                                    <div class="flex items-center flex-wrap gap-1">
                                        <span class="card font-semibold text-gray-800">{{ $hariTampil }}</span>
                                        <span class="card text-gray-500">•</span>
                                        <span class="card bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-md">
                                            {{ $jadwalGroup['mulai'] }} - {{ $jadwalGroup['selesai'] }}
                                        </span>
                                    </div>
                                    @endforeach
                                </div>
                            </td>

                            <!-- Spesialisasi -->
                            <td class="py-4 px-4 ">{{ $dokter->spesialisasi }}</td>

                            <!-- Jadwal desktop -->
                            <td class="py-4 px-4 hidden md:block">
                                <div class="card flex flex-col gap-1">
                                    @foreach ($dokter->grouped_jadwals??[] as $jadwalGroup)
                                    @php
                                    $hariTampil =
                                    $jadwalGroup['hari_mulai'] === $jadwalGroup['hari_selesai']
                                    ? $jadwalGroup['hari_mulai']
                                    : $jadwalGroup['hari_mulai'] .
                                    ' – ' .
                                    $jadwalGroup['hari_selesai'];
                                    @endphp

                                    <div class="flex items-center flex-wrap gap-1">
                                        <span class="card font-semibold ">{{ $hariTampil }}</span>
                                        <span class="card text-gray-500">•</span>
                                        <span class="card bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-md">
                                            {{ $jadwalGroup['mulai'] }} - {{ $jadwalGroup['selesai'] }}
                                        </span>
                                    </div>
                                    @endforeach
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="py-4 px-4">
                                @if ($dokter->aktif)
                                <span
                                    class="inline-flex px-3 py-1 rounded-full font-medium
                                        {{ $dokter->aktif->aktif == 1 ? 'bg-green-800 dark:bg-gray-600 text-white' : 'bg-red-800 dark:bg-gray-600 text-white' }}">
                                    {{ $dokter->aktif->aktif == 1 ? 'Online' : 'Offline' }}
                                </span>
                                @else
                                <span
                                    class="inline-flex px-3 py-1 rounded-full font-medium text-gray-700 bg-gray-100">
                                    Tidak Ada Data
                                </span>
                                @endif
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-4 hidden md:flex justify-center">
                                <a href="{{ route('registrasi.index', $dokter->id) }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 dark:bg-gray-600 text-white dark:text-gray-300  rounded-lg hover:bg-green-600 dark:hover:bg-gray-900 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span>Registrasi</span>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!-- ALPINE FILTER SCRIPT -->
    <script>
        function jadwalFilter() {
            return {
                search: "",
                spesialis: "",
                status: "",

                matched(d) {
                    let nameMatch = d.name.includes(this.search.toLowerCase());
                    let spesMatch = this.spesialis === "" || d.spesialis === this.spesialis.toLowerCase();
                    let statMatch = this.status === "" || d.status === this.status;

                    return nameMatch && spesMatch && statMatch;
                }
            }
        }
    </script>
</div>
