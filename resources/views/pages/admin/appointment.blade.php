<x-layouts.app :title="__('Appointment')">

    <div x-data="{
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
        }
    }" x-cloak>


        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold">Jadwal dan Appointment</h1>
                <p class="text-gray-500">Kelola jadwal dokter dan appointment pasien</p>
            </div>
            <div>
                <a href="{{ route('admin-create.index') }}"
                    class="px-6 py-3 bg-blue-500 dark:bg-gray-800 text-white dark:text-gray-100 rounded-lg font-medium hover:bg-blue-600 dark:hover:bg-gray-900 transition">
                    Tambah Jadwal
                </a>
            </div>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto dark:bg-gray-800  shadow rounded-lg dark:border">
            <table class="w-full border border-gray-200 dark:border whitespace-nowrap">
                <thead class="bg-blue-50 uppercase text-xs font-semibold text-gray-700 dark:text-white dark:bg-gray-600 ">
                    <tr>
                        <th class="px-4 py-2 text-left">Kode</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left ">Nama Pasien</th>
                        <th class="px-4 py-2 text-left">Dokter</th>
                        <th class="px-4 py-2 text-left">Keluhan</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-center">Aksi </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-gray-700">
                    @forelse ($registrasi as $reg)
                        <tr class="border-b dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 dark:hover:text-white">
                            <td class="py-2 px-4 ">{{ $reg->appointment_code }}</td>
                            <td class="py-2 px-4 ">{{ $reg->tanggal_kunjungan }}</td>
                            <td class="py-2 px-4 ">{{ $reg->pasiens->name }}</td>
                            <td class="py-2 px-4 ">{{ $reg->dokters->name }}</td>
                            <td class="py-2 px-4 ">{{ $reg->keluhan }}</td>
                            <td class="py-2 px-4 ">
                                <span
                                    class="{{ $reg->status == 1 ? 'text-blue-600 dark:text-gray-100 bg-blue-100 dark:bg-gray-600 ' : 'text-yellow-600 dark:text-gray-100 bg-yellow-100 dark:bg-gray-600' }} px-2 py-1 rounded text-sm">{{ $reg->status == 1 ? 'Acc' : 'Belum' }}
                                </span>
                            </td>
                            <!-- Tombol Aksi -->
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    @if ($reg->status != 1)
                                        <div class="flex-1">
                                            <button
                                                @click="open('Konfirmasi janji?', '{{ route('appointment.konfirmasi', $reg->id) }}')"
                                                class="bg-blue-500 dark:bg-gray-700 text-white px-2 py-1 rounded hover:bg-blue-600 text-xs">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            </button>
                                        </div>
                                    @else
                                        <div class="flex-1">
                                            <button disabled
                                                class="px-4 py-2 bg-gray-300 text-gray-500 rounded-lg opacity-50 cursor-not-allowed">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            </button>
                                        </div>
                                    @endif
                                    <!-- Konfirmasi -->


                                    <!-- Selesai -->
                                    {{-- <div class="flex-1">
                                        <button @click="open('Tandai sebagai selesai?', 'selesai', {{ $reg->id }})"
                                            class="bg-indigo-500 text-white px-2 py-1 rounded hover:bg-indigo-600 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                            </svg>
                                        </button>
                                    </div> --}}

                                    <!-- Batalkan -->
                                    {{-- <div class="flex-1">
                                        <button
                                            @click="open('Batalkan appointment ini?', 'batalkan', {{ $reg->id }})"
                                            class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div> --}}

                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-400">
                                Belum ada data pendaftaran
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>{{ $registrasi->links() }}</div>

        <!-- MODAL ALPINE -->
        <div x-show="show" class="fixed inset-0 bg-black/50 flex items-center justify-center" style="display:none">

            <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">

                <h2 class="text-lg font-semibold text-gray-800 mb-6 text-center" x-text="message"></h2>

                <form :action="action" method="POST" class="flex justify-center gap-4">
                    @csrf

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Iya
                    </button>

                    <button @click.prevent="close"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                        Batal
                    </button>
                </form>

            </div>

        </div>

    </div>

</x-layouts.app>
