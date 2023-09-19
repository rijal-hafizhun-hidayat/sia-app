<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Guru\Service\GuruServiceController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;

class GuruController extends Controller
{
    public function index(GuruServiceController $guru){
        return view('guru/index', [
            'gurus' => $guru->getGuru()
        ]);
    }

    public function create(MapelServiceController $mapel){
        return view('guru/create', [
            'mapels' => $mapel->getMapel()
        ]);
    }
}
