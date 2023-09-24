<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;

class UsersController extends Controller
{
    private $kelas;
    private $users;
    private $role;
    public function __construct()
    {
        $this->kelas = new KelasServiceController;
        $this->users = new UsersServiceController;
        $this->role = ['Admin', 'Guru', 'Siswa'];
    }

    public function index(){
        return view('users/index', [
            'users' => $this->users->getUsers()
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
            'user' => $this->users->getUserById($id),
            'kelas' => $this->kelas->getKelas(),
            'role' => $this->role
        ]);
    }
}
