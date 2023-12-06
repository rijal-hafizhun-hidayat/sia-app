<?php

namespace App\Http\Controllers\Users\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersServiceController extends Controller
{
    public function getUsers(){
        return User::latest()->paginate(10);
    }

    public function getUsersById($id){
        return User::find($id);
    }

    public function getUsersByKelasId($id){
        return User::where('kelas_id', $id)->get();
    }

    public function getSiswa(){
        $user = User::where('role', User::ROLE_SISWA);

        if(Auth::user()->role == 3){
            $user->where('nama', Auth::user()->nama);
        }
        else{
            if(request()->filled('search_user')){
                $user->where('nama', 'like', '%'.request()->search_user.'%');
            }
            if(request()->filled('search_class')){
                $user->where('kelas_id', request()->search_class);
            }
        }
        
        return $user->paginate(10);
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
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id,
            'gender' => $request->gender
        ]);

        return redirect()->route('users.index')->withSuccess('Data berhasil disimpan');
    }

    public function update(UpdateUsersRequest $request, $id){
        $user = User::find($id);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->username = $request->username;
        $user->nis = $request->nis ?? null;
        $user->kelas_id = $request->kelas_id;
        $user->gender = $request->gender;

        $user->save();

        return redirect()->route('users.index')->withSuccess('Data berhasil diubah');
    }

    public function destroy($id){
        User::destroy($id);

        return redirect()->route('users.index')->withSuccess('Data berhasil hapus');
    }

    public function changePasswordUser($payload, $id){
        return User::where('id', $id)->update([
            'password' => Hash::make($payload['password'])
        ]);
    }

    public function getCountStudent($gender){
        return User::where('role', 3)->where('gender', $gender)->count();
    }

    public function getCountTeacher(){
        return User::where('role', 2)->count();
    }
}
