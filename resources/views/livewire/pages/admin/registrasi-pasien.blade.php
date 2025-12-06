    <div>
        <div class="flex-1 space-y-6 ">
            <!-- Header -->
            <div>
                <h2 class="text-2xl font-bold">Registrasi Pasien</h2>
            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <form action="{{ route('admin-create.store') }}" method="POST" class="">
                    @csrf

                    <div class="grid grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Nama Lengkap
                            </label>
                            <select wire:model.live="selectedPasienId" name="pasien"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400">
                                <option value="" readonly>Pilih Pasien</option>
                                @forelse ($pasien as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->pasien->name }}
                                </option>
                                @empty
                                <option value="" disabled>Tidak ada pasien</option>
                                @endforelse
                            </select>
                        </div>

                        <!-- Nomor Rekam Medis -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Nomor Rekam Medis (Autofill)
                            </label>
                            <input type="text" name="no_rm" readonly value="{{ $pasienData['no_rm'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Nomor Telepon (Autofill)
                            </label>
                            <input type="text" name="no_telepon" readonly value="{{ $pasienData['phone'] ?? '' }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>

                        <!-- Info Poliklinik & Dokter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                &nbsp;
                            </label>
                            <select name="dokter" id=""
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400">
                                <option value="" readonly>Pilih Dokter</option>
                                @forelse ($dokter as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Tanggal Kunjungan
                            </label>
                            <input type="date" name="tanggal_kunjungan" wire:model.live="tanggal_kunjungan"
                                min="{{ now()->format('Y-m-d') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                                required>
                        </div>
                    </div>
                    <div>
                        <div x-data="{ keluhan: '{{ old('keluhan') }}', max: 255 }" class="w-full">

                            <div class="flex justify-between items-center mb-1">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                    Keluhan
                                </label>
                                <span class="text-xs" :class="keluhan.length >= max ? 'text-red-600' : 'text-zinc-500'">
                                    <span x-text="keluhan.length"></span>/<span x-text="max"></span>
                                </span>
                            </div>

                            <textarea name="keluhan" rows="4" x-model="keluhan" maxlength="255"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                                placeholder="Tuliskan keluhan Anda..." required></textarea>

                        </div>
                    </div>

                    <div class="block">
                        <!-- Action Buttons -->
                        <div class="flex justify-center gap-3 mt-6 items-center ">
                            <button type="button" onclick="window.history.back()"
                                class="px-6 py-2 border border-gray-300 text-gray-700 dark:text-gray-100 rounded-lg hover:bg-gray-50 transition">
                                Batal
                            </button>
                            <button type="button"
                                class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-800 transition">
                                Daftarkan Pasien yang Non-Terdaftar
                            </button>
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 dark:bg-gray-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-gray-900 transition">
                                Daftar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>