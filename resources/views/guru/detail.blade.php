<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Guru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white dark:bg-gray-800 overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('guru.partials.detail-guru')
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-row-reverse">
                        <div>
                            <x-primary-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'add-mapel-guru')">Tambah Mata Pelajaran</x-primary-button>
                        </div>
                    </div>
                    <x-modal name="add-mapel-guru" focusable>
                        <form method="post" action="{{ route('guru.mapel.update', ['id' => $guru->id]) }}" class="p-6">
                            @csrf
                            @method('PUT')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Tambah Mata Pelajaran Guru
                            </h2>
                
                            <div class="mt-6">
                                <x-select-input class="w-full" id="mapel_id" name="mapel_id">
                                    <option selected disabled>-- Pilih --</option>
                                    @foreach ($mapels as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama }} - {{ $mapel->kelas->nama }} - {{ timeFormat($mapel->schedule_start_at) }}</option>
                                    @endforeach
                                </x-select-input>
                
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>
                
                            <div class="mt-6 flex justify-end">
                                <x-primary-button>Submit</x-primary-button>
                            </div>
                        </form>
                    </x-modal>
                    @include('guru.partials.detail-kelas-guru')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
