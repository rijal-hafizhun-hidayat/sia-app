<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Guru</h2>
            </div>
            <div>
                <x-create-button :href="route('guru.add')">Tambah Guru</x-create-button>
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
                                <th class="pb-4 pt-6 px-6">Nama Guru</th>
                                <th class="pb-4 pt-6 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gurus as $guru)
                            <tr class="hover:bg-gray-100 uppercase">
                                <td class="border-t items-center px-6 py-4">
                                    {{ $guru->nama }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <div class="flex flex-row space-x-4">
                                        <x-delete-button :href="route('guru.delete', ['id' => $guru->id])">Hapus</x-delete-button>
                                        <x-show-button :href="route('guru.edit', ['id' => $guru->id])">Ubah</x-show-button>
                                        <x-detail-button :href="route('guru.mapel.detail', ['id' => $guru->id])">Detail</x-detail-button>
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
