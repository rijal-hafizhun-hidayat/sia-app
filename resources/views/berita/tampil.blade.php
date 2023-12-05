<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Berita
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('berita.update', ['id' => $news->id]) }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="judul" :value="'Judul Berita'" />
                            <x-text-input id="judul" name="judul" type="text" class="w-full" :value="old('judul') ?? $news->judul"/>
                            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="isi_berita" :value="'Isi Berita'" />
                            <x-textarea-input id="isi_berita" name="isi_berita" type="text" class="w-full" :value="old('isi_berita')">{{ old('isi_berita') ?? $news->isi_berita }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('isi_berita')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="cover" :value="'Cover Berita'" />
                            <input type="file" name="cover" id="cover">
                            <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                        </div>
                        <div class="max-w-xl">
                            <x-primary-button>Submit</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
