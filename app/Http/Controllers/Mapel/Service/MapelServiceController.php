<?php

namespace App\Http\Controllers\Mapel\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mapel\StoreMapelRequest;
use App\Models\Mapel;

class MapelServiceController extends Controller
{
    public function getMapel(){
        return Mapel::latest()->paginate(10);
    }

    public function getMapelByUserId($id){
        return Mapel::where('user_id', $id)->latest()->paginate(10);
    }

    public function getMapelByKelasId($id){
        return Mapel::where('kelas_id', $id)->get();
    }

    public function getMapelByGuruId($id){
        return Mapel::where('guru_id', $id)->get();
    }

    public function getMapelById($id){
        return Mapel::find($id);
    }

    public function store(StoreMapelRequest $request){
        Mapel::create([
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id,
            'user_id' => $request->user_id,
            'hari' => $request->hari,
            'schedule_start_at' => $request->waktu_mulai,
            'schedule_end_at' => $request->waktu_selesai,
        ]);

        return redirect()->route('mapel.index');
    }

    public function update(StoreMapelRequest $request, $id){
        $mapel = Mapel::find($id);

        $mapel->nama = $request->nama;
        $mapel->kelas_id = $request->kelas_id;
        $mapel->user_id = $request->user_id;
        $mapel->hari = $request->hari;
        $mapel->schedule_start_at = $request->waktu_mulai;
        $mapel->schedule_end_at = $request->waktu_selesai;

        $mapel->save();

        return redirect()->route('mapel.index');
    }

    public function destroy($id){
        Mapel::destroy($id);

        return redirect()->back();
    }
}
