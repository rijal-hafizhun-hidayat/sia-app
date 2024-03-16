<?php

namespace App\Http\Controllers\Kelas;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\TahunAjaran\Services\TahunAjaranServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    protected $kelasService;
    protected $userService;
    protected $tahunAjaranService;
    public function __construct()
    {
        $this->kelasService = new KelasServiceController;
        $this->userService = new UsersServiceController;     
        $this->tahunAjaranService =  new TahunAjaranServiceController;   
    }
    public function index(){
        return view('kelas/index', [
            'kelass' => $this->kelasService->getKelas(),
            'tahun_ajarans' => $this->tahunAjaranService->getTahunAjaran()
        ]);
    }

    public function add(){
        return view('kelas/create', [
            'tahun_ajarans' => $this->tahunAjaranService->getTahunAjaran()
        ]);
    }

    public function edit($id){
        return view('kelas/edit', [
            'kelas' => $this->kelasService->getKelasById($id),
            'tahun_ajarans' => $this->tahunAjaranService->getTahunAjaran()
        ]);
    }

    public function delete($id){
        $isMapel = $this->kelasService->getKelasById($id);
        return view('kelas/delete', [
            'kelas' => $this->kelasService->getKelasById($id),
            'is_mapel' => $isMapel->mapel()->first()
        ]);
    }

    public function detail($id){
        $kelas = $this->kelasService->getKelasById($id);
        return view('kelas/detail', [
            'kelas' => $kelas,
            'mapels' => $kelas->mapel,
            'students' => $kelas->user
        ]);
    }

    public function createWali($kelasId){
        return view('kelas/create-wali', [
            'gurus' => $this->userService->getUsersByRole(2),
            'kelas_id' => $kelasId
        ]);
    }

    public function showWali($id){
        return view('kelas/update-wali', [
            'kelas' => $this->kelasService->getKelasById($id),
            'gurus' => $this->userService->getUsersByRole(2),
            'kelas_id' => $id
        ]);
    }

    public function updateWali(Request $request, $id){
        $payload = $request->validate([
            'wali' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();
            $kelas = $this->kelasService->getKelasById($id);
            $this->kelasService->updateWaliKelas($kelas, $payload);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route('kelas.detail', ['id' => $id])->withSuccess('ubah data berhasil');
    }

    public function storeWali(Request $request, $id){
        $payload = $request->validate([
            'wali' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();
            $kelas = $this->kelasService->getKelasById($id);
            $this->kelasService->updateWaliKelas($kelas, $payload);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route('kelas.detail', ['id' => $id])->withSuccess('simpan data berhasil');
    }
}
