<x-layouts.app :title="__('Hasil Lab')">

    <div class="p-6" x-data="labResult">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">
            Hasil Pemeriksaan Laboratorium
        </h1>

        <div class="bg-white p-6 rounded-xl shadow-md space-y-10">

            <!-- ================================= -->
            <!--            HEMATOLOGI             -->
            <!-- ================================= -->
            @foreach ($hasil as $item)
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-1">
                        {{ $item->lab->first()->jenis->jenis_pemeriksaan ?? '-' }}
                    </h3>

                    <p class="text-sm text-gray-600 mb-3">
                        {{ $item->created_at->format('d F Y') }}
                    </p>

                    <table class="table-fixed w-full text-sm border border-gray-200 rounded-lg overflow-hidden">

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($item->lab->groupBy('jenis.jenis_pemeriksaan') as $kategori => $details)
                                <h3 class="text-lg font-semibold text-gray-700 mb-1">
                                    {{ $kategori }}
                                </h3>

                                <table
                                    class="table-fixed w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                                    <thead class="bg-blue-50 text-gray-700">
                                        <tr>
                                            <th class="px-4 py-2">Pemeriksaan</th>
                                            <th class="px-4 py-2">Hasil</th>
                                            <th class="px-4 py-2">Nilai Normal</th>
                                            <th class="px-4 py-2">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 text-center">

                                        @foreach ($details as $detail)
                                            <tr>
                                                <td class="px-4 py-2">{{ $detail->jenis->jenis_pemeriksaan }}</td>
                                                <td class="px-4 py-2"><span class=" @if ($detail->nilai < $detail->jenis->normal_min) text-red-600
                                                        @elseif ($detail->nilai > $detail->jenis->normal_max) text-red-600
                                                        @else text-green-600 @endif">
                                                    {{ $detail->nilai }}
                                                    </span>
                                                     {{ $detail->jenis->satuan }}</td>
                                                <td class="px-4 py-2">{{ $detail->jenis->normal_min }} -
                                                    {{ $detail->jenis->normal_max }} {{ $detail->jenis->satuan }}</td>

                                                <td
                                                    class="px-4 py-2 font-semibold
                                                        @if ($detail->nilai < $detail->jenis->normal_min) text-red-600
                                                        @elseif ($detail->nilai > $detail->jenis->normal_max) text-red-600
                                                        @else text-green-600 @endif">

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
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @endforeach


        </div>
    </div>



    <!-- =========================================== -->
    <!--                 ALPINE DATA                 -->
    <!-- =========================================== -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('labResult', () => ({

                /* DATA SAMPLE DENGAN VARIASI STATUS */
                results: {
                    "Hematologi": [{
                            name: "Hemoglobin (Hb)",
                            unit: "g/dL",
                            value: 11.2,
                            range: {
                                low: 12,
                                high: 16
                            },
                            critical: {
                                low: 7,
                                high: 20
                            }
                        }, // RENDAH
                        {
                            name: "Leukosit",
                            unit: "/µL",
                            value: 15000,
                            range: {
                                low: 4000,
                                high: 11000
                            },
                            critical: {
                                low: 2000,
                                high: 30000
                            }
                        }, // TINGGI
                        {
                            name: "Trombosit",
                            unit: "/µL",
                            value: 60000,
                            range: {
                                low: 150000,
                                high: 450000
                            },
                            critical: {
                                low: 50000,
                                high: 1000000
                            }
                        }, // BAHAYA
                    ],

                    "Kimia Darah": [{
                            name: "Glukosa",
                            unit: "mg/dL",
                            value: 95,
                            range: {
                                low: 70,
                                high: 140
                            },
                            critical: {
                                low: 40,
                                high: 400
                            }
                        }, // NORMAL
                        {
                            name: "Kolesterol",
                            unit: "mg/dL",
                            value: 230,
                            range: {
                                low: 0,
                                high: 200
                            },
                            critical: {
                                low: 0,
                                high: 350
                            }
                        }, // TINGGI
                        {
                            name: "Asam Urat",
                            unit: "mg/dL",
                            value: 2.1,
                            range: {
                                low: 3,
                                high: 7
                            },
                            critical: {
                                low: 1,
                                high: 15
                            }
                        }, // RENDAH
                    ]
                },


                /* STATUS TEXT */
                statusText(item) {
                    let v = parseFloat(item.value);

                    if (v < item.critical.low || v > item.critical.high) return "Bahaya";
                    if (v < item.range.low) return "Rendah";
                    if (v > item.range.high) return "Tinggi";
                    return "Normal";
                },

                /* STATUS COLOR */
                statusColor(item) {
                    let status = this.statusText(item);

                    return {
                        "text-green-600": status === "Normal",
                        "text-yellow-500": status === "Rendah" || status === "Tinggi",
                        "text-red-600": status === "Bahaya"
                    };
                }

            }));
        });
    </script>

</x-layouts.app>
