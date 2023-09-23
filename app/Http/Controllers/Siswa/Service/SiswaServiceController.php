<?php

namespace App\Http\Controllers\Siswa\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Siswa\StoreSiswaRequest;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaServiceController extends Controller
{
    public function getSiswa(){
        return Siswa::all();
    }

    public function store(StoreSiswaRequest $request){
        Siswa::create([
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->route('siswa.index');
    }
}
