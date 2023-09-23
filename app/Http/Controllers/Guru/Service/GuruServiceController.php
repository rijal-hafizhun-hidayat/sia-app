<?php

namespace App\Http\Controllers\Guru\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guru\StoreGuruRequest;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

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

    public function destroy($id){
        Guru::destroy($id);

        return redirect()->route('guru.index');
    }

    public function updateMapelByGuruId(Request $request, $id){
        if(is_null($request->mapel_id)){
            $mapel = Mapel::find($id);
            $mapel->guru_id = null;
        }
        else{
            $mapel = Mapel::find($request->mapel_id);
            $mapel->guru_id = $id;
        }
        
        $mapel->save();

        return redirect()->back();
    }
}
