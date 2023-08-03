<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Layanan Pengaduan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-center py-3 text-gray-900 dark:text-gray-100">
                    {{ __("Berikan Tanggapan") }}
                </div>
                <form method="POST" action="{{ route('berikan-tanggapan', ['id_pengaduan' => $pengaduan->id_pengaduan]) }}">
                    @csrf
            
                    {{-- <!-- Id Laporan -->
                    <div class="mt-4 ">
                        <label for="id_pengaduan" class="text-gray-900 dark:text-gray-100" >Id Laporan</label>
                        <input class="block mt-1 w-full bg-white dark:bg-gray-700 rounded-md dark:text-white" name="id_pengaduan" id="id_pengaduan" disabled value="{{ $pengaduan->id_pengaduan }}" class="block mt-1 w-full bg-white dark:bg-gray-900 rounded-md dark:text-white">
                    </div> --}}

                    <!-- Isi Laporan -->
                    <div class="mt-4 ">
                        <x-input-label for="isi_laporan" :value="__('Isi Laporan')" />
            
                        <textarea rows="3" id="about" class="block mt-1 w-full bg-white dark:bg-gray-700 rounded-md dark:text-white"
                                        type="text"
                                        name="isi_laporan"
                                        required autocomplete="isi_laporan"
                                        disabled
                                        >{{ $pengaduan->isi_laporan }}
                                    </textarea>
                    </div>

                    <!-- Status -->
                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Status:')" />
                        <select name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-700 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                            <option value="pending">Pending</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
            
                    <!-- Tanggapan -->
                    <div class="mt-4">
                        <x-input-label for="tanggapan" :value="__('Tanggapan')" />
                        <textarea name="tanggapan" class="block mt-1 w-full bg-white dark:bg-gray-900 rounded-md dark:text-white" cols="30" rows="10" required ></textarea>                
                        <x-input-error :messages="$errors->get('tanggapan')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">                
                        <x-primary-button class="ml-3">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
