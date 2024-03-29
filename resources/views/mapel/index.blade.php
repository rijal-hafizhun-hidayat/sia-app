<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mata Pelajaran</h2>
            </div>
            @if (Auth::user()->role == 1)
            <div>
                {{-- <x-create-button :href="{{ route('mapel.create') }}">Tambah Mata Pelajaran</x-create-button> --}}
                <x-create-button :href="route('mapel.add')">Tambah Mata Pelajaran</x-create-button>
            </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
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
                                    <p>{{ $mapel->user ? $mapel->user->nama : '-' }}</p>
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
    </div>
</x-app-layout>
