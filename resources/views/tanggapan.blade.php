<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Layanan Pengaduan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('login') }}" class="m-10">
                    @csrf
            
                    <div class="mt-4 ">
                        <x-input-label for="password" :value="__('Tulis Tanggapan')" />
            
                        <textarea rows="3" id="about" class="block mt-1 w-full bg-white dark:bg-gray-900 rounded-md dark:text-white"
                                        type="password"
                                        name="about"
                                        required autocomplete="current-password"></textarea>
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
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
