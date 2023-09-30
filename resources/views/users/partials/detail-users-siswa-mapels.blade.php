<table class="w-full whitespace-nowrap">
    <thead>
        <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Nama Mata Pelajaran</th>
            <th class="pb-4 pt-6 px-6">Kelas</th>
            <th class="pb-4 pt-6 px-6">Hari</th>
            <th class="pb-4 pt-6 px-6">Guru</th>
            <th class="pb-4 pt-6 px-6">Waktu Mulai</th>
            <th class="pb-4 pt-6 px-6">Waktu Selesai</th>
            <th class="pb-4 pt-6 px-6">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->kelas->mapel as $mapel)
        <tr class="hover:bg-gray-100 uppercase">
            <td class="border-t items-center px-6 py-4">
                {{ $mapel->nama }}
            </td>
            <td class="border-t items-center px-6 py-4">
                {{ $mapel->kelas->nama }}
            </td>
            <td class="border-t items-center px-6 py-4">
                {{ $mapel->hari }}
            </td>
            <td class="border-t items-center px-6 py-4">
                {{ $mapel->user->nama }}
            </td>
            <td class="border-t items-center px-6 py-4">
                {{ timeFormat($mapel->schedule_start_at) }}
            </td>
            <td class="border-t items-center px-6 py-4">
                {{ timeFormat($mapel->schedule_end_at) }}
            </td>
            <td class="border-t items-center px-6 py-4">
                <div class="flex flex-row space-x-4">
                    <form action="{{ route('mapel.destroy', ['id' => $mapel->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>Hapus</x-danger-button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>