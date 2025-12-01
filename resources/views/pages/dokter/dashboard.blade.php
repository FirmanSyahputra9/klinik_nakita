<x-layouts.app :title="__('Dashboard')">
    <!-- Stats -->

    <div
        class="relative w-full max-w-6xl mx-auto rounded-xl overflow-hidden bg-linear-to-r from-white to-[#EFF4FA] p-5 py-10 mb-10 mt-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 items-start">
            <div class="flex flex-col items-start space-y-6">
                <div>
                    <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Tanggal Bergabung</p>
                    <p class="text-lg font-semibold text-gray-800 mt-1">{{ $dokter->approved_at->format('d F Y')??'' }}</p>
                </div>
                <div class="flex flex-col space-y-4 w-full">
                    <a href="mailto:nabilahdaa@gmail.com"
                        class="flex items-center bg-blue-50 border border-blue-200 rounded-full pr-4 shadow-sm hover:shadow-md transition-shadow duration-200 cursor-pointer w-full max-w-[280px]">
                        <div class="p-3 bg-blue-200 rounded-l-full">
                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 4v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7"></path>
                            </svg>
                        </div>
                        <span
                            class="ml-3 text-blue-800 font-medium text-sm md:text-base truncate">{{ $dokter->email }}</span>
                    </a>

                    <a href="tel:+6282160455334"
                        class="flex items-center bg-blue-50 border border-blue-200 rounded-full pr-4 shadow-sm hover:shadow-md transition-shadow duration-200 cursor-pointer w-full max-w-[280px]">
                        <div class="p-3 bg-blue-200 rounded-l-full">
                            <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="ml-3 text-blue-800 font-medium text-sm md:text-base">{{ $dokter->dokter->phone??'-' }}</span>
                    </a>
                </div>
            </div>

            <div
                class="col-span-1 md:col-span-1 lg:col-span-1 flex flex-col items-center text-center md:items-start md:text-left">
                <h2 class="text-3xl lg:text-4xl font-extrabold text-[#1F75BF] leading-tight">{{ $dokter->dokter->name??'-' }}
                </h2>
                <div>
                    @livewire('dokter-aktif')
                </div>


                <div
                    class="mt-4 inline-block bg-[#E2ECF6] p-1 px-3 text-sm rounded-full text-blue-700 font-semibold shadow-inner">
                    {{ $dokter->dokter->spesialisasi??'-' }}
                </div>

            </div>

            <div class="relative hidden lg:block self-stretch -mr-12 -my-10">
                <img src="{{ asset('bg-hero.png') }}" alt="Foto Dokter Nabila Huwaida"
                    class="absolute inset-0 h-full w-full object-cover object-[50%_50%]"
                    style="transform: scale(0.90);">
            </div>
        </div>
    </div>


    <div class="grid grid-cols-2 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6 mb-10 max-w-6xl mx-auto">

        {{-- Kartu 1 --}}
        <div
            class="bg-white p-3 sm:p-6 rounded-xl shadow-lg border-l-4 border-blue-500 transition duration-300 hover:shadow-xl">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] sm:text-sm font-semibold text-blue-600 mb-1 uppercase tracking-wider">
                        Pasien Hari Ini
                    </p>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-gray-900">{{ $janji->count() }}</h2>
                </div>
                <svg class="w-5 h-5 sm:w-8 sm:h-8 text-blue-500 opacity-75" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M12 20.948h.001M12 11.291c1.5 0 3.12 0 4 0s3 0 4 0a3 3 0 013 3v2a3 3 0 01-3 3h-8a3 3 0 01-3-3v-2a3 3 0 013-3h8a3 3 0 013 3v2a3 3 0 01-3 3H12">
                    </path>
                </svg>
            </div>
        </div>

        {{-- Kartu 2 --}}
        <div
            class="bg-white p-3 sm:p-6 rounded-xl shadow-lg border-l-4 border-green-500 transition duration-300 hover:shadow-xl">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] sm:text-sm font-semibold text-green-600 mb-1 uppercase tracking-wider">
                        Konsultasi Selesai
                    </p>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-gray-900">8</h2>
                </div>
                <svg class="w-5 h-5 sm:w-8 sm:h-8 text-green-500 opacity-75" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
        </div>

        {{-- Kartu 3 --}}
        <div
            class="bg-white p-3 sm:p-6 rounded-xl shadow-lg border-l-4 border-yellow-500 transition duration-300 hover:shadow-xl">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] sm:text-sm font-semibold text-yellow-600 mb-1 uppercase tracking-wider">
                        Menunggu
                    </p>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-gray-900">{{ $janji->where('status', false)->count()??'0' }}</h2>
                </div>
                <svg class="w-5 h-5 sm:w-8 sm:h-8 text-yellow-500 opacity-75" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>
        </div>

        {{-- Kartu 4 --}}
        <div
            class="bg-white p-3 sm:p-6 rounded-xl shadow-lg border-l-4 border-red-500 transition duration-300 hover:shadow-xl">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-[10px] sm:text-sm font-semibold text-red-600 mb-1 uppercase tracking-wider">
                        Antrian
                    </p>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-gray-900">{{ $janji->where('status', true)->count()??'0' }}</h2>
                </div>
                <svg class="w-5 h-5 sm:w-8 sm:h-8 text-red-500 opacity-75" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                    </path>
                </svg>
            </div>
        </div>

    </div>


    <div class="w-full mt-8 py-2 bg-white rounded-xl">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Janji Temu Berikutnya</h2>

        <!-- Bikin scroll horizontal di HP -->
        <div class="overflow-x-auto border border-gray-200 rounded-lg">
            <table class="min-w-max w-full text-sm text-gray-700">

                <!-- Header -->
                <thead class="bg-gray-50 text-gray-600 font-semibold border-b">
                    <tr>
                        <th class="px-4 py-3 text-left">Dokter</th>
                        <th class="px-4 py-3 text-left">Nama Pasien</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-left">Jam</th>
                        <th class="px-4 py-3 text-left">Gejala</th>
                        <th class="px-4 py-3 text-center">Status</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>
                    @forelse ( $janji->where('status', true) as $item)
                        <tr class="hover:bg-blue-50 border-b">
                            <td class="px-4 py-3 flex items-center space-x-2">
                                <div class="w-6 h-6 rounded-full bg-blue-100 border border-blue-300"></div>
                                <span class="font-medium truncate">{{ $item->dokters->name }}??'-'</span>
                            </td>
                            <td class="px-4 py-3 truncate">{{ $item->pasiens->name??'-' }}</td>
                            <td class="px-4 py-3">{{ $item->tanggal_kunjungan??'-' }}</td>
                            <td class="px-4 py-3">{{ $item->jam_berobat??'-' }}</td>
                            <td class="px-4 py-3 truncate">{{ $item->keluhan??'-' }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="bg-blue-200 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                                    Antrian
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-400">
                                Belum ada janji temu
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</x-layouts.app>
