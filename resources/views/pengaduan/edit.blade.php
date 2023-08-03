<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Layanan Pengaduan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('edit-laporan', ['id_pengaduan' => request()->id_pengaduan]) }}" class="m-10" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
            
                    <div class="px-2 flex justify-center items-center">
                        <img src="{{ asset($pengaduan->foto) }}" alt="foto_pengaduan" class="border-2  rounded-lg w-48 h-auto">
                    </div>
                    <div>
                        <x-input-label for="foto" :value="__('Ubah Foto')" />
                        <input id="foto" class="block mt-1 w-full bg-white dark:bg-gray-900 rounded-md dark:text-white" type="file" accept="image/*" name="foto" :value="old('foto')" autofocus autocomplete="isi_laporan" />
                        <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                    </div>
            
                    <div class="mt-4 ">
                        <x-input-label for="isi_laporan" :value="__('Tulis Laporan')" />
            
                        <textarea rows="3" id="about" class="block mt-1 w-full bg-white dark:bg-gray-900 rounded-md dark:text-white"
                        :value="old('isi_laporan')"
                                        type="text"
                                        name="isi_laporan"
                                        required autocomplete="isi_laporan">{{ $pengaduan->isi_laporan }}</textarea>
            
                        <x-input-error :messages="$errors->get('isi_laporan')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">    
                        <x-primary-button class="ml-3">
                            {{ __('Kirim') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
