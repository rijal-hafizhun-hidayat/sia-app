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
use Illuminate\Http\Request;
use PDF;

class NilaiController extends Controller
{
    protected $nilaiService;
    protected $userService;
    protected $mapelService;
    protected $kelasService;
    protected $tahunAjaranService;

    public function __construct(NilaiServiceController $nilaiService, UsersServiceController $userService, MapelServiceController $mapelService, KelasServiceController $kelasService, TahunAjaranServiceController $tahunAjaranService)
    {
        $this->nilaiService = $nilaiService;
        $this->userService = $userService;
        $this->mapelService = $mapelService;
        $this->kelasService = $kelasService;
        $this->tahunAjaranService = $tahunAjaranService;   
    }
    
    public function index(){
        $student = $this->userService->getSiswa();
        $class = $this->kelasService->getAll();
        $tahun_ajarans = $this->tahunAjaranService->getTahunAjaran();

        return view('nilai/index', [
            'students' => $student,
            'classs' => $class,
            'tahun_ajarans' => $tahun_ajarans
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

        return redirect()->route('nilai.score', ['id' => $payload['user_id']])->withSuccess('Data berhasil disimpan');
    }

    public function destroy($id){
        $this->nilaiService->deleteById($id);

        return redirect()->back()->withSuccess('Data berhasil dihapus');
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

        return redirect()->route('nilai.score', ['id' => $payload['user_id']])->withSuccess('Data berhasil diubah');
    }

    public function score($id){
        $scores = $this->nilaiService->getNilaiById($id);
        $user = $this->userService->getUsersById($id);
        return view('nilai/score', [
            'scores' => $scores,
            'user' => $user,
        ]);
    }

    public function reportNilai(){
        return view('nilai/report-nilai', [
            'classs' => $this->kelasService->getAll(),
            'tahun_ajarans' => $this->tahunAjaranService->getTahunAjaran()
        ]);
    }

    public function printReportNilai(Request $request){
        $payload = $request->validate([
            'search_class' => 'nullable|numeric',
            'tahun_ajaran' => 'nullable|numeric'
        ]);

        $mapel = $this->mapelService->printNilaiMapel($payload);

        $pdf = PDF::loadview('nilai/report-nilai-pdf',['mapels' => $mapel]);
    	return $pdf->stream('laporan-nilai-pdf', array("Attachment" => false));
    }
}
