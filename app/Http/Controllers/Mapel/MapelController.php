<?php

namespace App\Http\Controllers\Mapel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(MapelServiceController $mapel){
        return view('mapel/index', [
            'mapels' => $mapel->getMapel()
        ]);
    }

    public function create(KelasServiceController $kelas){
        return view('mapel/create', [
            'kelass' => $kelas->getKelas(),
        ]);
    }
}
