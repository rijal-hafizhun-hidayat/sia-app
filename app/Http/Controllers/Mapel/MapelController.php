<?php

namespace App\Http\Controllers\Mapel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;

class MapelController extends Controller
{
    private $hari;
    public function __construct()
    {
        $this->hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    }

    public function index(MapelServiceController $mapel){
        return view('mapel/index', [
            'mapels' => $mapel->getMapel()
        ]);
    }

    public function add(KelasServiceController $kelas){
        return view('mapel/create', [
            'kelass' => $kelas->getKelas(),
            'hari' => $this->hari
        ]);
    }

    public function edit(KelasServiceController $kelas, MapelServiceController $mapel, $id){
        return view('mapel/edit', [
            'mapel' => $mapel->getMapelById($id),
            'kelas' => $kelas->getKelas(),
            'hari' => $this->hari
        ]);
    }
}
