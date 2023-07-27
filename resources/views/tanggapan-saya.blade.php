<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Layanan Pengaduan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Tanggapan Saya") }}
                </div>
                <div class="flex justify-center items-center">

                    <table class="table table-lg table-auto w-11/12 px-6 bg-white text-black dark:bg-gray-900 dark:text-white ">
                        <thead>
                        <tr>
                            <th class="border-2 px-2">No. </th>
                            <th class="border-2 px-2">Tanggal</th>
                            <th class="border-2 px-2">Isi Laporan</th>
                            <th class="border-2 px-2">Status</th>
                            <th class="border-2 px-2">Tanggapan</th>    
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border-2 px-2"></td>
                            <td class="border-2 px-2"></td>
                            <td class="border-2 px-2"></td>
                            <td class="border-2 px-2"></td>
                            <td class="border-2 px-2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
