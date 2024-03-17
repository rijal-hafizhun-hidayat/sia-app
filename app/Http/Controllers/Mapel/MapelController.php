<?php

namespace App\Http\Controllers\Mapel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    protected $hari;
    protected $users;
    protected $mapelService;
    protected $kelasService;

    public function __construct(UsersServiceController $users, MapelServiceController $mapelService, KelasServiceController $kelasService)
    {
        $this->hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $this->users = $users;
        $this->mapelService = $mapelService;
        $this->kelasService = $kelasService;
    }

    public function index(){
        if(Auth::user()->role == User::ROLE_GURU){
            $mapels = $this->mapelService->getMapelByUserId(Auth::user()->id);
        }
        else{
            $mapels = $this->mapelService->getMapel();
        }

        return view('mapel/index', [
            'mapels' => $mapels
        ]);
    }

    public function add(){
        return view('mapel/create', [
            'kelass' => $this->kelasService->getKelas(),
            'hari' => $this->hari,
            'guru' => $this->users->getUsersByRole(2)
        ]);
    }

    public function edit($id){
        return view('mapel/edit', [
            'mapel' => $this->mapelService->getMapelById($id),
            'kelas' => $this->kelasService->getKelas(),
            'hari' => $this->hari,
            'guru' => $this->users->getUsersByRole(2)
        ]);
    }
}
