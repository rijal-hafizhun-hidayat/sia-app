<?php

namespace App\Http\Controllers\Kelas;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;

class KelasController extends Controller
{
    public function index(KelasServiceController $kelas){
        return view('kelas/index', [
            'kelass' => $kelas->getKelas()
        ]);
    }

    public function add(){
        return view('kelas/create');
    }

    public function edit(KelasServiceController $kelas, $id){
        return view('kelas/edit', [
            'kelas' => $kelas->getKelasById($id)
        ]);
    }

    public function delete(KelasServiceController $kelas, $id){
        $isMapel = $kelas->getKelasById($id);
        return view('kelas/delete', [
            'kelas' => $kelas->getKelasById($id),
            'is_mapel' => $isMapel->mapel()->first()
        ]);
    }
}
