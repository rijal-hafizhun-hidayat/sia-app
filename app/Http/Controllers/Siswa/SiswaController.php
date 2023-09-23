<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Siswa\Service\SiswaServiceController;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    private $kelas;
    private $siswa;
    public function __construct()
    {
        $this->kelas = new KelasServiceController;
        $this->siswa = new SiswaServiceController;
    }

    public function index(){
        return view('siswa/index', [
            'siswas' => $this->siswa->getSiswa()
        ]);
    }

    public function add(){
        return view('siswa/create', [
            'kelas' => $this->kelas->getKelas()
        ]);
    }
}
