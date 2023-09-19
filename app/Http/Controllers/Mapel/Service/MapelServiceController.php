<?php

namespace App\Http\Controllers\Mapel\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mapel\StoreMapelRequest;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelServiceController extends Controller
{
    public function getMapel(){
        return Mapel::all();
    }

    public function getMapelByKelasId($id){
        return Mapel::where('kelas_id', $id)->get();
    }

    public function store(StoreMapelRequest $request){
        Mapel::create([
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'hari' => $request->hari,
            'schedule_start_at' => $request->waktu_mulai,
            'schedule_end_at' => $request->waktu_selesai,
        ]);

        return redirect()->route('mapel.index');
    }
}
