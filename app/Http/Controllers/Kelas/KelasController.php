<?php

namespace App\Http\Controllers\Kelas;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(KelasServiceController $kelas){
        return view('kelas/index', [
            'kelass' => $kelas->getKelas()
        ]);
    }

    public function create(){
        return view('kelas/create');
    }

    public function show(KelasServiceController $kelas, $id){
        return view('kelas/show', [
            'kelas' => $kelas->getKelasById($id)
        ]);
    }
}
