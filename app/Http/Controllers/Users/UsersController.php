<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;
use App\Http\Requests\Users\UpdatePasswordUserRequest;

class UsersController extends Controller
{
    protected $kelas;
    protected $users;
    protected $role;
    public function __construct()
    {
        $this->kelas = new KelasServiceController;
        $this->users = new UsersServiceController;
        $this->role = ['Admin', 'Guru', 'Siswa'];
    }

    public function index(){
        return view('users/index', [
            'users' => $this->users->getUsers(),
            'kelass' => $this->kelas->getAll()
        ]);
    }

    public function add(){
        return view('users/create', [
            'kelas' => $this->kelas->getKelas(),
            'role' => $this->role
        ]);
    }

    public function edit($id){
        return view('users/edit', [
            'user' => $this->users->getUsersById($id),
            'kelas' => $this->kelas->getKelas(),
            'role' => $this->role
        ]);
    }

    public function detail($id){
        return view('users/detail', [
            'user' => $this->users->getUsersById($id)
        ]);
    }

    public function editPass($id){
        return view('users/edit-password', [
            'id' => $id
        ]);
    }

    public function updatePass(UpdatePasswordUserRequest $request, $id){
        $payload = $request->validated();
        $this->users->changePasswordUser($payload, $id);

        return redirect()->route('users.index')->withSuccess('Password berhasil dihapus');
    }
}
