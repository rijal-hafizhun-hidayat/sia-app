<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Guru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('guru.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="nama" :value="'Nama'" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 w-full" :value="old('nama')"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="mapel_id" :value="'Mata Pelajaran'" />
                            <x-select-input class="w-full" id="mapel_id" name="mapel_id">
                                <option selected disabled>-- Pilih --</option>
                                @foreach ($mapels as $mapel)
                                <option value="{{ $mapel->id }}">{{ $mapel->nama }} - {{ $mapel->hari }} - {{ timeFormat($mapel->schedule_start_at) }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('mapel_id')" />
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
