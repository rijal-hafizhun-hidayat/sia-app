<?php

namespace App\Http\Controllers\Guru\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guru\StoreGuruController;
use App\Http\Requests\Guru\StoreGuruRequest;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruServiceController extends Controller
{
    public function getGuru(){
        return Guru::all();
    }

    public function store(StoreGuruRequest $request){
        Guru::create([
            'nama' => $request->nama,
            'mapel_id' => $request->mapel_id
        ]);

        return redirect()->route('guru.index');
    }
}
