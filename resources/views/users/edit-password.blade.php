<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ubah User Password
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update-pass', ['id' => $id]) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')
                        <div class="max-w-xl">
                            <x-input-label for="password" :value="'Password Baru'" />
                            <x-text-input id="password" name="password" type="text" class="w-full"/>
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        <div class="max-w-xl">
                            <x-primary-button>Submit</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const generateRandomPassword = () => {

        }
    </script>
</x-app-layout>
