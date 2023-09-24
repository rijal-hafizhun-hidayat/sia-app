<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            tambah user
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="#" method="POST" class="space-y-5">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="nama" :value="'Nama Siswa / Nama Guru (dengan gelar)'" />
                            <x-text-input id="nama" name="nama" type="text" class="w-full" :value="old('nama')"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="kelas_id" :value="'Kelas'" />
                            <x-select-input class="w-full" id="kelas_id" name="kelas_id">
                                <option selected disabled>-- Pilih --</option>
                                @foreach ($kelas as $val)
                                <option value="{{ $val->id }}">{{ $val->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('kelas_id')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="role" :value="'role'" />
                            <x-select-input class="w-full" name="role" id="role">
                                <option disabled selected>-- Pilih --</option>
                                <option value="1">Admin</option>
                                <option value="2">Guru</option>
                                <option value="3">Siswa</option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('role')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="username" :value="'Username'"/>
                            <x-text-input disabled class="w-full" id="username" name="username"/>
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="password" :value="'Password'"/>
                            <x-text-input disabled class="w-full" id="password" name="password"/>
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        <div class="max-w-xl">
                            <x-primary-button>Submit</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="module">
        $(document).ready(function(){
            const setRoleUsername = (role) => {
                const setUsername = [null, '@admin', '@guru', '@siswa']
                return setUsername[role]
            }

            $('#role').change(function(){ 
                $('#username').val(Math.floor(Math.random() * 9000 + 1000) + setRoleUsername($("#role").val()));
                $('#password').val(Math.floor(Math.random() * 9000 + 1000));
            });
        })
    </script>
</x-app-layout>
