<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hapus Kelas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-red-500 dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-white dark:text-gray-100">
                    Data Kelas <span class="uppercase font-bold">{{ $kelas->nama }}</span> Tidak Aman Di Hapus. Silahkan hapus data mata pelajaran yang terkait dengan kelas <span class="uppercase font-bold">{{ $kelas->nama }}</span>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-row">
                        <div class="p-2"><p>Nama Kelas:</p></div>
                        <div class="rounded bg-slate-300 ml-2 basis-1/3 p-2"><p class="uppercase">{{ $kelas->nama }}</p></div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Nama Mata Pelajaran</th>
                                <th class="pb-4 pt-6 px-6">Hari</th>
                                <th class="pb-4 pt-6 px-6">Waktu Mulai</th>
                                <th class="pb-4 pt-6 px-6">Waktu Selesai</th>
                                <th class="pb-4 pt-6 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas->mapel as $val)
                            <tr class="hover:bg-gray-100">
                                <td class="border-t items-center px-6 py-4">
                                    {{ $val->nama }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    {{ $val->hari }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    {{ $val->schedule_start_at }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    {{ $val->schedule_end_at }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <form action="#" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button>Hapus</x-danger-button>
                                    </form>
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
