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
        <div class="flex flex-col md:flex-row justify-between md:items-center gap-3 mb-6">
            <div>
                <h1 class="text-2xl font-bold">Jadwal dan Appointment</h1>
                <p class="text-gray-500">Kelola jadwal dokter dan appointment pasien</p>
            </div>
            <div>
                <a href="{{ route('admin-create.index') }}"
                    class="px-6 py-3 bg-blue-500 dark:bg-gray-800 text-white dark:text-gray-100 rounded-lg font-medium hover:bg-blue-600 dark:hover:bg-gray-900 transition text-center block">
                    Tambah Jadwal
                </a>
            </div>
        </div>

        <!-- WRAPPER: TABLE (DESKTOP) + CARD (MOBILE) -->
        <div class="dark:bg-gray-800 shadow rounded-lg dark:border">

            <!-- TABLE (Hidden on mobile) -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full border border-gray-200 dark:border whitespace-nowrap">
                    <thead class="bg-blue-50 uppercase text-xs font-semibold text-gray-700 dark:text-white dark:bg-gray-600 ">
                        <tr>
                            <th class="px-4 py-2 text-left">Kode</th>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Nama Pasien</th>
                            <th class="px-4 py-2 text-left">Dokter</th>
                            <th class="px-4 py-2 text-left">Keluhan</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 text-gray-700 dark:text-gray-300">
                        @forelse ($registrasi as $reg)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="py-2 px-4">{{ $reg->appointment_code }}</td>
                            <td class="py-2 px-4">{{ $reg->tanggal_kunjungan }}</td>
                            <td class="py-2 px-4">{{ $reg->pasiens->name }}</td>
                            <td class="py-2 px-4">{{ $reg->dokters->name }}</td>
                            <td class="py-2 px-4">{{ $reg->keluhan }}</td>
                            <td class="py-2 px-4">
                                <span
                                    class="{{ $reg->status == 1 ? 'text-blue-600 bg-blue-100 dark:bg-gray-600' : 'text-yellow-600 bg-yellow-100 dark:bg-gray-600' }} px-2 py-1 rounded text-sm">
                                    {{ $reg->status == 1 ? 'Acc' : 'Belum' }}
                                </span>
                            </td>

                            <!-- Aksi -->
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    @if ($reg->status != 1)
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
                                    @else
                                    <button disabled
                                        class="px-4 py-2 bg-gray-300 text-gray-500 rounded-lg opacity-50 cursor-not-allowed">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-400">
                                Belum ada data pendaftaran
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- MOBILE CARD VIEW -->
            <div class="md:hidden space-y-4 p-3">
                @forelse ($registrasi as $reg)
                <div class="border border-gray-300 dark:border-gray-700 rounded-lg p-4 bg-white dark:bg-gray-800 shadow">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-semibold">{{ $reg->appointment_code }}</span>

                        <span
                            class="text-xs px-2 py-1 rounded {{ $reg->status == 1 ? 'text-blue-700 bg-blue-200' : 'text-yellow-700 bg-yellow-200' }}">
                            {{ $reg->status == 1 ? 'Acc' : 'Belum' }}
                        </span>
                    </div>

                    <p class="text-sm"><strong>Tanggal:</strong> {{ $reg->tanggal_kunjungan }}</p>
                    <p class="text-sm"><strong>Pasien:</strong> {{ $reg->pasiens->name }}</p>
                    <p class="text-sm"><strong>Dokter:</strong> {{ $reg->dokters->name }}</p>
                    <p class="text-sm mb-3"><strong>Keluhan:</strong> {{ $reg->keluhan }}</p>

                    <!-- Aksi -->
                    <div class="flex gap-2 mt-3">
                        @if ($reg->status != 1)
                        <button
                            @click="open('Konfirmasi janji?', '{{ route('appointment.konfirmasi', $reg->id) }}')"
                            class="flex-1 bg-blue-500 text-white py-2 rounded shadow hover:bg-blue-600 text-sm">
                            Konfirmasi
                        </button>
                        @else
                        <button disabled
                            class="flex-1 bg-gray-300 text-gray-500 py-2 rounded cursor-not-allowed text-sm">
                            Sudah Acc
                        </button>
                        @endif
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-400 py-6">Belum ada data pendaftaran</p>
                @endforelse
            </div>
        </div>

        <div class="mt-4">{{ $registrasi->links() }}</div>

        <!-- MODAL -->
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