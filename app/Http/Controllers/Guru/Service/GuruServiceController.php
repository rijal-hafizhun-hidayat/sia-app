<?php

namespace App\Http\Controllers\Guru\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guru\StoreGuruRequest;
use App\Models\Guru;

class GuruServiceController extends Controller
{
    public function getGuru(){
        return Guru::all();
    }

    public function getGuruById($id){
        return Guru::find($id);
    }

    public function store(StoreGuruRequest $request){
        Guru::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('guru.index');
    }

    public function update(StoreGuruRequest $request, $id){
        $guru = Guru::find($id);

        $guru->nama = $request->nama;

        $guru->save();

        return redirect()->route('guru.index');
    }
}
