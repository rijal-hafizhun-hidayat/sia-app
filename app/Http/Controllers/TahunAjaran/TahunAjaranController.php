<?php

namespace App\Http\Controllers\TahunAjaran;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TahunAjaran\Services\TahunAjaranServiceController;

class TahunAjaranController extends Controller
{
    public function index(TahunAjaranServiceController $tahunAjaranServices){
        $tahunAjarans = $tahunAjaranServices->getTahunAjaran();
        return view('tahun_ajaran/index', [
            'tahun_ajarans' => $tahunAjarans
        ]);
    }

    public function add(){
        return view('tahun_ajaran/create');
    }

    public function edit(TahunAjaranServiceController $tahunAjaranServices, $id){
        $tahunAjaran = $tahunAjaranServices->getTahunAjaranById($id);
        return view('tahun_ajaran/edit', [
            'tahun_ajaran' => $tahunAjaran
        ]);
    }
}
