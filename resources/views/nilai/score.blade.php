<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Nilai Siswa
                </h2>
            </div>
            @if (request()->routeIs('nilai.score'))
            @if (Auth::user()->role != 3)
            <div>
                <x-create-button :href="route('nilai.add', ['user_id' => $user->id])">Tambah Nilai</x-create-button>
            </div>
            @endif
            @endif
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-4">
                <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('nilai.partials.score-siswa')
                    </div>
                </div>
                <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('nilai.partials.score-nilai-siswa')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
