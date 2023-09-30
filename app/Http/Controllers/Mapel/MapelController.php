<?php

namespace App\Http\Controllers\Mapel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;

class MapelController extends Controller
{
    private $hari;
    private $users;
    public function __construct()
    {
        $this->hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $this->users = new UsersServiceController;
    }

    public function index(MapelServiceController $mapel){
        return view('mapel/index', [
            'mapels' => $mapel->getMapel()
        ]);
    }

    public function add(KelasServiceController $kelas){
        return view('mapel/create', [
            'kelass' => $kelas->getKelas(),
            'hari' => $this->hari,
            'guru' => $this->users->getUsersByRole(2)
        ]);
    }

    public function edit(KelasServiceController $kelas, MapelServiceController $mapel, $id){
        return view('mapel/edit', [
            'mapel' => $mapel->getMapelById($id),
            'kelas' => $kelas->getKelas(),
            'hari' => $this->hari,
            'guru' => $this->users->getUsersByRole(2)
        ]);
    }
}
