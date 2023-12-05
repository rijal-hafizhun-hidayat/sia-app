<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Nilai
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('nilai.partials.score-siswa')
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('nilai.update', ['id' => $nilai->id]) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" id="user_id" value="{{ $nilai->user_id }}">
                        <div class="max-w-xl">
                            <x-input-label for="mapel_id" :value="'Mata Pelajaran'" />
                            <x-select-input class="w-full" name="mapel_id" id="mapel_id" required>
                                <option disabled selected>-- Pilih --</option>
                                @foreach ($mapels as $mapel)
                                <option @if ($nilai->mapel_id == $mapel->id) selected @endif value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('mapel_id')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tahun_ajaran_id" :value="'Tahun Ajaran'" />
                            <x-select-input class="w-full" name="tahun_ajaran_id" id="tahun_ajaran_id" required>
                                <option disabled selected>-- Pilih --</option>
                                @foreach ($school_years as $school_year)
                                <option @if ($nilai->tahun_ajaran_id == $school_year->id) selected @endif value="{{ $school_year->id }}">{{ $school_year->nama }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('tahun_ajaran_id')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nilai_uts" :value="'Nilai UTS'" />
                            <x-text-input id="nilai_uts" name="nilai_uts" type="text" class="mt-1 w-full" :value="$nilai->nilai_uts" onkeypress="return onlyNumberKey(event)" required/>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="nilai_uas" :value="'Nilai UAS'" />
                            <x-text-input id="nilai_uas" name="nilai_uas" type="text" class="mt-1 w-full" :value="$nilai->nilai_uas" onkeypress="return onlyNumberKey(event)" required/>
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
<script>
    function onlyNumberKey(evt) {    
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>