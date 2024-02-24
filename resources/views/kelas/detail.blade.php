<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Kelas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-row mb-5">
                        <div class="py-2"><p>Nama Kelas:</p></div>
                        <div class="rounded bg-slate-300 ml-2 basis-1/3 py-2"><p class="uppercase ml-3">{{ $kelas->nama }}</div>
                    </div>
                    <div class="flex flex-row">
                        <div class="py-2"><p>Tahun Ajaran:</p></div>
                        <div class="rounded bg-slate-300 basis-1/3 py-2"><p class="uppercase ml-3">{{ $kelas->tahun_ajaran }}</div>
                    </div>
                </div>
            </div>

            {{-- tabel jadwal mapel --}}
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Mata Pelajaran</p>
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Nama Mata Pelajaran</th>
                                <th class="pb-4 pt-6 px-6">Jam mulai</th>
                                <th class="pb-4 pt-6 px-6">Jam selesai</th>
                                <th class="pb-4 pt-6 px-6">Guru</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapels as $mapel)
                            <tr class="hover:bg-gray-100">
                                <td class="border-t items-center px-6 py-4">
                                    {{ $mapel->nama }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    {{ timeFormat($mapel->schedule_start_at) }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    {{ timeFormat($mapel->schedule_end_at) }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    {{ $mapel->user->nama }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- table siswa --}}
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Nama Siswa</th>
                                <th class="pb-4 pt-6 px-6">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr class="hover:bg-gray-100">
                                <td class="border-t items-center px-6 py-4">
                                    {{ $student->nama }}
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    {{ $student->email }}
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
