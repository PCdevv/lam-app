<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Layanan Pengaduan Masyarakat') }}
        </h2>
    </x-slot>
    <div class="flex max-w-7xl mx-auto justify-center items-start">
        <div class="py-12 w-1/4 no-print">
            <div class="sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-center py-3 text-gray-900 dark:text-gray-100">
                        {{ __("Daftarkan Pengguna") }}
                    </div>
                    <form method="POST" action="{{ route('daftarkan-pengguna') }}">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div>
                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus autocomplete="nama_lengkap" />
                            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                        </div>
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <!-- NIK -->
                        <div>
                            <x-input-label for="nik" :value="__('NIK')" />
                            <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" autofocus autocomplete="nik" />
                            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                        </div>
                        <!-- Telp -->
                        <div>
                            <x-input-label for="telp" :value="__('Nomor Telepon')" />
                            <x-text-input id="telp" class="block mt-1 w-full" type="text" name="telp" :value="old('telp')" required autofocus autocomplete="telp" />
                            <x-input-error :messages="$errors->get('telp')" class="mt-2" />
                        </div>
                
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                
                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />
                
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Select Role -->
                        <div class="mt-4">
                            <x-input-label for="level" :value="__('Register as:')" />
                            <select name="level" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-700 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                                <option value="masyarakat">Masyarakat</option>
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="py-12 w-3/4">
            <div class="sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                        {{ __("Semua Pengguna") }}
                        <button id="print" class="no-print flex items-center rounded-md bg-blue-400 my-1 p-2 hover:bg-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                            </svg>
                            Download
                        </button>
                        @push('scripts')
                            <script>
                                const printButton = document.getElementById("print");
    
                                printButton.addEventListener("click", function () {
                                    window.print();
                                });
    
                            </script>
                        @endpush
                    </div>

                    <div class="flex justify-center items-center">
                        <table class="table table-lg table-auto w-11/12 px-6 bg-white text-black dark:bg-gray-900 dark:text-white ">
                            <thead>
                                <tr>
                                    <th class="border-2 px-2">No. </th>
                                    <th class="border-2 px-2">NIK</th>
                                    <th class="border-2 px-2">Nama Lengkap</th>
                                    <th class="border-2 px-2">Username</th>
                                    <th class="border-2 px-2">Email</th>    
                                    <th class="border-2 px-2">Telp</th>    
                                    <th class="border-2 px-2">Level</th>    
                                    <td class="border-2 px-2 no-print"></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="border-2 px-2">{{ $user->id }}</td>
                                        <td class="border-2 px-2">{{ $user->nik }}</td>
                                        <td class="border-2 px-2">{{ $user->nama_lengkap }}</td>
                                        <td class="border-2 px-2">{{ $user->name }}</td>
                                        <td class="border-2 px-2">{{ $user->email }}</td>
                                        <td class="border-2 px-2">{{ $user->telp }}</td>
                                        <td class="border-2 px-2">{{ $user->level }}</td>
                                        <td class="border-2 px-2  no-print">
                                            <form action="{{ route('edit-pengguna', ['id' => $user->id]) }}" method="get">
                                                <button class="rounded-md bg-yellow-400 my-1 p-2 hover:bg-yellow-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form  id="deleteForm" action="{{ route('hapus-pengguna', ['id' => $user->id]) }}" method="post">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>