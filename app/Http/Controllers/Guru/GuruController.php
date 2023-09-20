<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Guru\Service\GuruServiceController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;

class GuruController extends Controller
{
    private $guru;
    private $mapel;
    
    public function __construct(){
        $this->guru = new GuruServiceController;
        $this->mapel = new MapelServiceController;
    }

    public function index(){
        return view('guru/index', [
            'gurus' => $this->guru->getGuru()
        ]);
    }

    public function create(){
        return view('guru/create', [
            'mapels' => $this->mapel->getMapel()
        ]);
    }

    public function edit($id){
        return view('guru/edit', [
            'guru' => $this->guru->getGuruById($id),
            'mapels' => $this->mapel->getMapel()
        ]);
    }

    public function detail($id){
        return view('guru/detail', [
            'guru' => $this->guru->getGuruById($id),
            'mapels' => $this->mapel->getMapel()
        ]);
    }
}
