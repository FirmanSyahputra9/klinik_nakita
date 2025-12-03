<div class="p-4 rounded-xl  dark:bg-gray-900">
    <div class="text-lg lg:text-base font-medium text-gray-600 dark:text-gray-100">
        Status Ketersediaan:
>
        <div class="flex items-center gap-6 mt-3" wire:change="updateStatus">

            <div class="flex items-center gap-2">
                <input type="radio" id="aktif_yes" name="aktif_status" value="1" wire:model="isAktif"
                    class="h-4 w-4 text-green-500 border-gray-300 focus:ring-green-500 cursor-pointer">
                <label for="aktif_yes" class="text-base font-light text-green-600 dark:text-green-400 select-none">
                    Aktif (Tersedia)
                </label>
            </div>

            <div class="flex items-center gap-2">
                <input type="radio" id="aktif_no" name="aktif_status" value="0" wire:model="isAktif"
                    class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500 cursor-pointer">
                <label for="aktif_no" class="text-base font-light text-red-600 dark:text-red-400 select-none">
                    Tidak Aktif
                </label>
            </div>

            <div wire:loading wire:target="updateStatus" class="text-sm font-medium text-[#1F75BF]">
                Menyimpan...
            </div>
        </div>
    </div>


</div>
