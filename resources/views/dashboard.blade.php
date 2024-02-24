<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::user()->role == 3)
                {{ __('Jadwal Mata Pelajaran') }}
            @else
                {{ __('Dashboard') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12 space-y-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        @if (Auth::user()->role == 3)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('dashboard') }}" method="get">
                <div class="flex flex-row space-x-4">
                    <div>
                        <x-select-input name="tahun_ajaran">
                            <option value="">Semua</option>
                            @foreach ($tahun_ajarans as $tahun_ajaran)
                                <option @selected(request()->tahun_ajaran == $tahun_ajaran->nama) value="{{ $tahun_ajaran->nama }}">{{ $tahun_ajaran->nama }}</option>
                            @endforeach
                        </x-select-input>
                    </div>
                    <div>
                        <x-primary-button>Cari</x-primary-button>
                    </div>
                </div>
            </form>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Nama Mata Pelajaran</th>
                                <th class="pb-4 pt-6 px-6">Kelas</th>
                                <th class="pb-4 pt-6 px-6">Hari</th>
                                <th class="pb-4 pt-6 px-6">Guru</th>
                                <th class="pb-4 pt-6 px-6">Waktu Mulai</th>
                                <th class="pb-4 pt-6 px-6">Waktu Selesai</th>
                                @if (Auth::user()->role == 1)
                                <th class="pb-4 pt-6 px-6">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapels as $mapel)
                            <tr class="hover:bg-gray-100">
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ $mapel->nama }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4 uppercase">
                                    <p>{{ $mapel->kelas->nama }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ $mapel->hari }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ $mapel->user->nama }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ timeFormat($mapel->schedule_start_at) }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ timeFormat($mapel->schedule_end_at) }}</p>
                                </td>
                                @if (Auth::user()->role == 1)
                                <td class="border-t items-center px-6 py-4">
                                    <div class="flex flex-row space-x-4">
                                        <form action="{{ route('mapel.destroy', ['id' => $mapel->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Hapus</x-danger-button>
                                        </form>
                                        <x-show-button :href="route('mapel.edit', ['id' => $mapel->id])">Ubah</x-show-button>
                                    </div>
                                </td> 
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
