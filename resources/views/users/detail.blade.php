<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-4">
                <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('users.partials.detail-users')
                    </div>
                </div>
                @if ($user->role == 3)
                <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('users.partials.detail-users-siswa-mapels')
                    </div>
                </div>
                @elseif ($user->role == 2)
                <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @include('users.partials.detail-users-guru-mapels')
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
