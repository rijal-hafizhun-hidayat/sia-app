<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Umbah Mata Pelajaran
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('mapel.update', ['id' => $mapel->id]) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')
                        <div class="max-w-xl">
                            <x-input-label for="nama" :value="'Nama Mata Pelajaran'" />
                            <x-text-input id="nama" name="nama" type="text" class="w-full" :value="$mapel->nama"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="kelas_id" :value="'Kelas'" />
                            <x-select-input class="w-full" id="kelas_id" name="kelas_id">
                                <option selected disabled>-- Pilih --</option>
                                @foreach ($kelas as $val)
                                <option @if ($mapel->kelas->id == $val->id) selected @endif value="{{ $val->id }}">{{ $val->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('kelas_id')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="user_id" :value="'Guru'" />
                            <x-select-input class="w-full" id="user_id" name="user_id">
                                <option selected disabled>-- Pilih --</option>
                                @foreach ($guru as $x)
                                <option @if ($mapel->user_id == $x->id) selected @endif value="{{ $x->id }}">{{ $x->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="hari" :value="'Hari'" />
                            <x-select-input class="w-full" id="hari" name="hari">
                                <option selected disabled>--Pilih--</option>
                                @foreach ($hari as $day)
                                <option @if ($mapel->hari == $day) selected @endif value="{{ $day }}">{{ $day }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="waktu_mulai" :value="'Waktu Mulai'" />
                            <x-time-input name="waktu_mulai" class="w-full" value="{{ timeFormat($mapel->schedule_start_at) }}"/>
                            <x-input-error class="mt-2" :messages="$errors->get('waktu_mulai')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="waktu_selesai" :value="'Waktu Selesai'" />
                            <x-time-input name="waktu_selesai" class="w-full" value="{{ timeFormat($mapel->schedule_end_at) }}"/>
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
