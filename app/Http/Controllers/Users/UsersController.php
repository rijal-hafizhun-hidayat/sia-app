<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $kelas;
    public function __construct()
    {
        $this->kelas = new KelasServiceController;
    }
    public function index(){
        return view('users/index');
    }

    public function add(){
        return view('users/create', [
            'kelas' => $this->kelas->getKelas()
        ]);
    }
}
