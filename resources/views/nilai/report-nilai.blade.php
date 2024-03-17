<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Laporan Nilai</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('report-nilai.print') }}" method="post" target="_blank">
                        @csrf
                        <div class="flex flex-row space-x-4 mb-4">
                            <div>
                                <x-select-input class="w-full" name="search_class" id="search_class">
                                    <option disabled selected>-- Pilih Kelas --</option>
                                    <option value="">semua</option>
                                    @foreach ($classs as $class)
                                    <option @selected(request()->search_class == $class->id) value="{{ $class->id }}">{{ $class->nama }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                            <div>
                                <x-select-input class="w-full" name="tahun_ajaran" id="tahun_ajaran">
                                    <option disabled selected>-- Pilih Tahun Ajaran --</option>
                                    <option value="">semua</option>
                                    @foreach ($tahun_ajarans as $tahun_ajaran)
                                    <option @selected(request()->tahun_ajaran == $tahun_ajaran->id) value="{{ $tahun_ajaran->id }}">{{ $tahun_ajaran->nama }}</option>
                                    @endforeach
                                </x-select-input>
                            </div>
                            <div class="w-full">
                                <x-primary-button>Print PDF</x-primary-button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
