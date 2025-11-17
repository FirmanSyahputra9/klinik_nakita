<x-layouts.app :title="__('Appointment')">

    <div
        x-data="{
        show: false,
        message: '',
        action: '',
        open(msg, act) {
            this.message = msg;
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

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold">Jadwal dan Appointment</h1>
                <p class="text-gray-500">Kelola jadwal dokter dan appointment pasien</p>
            </div>
        </div>

        <style>
            /* Scrollbar tipis */
            .thin-scroll::-webkit-scrollbar {
                width: 4px;
                height: 4px;
            }

            .thin-scroll::-webkit-scrollbar-thumb {
                background-color: #c0c0c0;
                border-radius: 10px;
            }

            .thin-scroll::-webkit-scrollbar-track {
                background: transparent;
            }
        </style>

        <!-- Tabel -->
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="w-full border border-gray-200 whitespace-nowrap">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Waktu</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left min-w-1 max-w-10">Nama Pasien</th>
                        <th class="px-4 py-2 text-left max-w-10">Dokter</th>
                        <th class="px-4 py-2 text-left">Jenis Layanan</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-center">
                            <div class="flex justify-between text-sm font-semibold">
                                <div class="flex-1 text-center">Konfirmasi</div>
                                <div class="flex-1 text-center">Check-in</div>
                                <div class="flex-1 text-center">Selesai</div>
                                <div class="flex-1 text-center">Batalkan</div>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 text-gray-700">

                    <!-- ROW EXAMPLE -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">08:00</td>
                        <td class="px-4 py-2">12/29/2024</td>
                        <td class="px-4 py-2 font-semibold max-w-28 overflow-auto thin-scroll">Budi Santoso</td>
                        <td class="px-4 py-2 max-w-20 overflow-auto thin-scroll">Dr. Aditya Hutagalung</td>
                        <td class="px-4 py-2">Konsultasi</td>

                        <td class="px-4 py-2">
                            <span class="text-yellow-600 bg-yellow-100 px-2 py-1 rounded text-sm">Pending</span>
                        </td>

                        <!-- Tombol Aksi -->
                        <td class="px-4 py-2 text-center">
                            <div class="flex justify-center gap-2">

                                <!-- Konfirmasi -->
                                <div class="flex-1">
                                    <button
                                        @click="open('Konfirmasi janji pasien ini?', 'konfirmasi')"
                                        class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Check-in -->
                                <div class="flex-1">
                                    <button
                                        @click="open('Pasien sudah check-in?', 'checkin')"
                                        class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Selesai -->
                                <div class="flex-1">
                                    <button
                                        @click="open('Tandai sebagai selesai?', 'selesai')"
                                        class="bg-indigo-500 text-white px-2 py-1 rounded hover:bg-indigo-600 text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Batalkan -->
                                <div class="flex-1">
                                    <button
                                        @click="open('Batalkan appointment ini?', 'batalkan')"
                                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </td>

                    </tr>

                    <!-- END ROW -->

                </tbody>
            </table>
        </div>

        <!-- MODAL ALPINE -->
        <div
            x-show="show"
            x-transition.opacity
            @click.self="close"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 px-4"
            style="display:none">
            <div
                x-show="show"
                x-transition.scale.origin.center
                class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">
                <h2 class="text-lg font-semibold text-gray-800 mb-6 text-center" x-text="message"></h2>

                <div class="flex justify-center gap-4">
                    <button
                        @click="confirm"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Iya
                    </button>

                    <button
                        @click="close"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                        Batal
                    </button>
                </div>

            </div>
        </div>

    </div>

</x-layouts.app>