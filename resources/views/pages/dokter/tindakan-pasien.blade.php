<x-layouts.app :title="__('Tindakan Pasien')">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Data Pasien</h1>
        <p class="text-gray-600 mt-1">Selamat Datang, dr. Aditya Hutagalung</p>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Data Pasien</h2>



        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left: Patient Card -->
            <div class="lg:col-span-1">
                <div class="bg-linear-to-br from-green-600 to-green-700 rounded-2xl p-6 text-white shadow-lg">
                    <div class="space-y-3">
                        <div>
                            <h3 class="text-2xl font-bold">RM-00-001</h3>
                            <p class="text-xl font-semibold mt-1">Nabila</p>
                        </div>

                        <div class="space-y-2 text-sm pt-4 border-t border-green-500">
                            <p><span class="font-medium">Tgl Masuk:</span> 2 Jan 2024</p>
                            <p><span class="font-medium">NIK:</span> 12********</p>
                            <p><span class="font-medium">JK:</span> Perempuan</p>
                            <p><span class="font-medium">TTL:</span> -</p>
                            <p><span class="font-medium">Umur:</span> 45 Tahun</p>
                            <p><span class="font-medium">No. Telp:</span> 0812-3456-7890</p>
                            <p><span class="font-medium">Alamat:</span> Jalan Setia Luhur No. 138</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Lab Examination Form -->
            <div class="lg:col-span-2"
                x-data="labForm">

                <div class="space-y-6">

                    <!-- Section Title -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Pemeriksaan Laboratorium</h3>
                        <p class="text-sm text-gray-600">Pilih Pemeriksaan</p>
                    </div>

                    <!-- Dropdown -->
                    <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 cursor-pointer"
                        @click="openDropdown = !openDropdown">

                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-gray-600"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="text-gray-600">Tambah Pemeriksaan Lab</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>

                    <!-- Dropdown Items -->
                    <div x-show="openDropdown"
                        class="border border-gray-200 rounded-lg mt-2 max-h-60 overflow-y-scroll bg-white shadow-md">

                        <template x-for="(group, groupName) in labItems">
                            <div class="border-b">
                                <p class="p-3 font-semibold text-gray-700 bg-gray-100"
                                    x-text="groupName"></p>

                                <!-- each item -->
                                <template x-for="item in group">
                                    <button @click="addTest(groupName, item)"
                                        class="w-full text-left p-3 hover:bg-gray-50">
                                        <span class="font-medium" x-text="item.name"></span>
                                        <span class="text-xs text-gray-500 ml-1">(
                                            <span x-text="item.normal"></span>
                                            <span x-text="item.unit"></span>
                                            )</span>
                                    </button>
                                </template>
                            </div>
                        </template>
                    </div>

                    <!-- Results Section -->
                    <div>
                        <h4 class="text-base font-semibold text-gray-800 mb-4">Hasil Pemeriksaan</h4>

                        <!-- Render selected groups -->
                        <template x-for="(tests, category) in selectedLab" :key="category">
                            <div class="mb-6 border border-gray-200 rounded-xl p-4 shadow-sm">

                                <!-- Category name -->
                                <h5 class="text-sm font-semibold text-gray-700 mb-4"
                                    x-text="category"></h5>

                                <!-- Cards for tests -->
                                <template x-for="(item, index) in tests" :key="index">
                                    <div class="border border-gray-200 rounded-lg p-4 mb-3">

                                        <label class="block text-sm font-medium text-gray-700 mb-2"
                                            x-text="item.name"></label>

                                        <div class="flex items-center gap-3">
                                            <input type="text"
                                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Input hasil..."
                                                x-model="item.value">
                                            <span class="text-gray-600" x-text="item.unit"></span>

                                            <button @click="removeTest(category, index)"
                                                class="p-2 text-red-500 hover:bg-red-50 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <p class="text-xs text-gray-500 mt-2">
                                            Nilai Normal :
                                            <span x-text="item.normal"></span>
                                            <span x-text="item.unit"></span>
                                        </p>
                                    </div>
                                </template>

                            </div>
                        </template>

                        <!-- Catatan Section -->
                        <div class="mt-6">
                            <h5 class="text-sm font-semibold text-gray-700 mb-2">Catatan Lab</h5>
                            <textarea rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tambahkan catatan..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alergi Form -->
            <div class="mt-10">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Form Alergi</h2>

                <!-- Alergi Terhadap -->
                <div class="mb-5">
                    <label for="alergi" class="block text-gray-700 font-medium mb-2">
                        Alergi Terhadap:
                    </label>
                    <textarea
                        id="alergi"
                        name="alergi"
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Ketik..."></textarea>
                </div>

                <!-- Reaksi -->
                <div class="mb-5">
                    <label for="reaksi" class="block text-gray-700 font-medium mb-2">
                        Reaksi:
                    </label>
                    <textarea
                        id="reaksi"
                        name="reaksi"
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Ketik..."></textarea>
                </div>
            </div>

            <!-- Keluhan dan Diagnosis -->
            <div class="mt-10">
                <!-- Keluhan Utama -->
                <h2 class="text-xl font-bold text-gray-900 mb-6">Keluhan Utama</h2>

                <div class="mb-5">
                    <label for="keluhan" class="block text-gray-700 font-medium mb-2">
                        Keluhan Utama:
                    </label>
                    <textarea
                        id="keluhan"
                        name="keluhan"
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Ketik..."></textarea>
                </div>
                <!-- Diagnosis -->
                <div class="mb-5">
                    <label for="diagnosis" class="block text-gray-700 font-medium mb-2">
                        Diagnosis:
                    </label>
                    <textarea
                        id="diagnosis"
                        name="diagnosis"
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Ketik..."></textarea>
                </div>
            </div>

            <!-- Pelayanan -->
            <div class="mt-10">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Tindakan</h2>

                <div class="mb-5">
                    <label for="nama tindakan" class="block text-gray-700 font-medium mb-2">
                        Nama Tindakan
                    </label>
                    <textarea
                        id="nama tindakan"
                        name="nama tindakan"
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Ketik..."></textarea>
                </div>

                <div class="mb-5">
                    <label for="jenis tindakan" class="block text-gray-700 font-medium mb-2">
                        Jenis Tindakan
                    </label>
                    <textarea
                        id="jenis tindakan"
                        name="jenis tindakan"
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Ketik..."></textarea>
                </div>

                <div class="mb-5">
                    <label for="catatan tindakan" class="block text-gray-700 font-medium mb-2">
                        Catatan
                    </label>
                    <textarea
                        id="catatan tindakan"
                        name="catatan tindakan"
                        rows="3"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Ketik..."></textarea>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                <button class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </button>
                <button class="px-8 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Simpan Hasil
                </button>
                <button class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    Riwayat
                </button>
            </div>

        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('labForm', () => ({
                    openDropdown: false,

                    // DATA TEMPLATE MASTER
                    labItems: {
                        "Hematologi": [{
                                name: "Hemoglobin (Hb)",
                                unit: "g/dL",
                                normal: "12-16",
                                value: ""
                            },
                            {
                                name: "Hematokrit (Hct)",
                                unit: "%",
                                normal: "36-48",
                                value: ""
                            },
                            {
                                name: "Leukosit (WBC)",
                                unit: "/µL",
                                normal: "4000-11000",
                                value: ""
                            },
                            {
                                name: "Trombosit",
                                unit: "/µL",
                                normal: "150000-450000",
                                value: ""
                            },
                            {
                                name: "Eritrosit (RBC)",
                                unit: "juta/µL",
                                normal: "4-5.5",
                                value: ""
                            },
                            {
                                name: "LED (ESR)",
                                unit: "mm/jam",
                                normal: "0-20",
                                value: ""
                            }
                        ],

                        "Kimia Darah": [{
                                name: "Glukosa Puasa",
                                unit: "mg/dL",
                                normal: "70-100",
                                value: ""
                            },
                            {
                                name: "Glukosa Sewaktu",
                                unit: "mg/dL",
                                normal: "< 200",
                                value: ""
                            },
                            {
                                name: "Ureum",
                                unit: "mg/dL",
                                normal: "10-50",
                                value: ""
                            },
                            {
                                name: "Kreatinin",
                                unit: "mg/dL",
                                normal: "0.6-1.3",
                                value: ""
                            },
                            {
                                name: "Asam Urat",
                                unit: "mg/dL",
                                normal: "3-7",
                                value: ""
                            },
                            {
                                name: "SGOT (AST)",
                                unit: "U/L",
                                normal: "< 40",
                                value: ""
                            },
                            {
                                name: "SGPT (ALT)",
                                unit: "U/L",
                                normal: "< 40",
                                value: ""
                            }
                        ],

                        "Profil Lipid": [{
                                name: "Kolesterol Total",
                                unit: "mg/dL",
                                normal: "< 200",
                                value: ""
                            },
                            {
                                name: "HDL",
                                unit: "mg/dL",
                                normal: "> 40",
                                value: ""
                            },
                            {
                                name: "LDL",
                                unit: "mg/dL",
                                normal: "< 100",
                                value: ""
                            },
                            {
                                name: "Trigliserida",
                                unit: "mg/dL",
                                normal: "< 150",
                                value: ""
                            }
                        ],

                        "Urinalisis": [{
                                name: "pH Urin",
                                unit: "-",
                                normal: "4.6-8.0",
                                value: ""
                            },
                            {
                                name: "Berat Jenis",
                                unit: "-",
                                normal: "1.005-1.030",
                                value: ""
                            },
                            {
                                name: "Protein",
                                unit: "-",
                                normal: "Negatif",
                                value: ""
                            },
                            {
                                name: "Glukosa Urin",
                                unit: "-",
                                normal: "Negatif",
                                value: ""
                            },
                            {
                                name: "Ketone",
                                unit: "-",
                                normal: "Negatif",
                                value: ""
                            },
                            {
                                name: "Bilirubin Urin",
                                unit: "-",
                                normal: "Negatif",
                                value: ""
                            }
                        ]
                    },

                    // SELECTED RESULTS
                    selectedLab: {},

                    // add
                    addTest(category, item) {
                        if (!this.selectedLab[category]) {
                            this.selectedLab[category] = [];
                        }
                        this.selectedLab[category].push({
                            ...item
                        });
                        this.openDropdown = false;
                    },

                    // remove
                    removeTest(category, index) {
                        this.selectedLab[category].splice(index, 1);

                        if (this.selectedLab[category].length === 0) {
                            delete this.selectedLab[category];
                        }
                    }
                }))
            })
        </script>

</x-layouts.app>