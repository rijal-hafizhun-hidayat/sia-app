<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kelas</h2>
            </div>
            @if (Auth::user()->role == 1)
            <div>
                <x-create-button :href="route('kelas.add')">Tambah Kelas</x-create-button>
            </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12 space-y-4">
        @if (session('message'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red-500 overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-white">
                    {{ session('message') }}
                </div>
            </div>
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="#" method="get">
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
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="text-gray-900">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Nama Kelas</th>
                                <th class="pb-4 pt-6 px-6">Tahun Ajaran</th>
                                <th class="pb-4 pt-6 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelass as $kelas)
                            <tr class="hover:bg-gray-100 uppercase">
                                <td class="border-t items-center px-6 py-4">
                                    {{ $kelas->nama }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    {{ $kelas->tahun_ajaran }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <div class="flex flex-row space-x-4">
                                        @if (Auth::user()->role == 1)
                                        <x-delete-button :href="route('kelas.delete', ['id' => $kelas->id])">Hapus</x-delete-button>
                                        <x-show-button :href="route('kelas.edit', ['id' => $kelas->id])">Ubah</x-show-button>
                                        @endif
                                        <x-create-button :href="route('kelas.detail', ['id' => $kelas->id])">Detail</x-create-button>
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
    <script>
        function destroy(){
            console.log(true)
            //document.getElementById('delete-kelas').submit()
        }
    </script>
</x-app-layout>
