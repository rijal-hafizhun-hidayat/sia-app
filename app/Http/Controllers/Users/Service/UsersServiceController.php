<?php

namespace App\Http\Controllers\Users\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersServiceController extends Controller
{
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
}
