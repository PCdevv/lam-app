<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Layanan Pengaduan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Anda telah login sebagai masyarakat!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Semua Pengaduan") }}
                </div>
            </div>
            @if (count($pengaduans) === 0)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6 mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Belum ada pengaduan. 
                </div>
            </div>
            @else
            <div class="text-gray-900 dark:text-gray-100 grid grid-cols-4 items-stretch place-items-center gap-8 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                @foreach ($pengaduans as $pengaduan)
                <div class="w-11/12 h-auto rounded-xl bg-white dark:bg-gray-800 p-3 self-start">
                    <img src="{{ asset($pengaduan->foto) }}" alt="FotoPengaduan" >
                    <div class="">
                        Laporan :
                        {{ $pengaduan->isi_laporan }}
                    </div>
                    <div class="">
                        Tanggapan :
                        {{ $pengaduan->data_tanggapan ? $pengaduan->data_tanggapan->tanggapan : '-' }}
                    </div>
                    <div class="">
                        Tanggal Pengaduan :
                        {{ $pengaduan->data_tanggapan ? $pengaduan->data_tanggapan->tgl_tanggapan  : '-' }}
                    </div>
                    <div class="">
                        Tanggal Tanggapan :
                        {{ $pengaduan->tgl_pengaduan }}
                    </div>
                    @if ($pengaduan->status == 'pending')
                            <div class="bg-yellow-400 text-center rounded-full">
                                {{ $pengaduan->status }}
                            </div>
                    @endif
                    @if ($pengaduan->status == 'proses')
                            <div class="bg-blue-400 text-center rounded-full">
                                {{ $pengaduan->status }}
                            </div>
                    @endif
                    @if ($pengaduan->status == 'selesai')
                            <div class="bg-green-400 text-center rounded-full">
                                {{ $pengaduan->status }}
                            </div>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
