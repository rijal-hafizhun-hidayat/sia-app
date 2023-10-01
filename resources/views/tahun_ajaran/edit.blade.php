<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ubah Tahun Ajaran
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tahun_ajaran.update', ['id' => $tahun_ajaran->id]) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="max-w-xl">
                            <x-input-label for="tahun_ajaran" :value="'Tahun Ajaran'" />
                            <x-text-input id="tahun_ajaran" name="tahun_ajaran" type="text" class="mt-1 w-full" :value="$tahun_ajaran->tahun_ajaran" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('tahun_ajaran')" />
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
