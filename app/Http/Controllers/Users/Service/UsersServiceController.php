<?php

namespace App\Http\Controllers\Users\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use App\Models\User;

class UsersServiceController extends Controller
{
    public function getUsers(){
        return User::latest()->paginate(10);
    }

    public function getUsersById($id){
        return User::find($id);
    }

    public function getSiswa(){
        return User::where('role', User::ROLE_SISWA)->paginate(10);
    }

    public function getUsersByRole($role){
        return User::where('role', $role)->get();
    }

    public function store(StoreUsersRequest $request){
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'username' => $request->username,
            'password' => $request->password,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->route('users.index');
    }

    public function update(UpdateUsersRequest $request, $id){
        $user = User::find($id);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->username = $request->username;
        $user->kelas_id = $request->kelas_id;

        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id){
        User::destroy($id);

        return redirect()->route('users.index');
    }
}
