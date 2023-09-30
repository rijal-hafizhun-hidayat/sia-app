<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Mata Pelajaran
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('mapel.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="nama" :value="'Nama Mata Pelajaran'" />
                            <x-text-input id="nama" name="nama" type="text" class="w-full" :value="old('nama')"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="kelas_id" :value="'Kelas'" />
                            <x-select-input class="w-full" id="kelas_id" name="kelas_id">
                                <option selected disabled>-- Pilih --</option>
                                @foreach ($kelass as $kelas)
                                <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('kelas_id')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="user_id" :value="'Guru'" />
                            <x-select-input class="w-full" id="user_id" name="user_id">
                                <option selected disabled>-- Pilih --</option>
                                @foreach ($guru as $x)
                                <option value="{{ $x->id }}">{{ $x->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="hari" :value="'Hari'" />
                            <x-select-input class="w-full" id="hari" name="hari">
                                <option selected disabled>--Pilih--</option>
                                @foreach ($hari as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('hari')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="waktu_mulai" :value="'Waktu Mulai'" />
                            <x-time-input name="waktu_mulai" class="w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('waktu_mulai')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="waktu_selesai" :value="'Waktu Selesai'" />
                            <x-time-input name="waktu_selesai" class="w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('waktu_selesai')" />
                        </div>
                        <div class="max-w-xl">
                            <x-primary-button>Submit</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
