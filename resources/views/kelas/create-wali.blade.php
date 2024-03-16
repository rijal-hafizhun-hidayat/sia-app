<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Wali Guru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('kelas.detail.wali.store', ['id' => $kelas_id]) }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="wali" :value="'Wali Guru'" />
                            <x-select-input class="w-full" name="wali" id="wali">
                                <option disabled selected>-- Pilih --</option>
                                @foreach ($gurus as $guru)
                                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('wali')" />
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
