<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tahun Ajaran</h2>
            </div>
            @if (Auth::user()->role == 1)
            <div>
                {{-- <x-create-button :href="{{ route('mapel.create') }}">Tambah Mata Pelajaran</x-create-button> --}}
                <x-create-button :href="route('tahun_ajaran.add')">Tambah Tahun Ajaran</x-create-button>
            </div>
            @endif
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Tahun Ajaran</th>
                                <th class="pb-4 pt-6 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tahun_ajarans as $tahun_ajaran)
                            <tr class="hover:bg-gray-100">
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ $tahun_ajaran->nama }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <div class="flex flex-row space-x-4">
                                        <form action="{{ route('tahun_ajaran.destroy', ['id' => $tahun_ajaran->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Hapus</x-danger-button>
                                        </form>
                                        <x-show-button :href="route('tahun_ajaran.edit', ['id' => $tahun_ajaran->id])">Ubah</x-show-button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
