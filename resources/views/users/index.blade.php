<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">User</h2>
            </div>
            @if (Auth::user()->role == 1)
            <div>
                <x-create-button :href="route('users.add')">Tambah User</x-create-button>
            </div>
            @endif
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="text-left font-bold">
                                <th class="pb-4 pt-6 px-6">Nama Pengguna</th>
                                <th class="pb-4 pt-6 px-6">Username</th>
                                <th class="pb-4 pt-6 px-6">Role</th>
                                <th class="pb-4 pt-6 px-6">Kelas</th>
                                <th class="pb-4 pt-6 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ $user->nama }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ $user->username }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4">
                                    <p>{{ setValRole($user->role) }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4 uppercase">
                                    <p>{{ $user->kelas->nama ?? '-' }}</p>
                                </td>
                                <td class="border-t items-center px-6 py-4 uppercase">
                                    <div class="flex justify-start space-x-4">
                                        <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>Hapus</x-danger-button>
                                        </form>
                                        <x-show-button :href="route('users.edit', ['id' => $user->id])">Ubah</x-show-button>
                                        <x-detail-button :href="route('users.detail', ['id' => $user->id])">Detail</x-detail-button>
                                        <x-change-password-button :href="route('users.change-password', ['id' => $user->id])">Ubah Password</x-change-password-button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">{{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
