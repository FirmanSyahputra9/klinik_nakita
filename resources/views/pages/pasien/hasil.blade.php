<x-layouts.app :title="__('Hasil Lab')">

    <div class="p-6" x-data="labResult">

        <h1 class="text-2xl font-semibold text-gray-400 mb-6">
            Hasil Pemeriksaan Laboratorium
        </h1>

        <div class="card bg-white p-6 rounded-xl shadow-md space-y-10">

            @foreach ($hasil ?? [] as $item)

            <div class="card space-y-4">

                <!-- Judul Jenis Pemeriksaan -->
                <div>
                    <!-- <h3 class="text-lg font-semibold text-gray-700">
                        {{ $item->lab->first()->jenis->jenis_pemeriksaan ?? '-' }}
                    </h3> -->
                    <div class="flex items-center gap-1">
                        <svg class="w-5 h-5 flex-shrink-0 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>

                        <p class="card text-sm text-gray-600">
                            {{ $item->created_at->format('d F Y') }}
                        </p>
                    </div>

                </div>

                <!-- LOOP KATEGORI -->
                @foreach ($item->lab->groupBy('jenis.jenis_pemeriksaan') ?? [] as $kategori => $details)

                <div class="card space-y-2">

                    <!-- Nama Kategori (Jika Mau Dipakai) -->
                    {{-- <h4 class="text-md font-semibold text-gray-700">{{ $kategori }}</h4> --}}

                    <!-- WRAPPER RESPONSIVE -->
                    <div class="card overflow-x-auto rounded-lg border border-gray-200">

                        <table class="min-w-full text-sm">

                            <thead class="bg-blue-50 text-gray-700">
                                <tr>
                                    <th class="px-4 py-2 text-left">Pemeriksaan</th>
                                    <th class="px-4 py-2 text-center">Hasil</th>
                                    <th class="px-4 py-2 text-center">Nilai Normal</th>
                                    <th class="px-4 py-2 text-center">Status</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                @foreach ($details ?? [] as $detail)

                                <tr class="text-center">

                                    <!-- Nama Pemeriksaan -->
                                    <td class="px-4 py-2 text-left">
                                        {{ $detail->jenis->jenis_pemeriksaan }}
                                    </td>

                                    <!-- Nilai Pemeriksaan -->
                                    <td class="px-4 py-2">
                                        <span class="
                                                        @if ($detail->nilai < $detail->jenis->normal_min)
                                                            text-red-600
                                                        @elseif ($detail->nilai > $detail->jenis->normal_max)
                                                            text-red-600
                                                        @else
                                                            text-green-600
                                                        @endif
                                                    ">
                                            {{ $detail->nilai }}
                                        </span>
                                        {{ $detail->jenis->satuan }}
                                    </td>

                                    <!-- Nilai Normal -->
                                    <td class="px-4 py-2">
                                        {{ $detail->jenis->normal_min }} -
                                        {{ $detail->jenis->normal_max }}
                                        {{ $detail->jenis->satuan }}
                                    </td>

                                    <!-- Status -->
                                    <td class="px-4 py-2 font-semibold
                                                    @if ($detail->nilai < $detail->jenis->normal_min)
                                                        text-red-600
                                                    @elseif ($detail->nilai > $detail->jenis->normal_max)
                                                        text-red-600
                                                    @else
                                                        text-green-600
                                                    @endif
                                                ">
                                        @if ($detail->nilai < $detail->jenis->normal_min)
                                            Rendah
                                            @elseif ($detail->nilai > $detail->jenis->normal_max)
                                            Tinggi
                                            @else
                                            Normal
                                            @endif
                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div> <!-- end responsive wrapper -->

                </div>

                @endforeach

            </div>

            @endforeach

        </div>
    </div>

    <!-- Alpine.js Data Tetap -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('labResult', () => ({
                results: {},
                statusText() {},
                statusColor() {},
            }));
        });
    </script>

</x-layouts.app>