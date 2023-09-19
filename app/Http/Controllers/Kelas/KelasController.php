<?php

namespace App\Http\Controllers\Kelas;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use Illuminate\Http\Request;

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

    public function detail(KelasServiceController $kelas, $id){
        return view('kelas/show', [
            'kelas' => $kelas->getKelasById($id)
        ]);
    }

    public function delete(KelasServiceController $kelas, $id){
        return view('kelas/delete', [
            'kelas' => $kelas->getKelasById($id)
        ]);
    }
}
