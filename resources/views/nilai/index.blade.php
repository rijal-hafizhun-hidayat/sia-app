<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nilai</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Auth::user()->role != 3)
            <form action="{{ route('nilai.index') }}" method="get">
                @csrf
                <div class="flex flex-row space-x-4 mb-4">
                    <div>
                        <x-text-input id="search_user" name="search_user" class="w-full" :placeholder="'Cari Siswa'"/>
                    </div>
                    <div>
                        <x-select-input class="w-full" name="search_class" id="search_class">
                            <option disabled selected>-- Pilih Kelas --</option>
                            @foreach ($classs as $class)
                            <option value="{{ $class->id }}">{{ $class->nama }}</option>
                            @endforeach
                        </x-select-input>
                    </div>
                    <div class="w-full">
                        <x-primary-button>Submit</x-primary-button>
                    </div>
                </div>  
            @endif
            </form>
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Nama Siswa</th>
                                <th class="pb-4 pt-6 px-6">Kelas</th>
                                <th class="pb-4 pt-6 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr class="hover:bg-gray-100">
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ $student->nama }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4 uppercase">
                                    <p>{{ $student->kelas->nama ?? '' }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4 uppercase">
                                    <div class="flex justify-start space-x-4">
                                        <x-nilai-button :href="route('nilai.score', ['id' => $student->id])">Nilai</x-nilai-button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">{{ $students->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
