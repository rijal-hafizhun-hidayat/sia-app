<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ubah User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')
                        <div class="max-w-xl">
                            <x-input-label for="nama" :value="'Nama Siswa / Nama Guru (dengan gelar)'" />
                            <x-text-input id="nama" name="nama" type="text" class="w-full" :value="$user->nama"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="email" :value="'Email'" />
                            <x-text-input id="email" name="email" type="email" class="w-full" :value="$user->email"/>
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="role" :value="'role'" />
                            <x-select-input class="w-full" name="role" id="role">
                                <option disabled>-- Pilih --</option>
                                @foreach ($role as $x => $val)
                                <option @if ($user->role == $x+1) selected @endif value="{{ $x+1 }}">{{ $val }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('role')" />
                        </div>
                        <div class="max-w-xl @if ($user->role != 3) hidden @endif" id="nis">
                            <x-input-label for="nis-input" :value="'Nis'" />
                            <x-text-input id="nis-input" name="nis" type="number" class="w-full" :value="$user->nis"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                        </div>
                        <div class="max-w-xl @if ($user->role != 2) hidden @endif" id="nip">
                            <x-input-label for="nis-input" :value="'NiP'" />
                            <x-text-input id="nip-input" name="nip" type="number" class="w-full" :value="$user->nip"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nip')" />
                        </div>
                        <div class="max-w-xl hidden" id="kelas">
                            <x-input-label for="kelas_id" :value="'Kelas'" />
                            <x-select-input class="w-full" name="kelas_id" id="kelas_id">
                                <option disabled selected>-- Pilih --</option>
                                @foreach ($kelas as $class)
                                <option @if ($user->kelas_id == $class->id) selected @endif value="{{ $class->id }}">{{ $class->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('kelas_id')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="gender" :value="'gender'" />
                            <x-select-input class="gender" name="gender" id="gender">
                                <option @selected($user->gender == 'Laki-laki') value="Laki-laki">Laki-laki</option>
                                <option @selected($user->gender == 'Perempuan') value="Perempuan">Perempuan</option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="username" :value="'Username'"/>
                            <x-text-input class="w-full" id="username" name="username" :value="$user->username"/>
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
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
            if($('#role').val() == 3){
                $('#kelas').removeClass('hidden');
            }
            
            const setRoleUsername = (role) => {
                const setUsername = [null, '@admin', '@guru', '@siswa']
                return setUsername[role]
            }

            const setUsernamePasswordSiswa = () => {
                $('#username').val($('#nis-input').val() + setRoleUsername($('#role').val()));
                $('#password').val(Math.floor(100000 + Math.random() * 900000));
            }
            
            const setUsernamePasswordGuruAdmin = () => {
                $('#username').val(Math.floor(Math.random() * 9000 + 1000) + setRoleUsername($("#role").val()));
                $('#password').val(Math.floor(100000 + Math.random() * 900000));
            }

            $('#role').change(function(){ 
                $('#username').val(Math.floor(Math.random() * 9000 + 1000) + setRoleUsername($("#role").val()));
                $('#password').val(Math.floor(100000 + Math.random() * 900000));

                if($('#role').val() == 3){
                    $('#kelas').removeClass('hidden');
                    $('#nis').removeClass('hidden');
                    $('#nip').addClass('hidden');

                    $('#nis').change(function() { 
                        setUsernamePasswordSiswa()
                    });
                }
                else if($('#role').val() == 2){
                    $('#kelas').addClass('hidden');
                    $('#nis').addClass('hidden');

                    $('#nip').removeClass('hidden');

                    setUsernamePasswordGuruAdmin()
                }
                else{
                    $('#kelas').addClass('hidden');
                    $('#nis').addClass('hidden');
                    $('#nip').addClass('hidden');

                    setUsernamePasswordGuruAdmin()
                }
            });
        })
    </script>
</x-app-layout>
