<?php

namespace App\Http\Controllers\Nilai;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Http\Controllers\Nilai\Service\NilaiServiceController;
use App\Http\Controllers\TahunAjaran\Services\TahunAjaranServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;
use App\Http\Requests\Nilai\StoreNilaiRequest;
use App\Http\Requests\Nilai\UpdateNilaiRequest;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    protected $nilaiService;
    protected $userService;
    protected $mapelService;
    protected $kelasService;
    protected $tahunAjaranService;
    public function __construct()
    {
        $this->nilaiService = new NilaiServiceController();
        $this->userService = new UsersServiceController();
        $this->mapelService = new MapelServiceController();
        $this->kelasService = new KelasServiceController();
        $this->tahunAjaranService = new TahunAjaranServiceController();   
    }
    
    public function index(){
        $student = $this->userService->getSiswa();
        return view('nilai/index', [
            'students' => $student
        ]);
    }

    public function add($user_id){
        $user = $this->userService->getUsersById($user_id);
        $mapels = $this->mapelService->getMapelByKelasId($user->kelas_id);
        $schoolYears = $this->tahunAjaranService->getTahunAjaran();
        
        return view('nilai/add', [
            'user' => $user,
            'mapels' => $mapels,
            'school_years' => $schoolYears,
        ]);
    }

    public function store(StoreNilaiRequest $request){
        $payload =  $request->validated();
        $this->nilaiService->storeData($payload);

        return redirect()->route('nilai.score', ['id' => $payload['user_id']]);
    }

    public function destroy($id){
        $this->nilaiService->deleteById($id);

        return redirect()->back();
    }

    public function edit($user_id, $id){
        $nilai = $this->nilaiService->findById($id);
        $user = $this->userService->getUsersById($user_id);
        $mapels = $this->mapelService->getMapelByKelasId($user->kelas_id);
        $schoolYears = $this->tahunAjaranService->getTahunAjaran();
        return view('nilai/edit', [
            'user' => $user,
            'mapels' => $mapels,
            'school_years' => $schoolYears,
            'nilai' => $nilai
        ]);
    }

    public function update(UpdateNilaiRequest $request, $id){
        $payload = $request->validated();
        $this->nilaiService->updateData($payload, $id);

        return redirect()->route('nilai.score', ['id' => $payload['user_id']]);
    }

    public function score($id){
        $scores = $this->nilaiService->getNilaiById($id);
        $user = $this->userService->getUsersById($id);
        return view('nilai/score', [
            'scores' => $scores,
            'user' => $user,
        ]);
    }
}
