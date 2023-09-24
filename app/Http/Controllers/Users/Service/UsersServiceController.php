<?php

namespace App\Http\Controllers\Users\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use App\Models\User;

class UsersServiceController extends Controller
{
    public function getUsers(){
        return User::latest()->paginate(3);
    }

    public function getUserById($id){
        return User::find($id);
    }

    public function store(StoreUsersRequest $request){
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'kelas_id' => $request->kelas_id ?? null,
            'username' => $request->username,
            'password' => $request->password
        ]);

        return redirect()->route('users.index');
    }

    public function update(UpdateUsersRequest $request, $id){
        $user = User::find($id);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->kelas_id = $request->kelas_id;
        $user->username = $request->username;

        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id){
        User::destroy($id);

        return redirect()->route('users.index');
    }
}
