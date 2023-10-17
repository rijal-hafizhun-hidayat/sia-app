<?php

namespace App\Http\Controllers\Kelas;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;

class KelasController extends Controller
{
    protected $kelasService;
    protected $userService;
    public function __construct()
    {
        $this->kelasService = new KelasServiceController;
        $this->userService = new UsersServiceController;        
    }
    public function index(){
        return view('kelas/index', [
            'kelass' => $this->kelasService->getKelas()
        ]);
    }

    public function add(){
        return view('kelas/create');
    }

    public function edit($id){
        return view('kelas/edit', [
            'kelas' => $this->kelasService->getKelasById($id)
        ]);
    }

    public function delete($id){
        $isMapel = $this->kelasService->getKelasById($id);
        return view('kelas/delete', [
            'kelas' => $this->kelasService->getKelasById($id),
            'is_mapel' => $isMapel->mapel()->first()
        ]);
    }

    public function detail($id){
        $kelas = $this->kelasService->getKelasById($id);
        return view('kelas/detail', [
            'kelas' => $kelas,
            'mapels' => $kelas->mapel,
            'students' => $kelas->user
        ]);
    }
}
