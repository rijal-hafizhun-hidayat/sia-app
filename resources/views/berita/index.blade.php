<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Berita</h2>
            </div>
            <div>
                <x-create-button :href="route('berita.create')">Tambah Berita</x-create-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Judul Berita</th>
                                <th class="pb-4 pt-6 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($news as $berita)
                            <tr>
                                <td>{{ $berita->judul }}</td>
                                <td class="border-t items-center px-6 py-4">
                                    <div class="flex flex-row space-x-4">
                                        <form action="{{ route('berita.destroy', ['id' => $berita->id]) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <x-danger-button>Hapus</x-danger-button>
                                        </form>
                                        <x-show-button :href="route('berita.tampil', ['id' => $berita->id])">Ubah</x-show-button>
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
