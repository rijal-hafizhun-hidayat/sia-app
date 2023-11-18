<table class="w-full whitespace-nowrap">
    <thead>
        <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Nama Mata Pelajaran</th>
            <th class="pb-4 pt-6 px-6">Nilai UTS</th>
            <th class="pb-4 pt-6 px-6">Nilai UAS</th>
            @if (Auth::user()->role != 3)
            <th class="pb-4 pt-6 px-6">Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($scores as $score)
        <tr class="hover:bg-gray-100 uppercase">
            <td class="border-t items-center px-6 py-4">
                {{ $score->mapel->nama }}
            </td>
            <td class="border-t items-center px-6 py-4">
                {{ $score->nilai_uts }}
            </td>
            <td class="border-t items-center px-6 py-4">
                {{ $score->nilai_uas }}
            </td>
            <td class="border-t items-center px-6 py-4">
                @if (Auth::user()->role != 3)
                <div class="flex flex-row space-x-4">
                    <form action="{{ route('nilai.destroy', ['id' => $score->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>Hapus</x-danger-button>
                    </form>
                    <x-show-button :href="route('nilai.edit', ['id' => $score->id, 'user_id' => $user->id])">Ubah</x-show-button>
                </div>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>