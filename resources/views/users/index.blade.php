<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">User</h2>
            </div>
            <div>
                {{-- <x-create-button :href="{{ route('mapel.create') }}">Tambah Mata Pelajaran</x-create-button> --}}
                <x-create-button :href="route('users.add')">Tambah User</x-create-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    ini halaman user
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
