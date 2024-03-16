<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ubah Wali Guru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('kelas.detail.wali.update', ['id' => $kelas->id]) }}" method="POST" class="space-y-4">
                        @method('PUT')
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="wali" :value="'Wali Guru'" />
                            <x-select-input class="w-full" name="wali" id="wali">
                                <option disabled selected>-- Pilih --</option>
                                @foreach ($gurus as $guru)
                                <option @selected($kelas->wali->id == $guru->id) value="{{ $guru->id }}">{{ $guru->nama }}</option>
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
