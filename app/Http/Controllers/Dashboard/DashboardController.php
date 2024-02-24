<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Http\Controllers\TahunAjaran\Services\TahunAjaranServiceController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $mapelService;
    protected $tahunAjaranService;

    public function __construct()
    {
        $this->mapelService = new MapelServiceController;
        $this->tahunAjaranService = new TahunAjaranServiceController;    
    }
    public function index(){
        $user = Auth::user();
        if($user->role == User::ROLE_SISWA){
            $mapels = $this->mapelService->getMapelByKelasId($user->kelas_id);
        }
        else{
            $mapels = null;
        }

        return view('dashboard', [
            'mapels' => $mapels,
            'tahun_ajarans' => $this->tahunAjaranService->getTahunAjaran()
        ]);
    }
}
