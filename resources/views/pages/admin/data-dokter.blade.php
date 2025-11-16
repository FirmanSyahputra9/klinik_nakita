<x-layouts.app :title="__('Data Dokter')">
    <div>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Data Dokter</h1>

            <a href="{{ route('dokter.create') }}"
                class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Dokter
            </a>
        </div>

        <!-- Search -->
        <div class="mb-4">
            <input type="text" placeholder="Cari nama atau spesialisasi..."
                class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Table -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-4 py-3">Nama Lengkap</th>
                        <th class="px-4 py-3">Spesialisasi</th>
                        <th class="px-4 py-3">No. Telepon</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Jadwal</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Dibuat Pada</th>
                        <th class="px-4 py-3 text-center">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokters as $dokter)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $dokter->name }}</td>
                            <td class="px-4 py-3">{{ $dokter->spesialisasi }}</td>
                            <td class="px-4 py-3">{{ $dokter->no_telepon }}</td>
                            <td class="px-4 py-3">{{ $dokter->email }}</td>
                            <td class="px-4 py-3">Senin-Jumat, 08.00-17.00</td>
                            <td class="px-4 py-3 text-center">{{ $dokter->status }} </td>
                            <td class="px-4 py-3 text-center">{{ $dokter->created_at }} </td>
                            <td class="px-4 py-3 text-center flex justify-center gap-2">
                                <button onclick="openModal('Anda yakin ingin membuat jadwal dokter online?', 'online')"
                                    href="#"
                                    class="p-2 bg-green-500 text-white rounded hover:bg-green-600 transition cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </button>
                                <button
                                    onclick="openModal('Anda yakin ingin membuat jadwal dokter offline?', 'offline')"
                                    class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <button onclick="openModal('Anda yakin ingin menghapus jadwal dokter?', 'delete')"
                                    class="p-2 bg-red-500 text-white rounded hover:bg-red-600 transition cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Background -->
        <div id="customModal"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center
            opacity-0 pointer-events-none transition-opacity duration-300 z-50">

            <!-- Modal Box -->
            <div id="modalBox"
                class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md scale-75 opacity-0
                transition-all duration-300">

                <h2 id="modalMessage" class="text-lg font-semibold text-gray-800 mb-6 text-center">
                    <!-- Pesan akan diset lewat JS -->
                </h2>

                <div class="flex justify-center gap-4">
                    <button id="confirmYes"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Iya
                    </button>

                    <button id="confirmNo"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                        Batal
                    </button>
                </div>

            </div>
        </div>



        <!-- Pagination -->
        <div class="mt-4">
            {{ $dokters->links() }}
            <p>tes</p>
        </div>

        <script>
            const modal = document.getElementById("customModal");
            const modalBox = document.getElementById("modalBox");
            const modalMessage = document.getElementById("modalMessage");
            const btnYes = document.getElementById("confirmYes");
            const btnNo = document.getElementById("confirmNo");

            let currentAction = null;

            function openModal(message, action) {
                modalMessage.textContent = message;
                currentAction = action;

                modal.classList.remove("pointer-events-none");
                modal.classList.add("opacity-100");

                // Pop-in animation
                setTimeout(() => {
                    modalBox.classList.remove("opacity-0", "scale-75");
                    modalBox.classList.add("opacity-100", "scale-100");
                }, 50);
            }

            function closeModal() {
                // Pop-out animation
                modalBox.classList.remove("scale-100", "opacity-100");
                modalBox.classList.add("scale-75", "opacity-0");

                setTimeout(() => {
                    modal.classList.add("pointer-events-none");
                    modal.classList.remove("opacity-100");
                }, 200);
            }

            // Tombol Batal
            btnNo.onclick = closeModal;

            // Tombol Iya (implementasi action di sini)
            btnYes.onclick = () => {
                console.log("Action:", currentAction);
                closeModal();
            };
        </script>

</x-layouts.app>
