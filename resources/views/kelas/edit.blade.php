<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ubah Kelas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('kelas.update', ['id' => $kelas->id]) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="max-w-xl">
                            <x-input-label for="nama" :value="'Nama Kelas'" />
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 w-full" :value="$kelas->nama"/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
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
