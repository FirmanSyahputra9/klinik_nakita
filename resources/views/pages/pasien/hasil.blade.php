<x-layouts.app :title="__('Hasil Lab')">

    <div class="p-6" x-data="labResult">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">
            Hasil Pemeriksaan Laboratorium
        </h1>

        <div class="bg-white p-6 rounded-xl shadow-md space-y-10">

            <!-- ================================= -->
            <!--            HEMATOLOGI             -->
            <!-- ================================= -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Hematologi</h3>
                <p class="text-sm text-gray-600 mb-3">20 Desember 2024</p>

                <table class="table-fixed w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 w-1/4 text-left">Pemeriksaan</th>
                            <th class="px-4 py-2 w-1/6 text-left">Hasil</th>
                            <th class="px-4 py-2 w-1/6 text-left">Satuan</th>
                            <th class="px-4 py-2 w-1/4 text-left">Nilai Normal</th>
                            <th class="px-4 py-2 w-1/6 text-left">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <template x-for="item in results.Hematologi">
                            <tr>
                                <td class="px-4 py-2" x-text="item.name"></td>
                                <td class="px-4 py-2 font-medium" x-text="item.value"></td>
                                <td class="px-4 py-2" x-text="item.unit"></td>
                                <td class="px-4 py-2 text-gray-500">
                                    <span x-text="item.range.low + ' - ' + item.range.high"></span>
                                </td>
                                <td class="px-4 py-2 font-semibold"
                                    :class="statusColor(item)">
                                    <span x-text="statusText(item)"></span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>



            <!-- ================================= -->
            <!--            KIMIA DARAH            -->
            <!-- ================================= -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-1">Kimia Darah</h3>
                <p class="text-sm text-gray-600 mb-3">20 Desember 2024</p>

                <table class="table-fixed w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 w-1/4 text-left">Pemeriksaan</th>
                            <th class="px-4 py-2 w-1/6 text-left">Hasil</th>
                            <th class="px-4 py-2 w-1/6 text-left">Satuan</th>
                            <th class="px-4 py-2 w-1/4 text-left">Nilai Normal</th>
                            <th class="px-4 py-2 w-1/6 text-left">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <template x-for="item in results['Kimia Darah']">
                            <tr>
                                <td class="px-4 py-2" x-text="item.name"></td>
                                <td class="px-4 py-2 font-medium" x-text="item.value"></td>
                                <td class="px-4 py-2" x-text="item.unit"></td>
                                <td class="px-4 py-2 text-gray-500">
                                    <span x-text="item.range.low + ' - ' + item.range.high"></span>
                                </td>
                                <td class="px-4 py-2 font-semibold"
                                    :class="statusColor(item)">
                                    <span x-text="statusText(item)"></span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>



            <!-- =============================== -->
            <!--         CATATAN DOKTER          -->
            <!-- =============================== -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Catatan Dokter</h3>
                <div class="border border-gray-200 rounded-lg p-3 text-gray-700 bg-gray-50">
                    Beberapa hasil perlu perhatian. Disarankan kontrol ulang 1 minggu.
                </div>
            </div>

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