<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Layanan Pengaduan Masyarakat') }}
        </h2>
    </x-slot>

    <div class="flex max-w-7xl mx-auto justify-center items-start">
        <div class="py-12 w-1/4">
            <div class="sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-center py-3 text-gray-900 dark:text-gray-100">
                        {{ __("Berikan Tanggapan") }}
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                
                        <!-- Laporan -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Laporan:')" />
                            <select name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-700 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                <option value="pending">Pending</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
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
                            <x-input-label for="password" :value="__('Tanggapan')" />
                
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center justify-end mt-4">                
                            <x-primary-button class="ml-3">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="py-12 w-3/4">
            <div class="sm:px-6 lg:px-8">
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
                                <td class="border-2 px-2"></td>
                            </tr>
                            </thead>
                            <tbody>
                                @if (count($tanggapans) === 0)
                                    <tr>
                                        <td colspan="8" class="border-2 px-2 text-center">Belum ada tanggapan</td>
                                    <tr>
                                @else
                                    @foreach ($tanggapans as $tanggapans)
                                    <tr>
                                        <td class="border-2 px-2"></td>
                                        <td class="border-2 px-2"></td>
                                        <td class="border-2 px-2"></td>
                                        <td class="border-2 px-2"></td>
                                        <td class="border-2 px-2"></td>
                                        <td class="border-2 px-2">
                                            <form action="{{ route('edit-pengguna', ['id' => $tanggapan->id]) }}" method="get">
                                                <button class="rounded-md bg-yellow-400 my-1 p-2 hover:bg-yellow-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form  id="deleteForm" action="{{ route('hapus-pengguna', ['id' => $tanggapan->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="rounded-md bg-red-400 my-1 p-2 hover:bg-red-800" onclick="showConfirmation()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            @push('scripts')
                                                <script>
                                                    function showConfirmation() {
                                                        const shouldDelete = confirm('Are you sure you want to delete this user?');
                                                        if (shouldDelete) {
                                                            document.getElementById('deleteForm').submit();
                                                        } else {
                                                            
                                                        }
                                                    }
                                                </script>
                                            @endpush
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
