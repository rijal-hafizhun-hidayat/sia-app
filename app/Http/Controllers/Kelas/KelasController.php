<?php

namespace App\Http\Controllers\Kelas;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\TahunAjaran\Services\TahunAjaranServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;

class KelasController extends Controller
{
    protected $kelasService;
    protected $userService;
    protected $tahunAjaranService;
    public function __construct()
    {
        $this->kelasService = new KelasServiceController;
        $this->userService = new UsersServiceController;     
        $this->tahunAjaranService =  new TahunAjaranServiceController;   
    }
    public function index(){
        return view('kelas/index', [
            'kelass' => $this->kelasService->getKelas(),
            'tahun_ajarans' => $this->tahunAjaranService->getTahunAjaran()
        ]);
    }

    public function add(){
        return view('kelas/create', [
            'tahun_ajarans' => $this->tahunAjaranService->getTahunAjaran()
        ]);
    }

    public function edit($id){
        return view('kelas/edit', [
            'kelas' => $this->kelasService->getKelasById($id),
            'tahun_ajarans' => $this->tahunAjaranService->getTahunAjaran()
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
