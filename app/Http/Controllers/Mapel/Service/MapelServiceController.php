<?php

namespace App\Http\Controllers\Mapel\Service;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\TahunAjaran\Services\TahunAjaranServiceController;
use App\Http\Requests\Mapel\StoreMapelRequest;
use App\Models\Mapel;
use Illuminate\Support\Facades\Auth;

class MapelServiceController extends Controller
{
    // protected $tahunAjaranService;
    // public function __construct(TahunAjaranServiceController $tahunAjaranService)
    // {
    //     $this->tahunAjaranService = $tahunAjaranService;
    // }

    public function getMapel(){
        return Mapel::latest()->get();
    }

    public function getMapelByUserId($id){
        return Mapel::with('nilai')->where('user_id', $id)->latest()->get();
    }

    public function getMapelByKelasId($id){
        $mapel = Mapel::where('kelas_id', $id);

        if(request()->filled('tahun_ajaran')){
            $mapel->whereHas('kelas', function($query){
                $query->where('tahun_ajaran', request()->tahun_ajaran);
            });
        }
        
        return $mapel->get();
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

        return redirect()->route('mapel.index')->withSuccess('Data berhasil disimpan');
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

        return redirect()->route('mapel.index')->withSuccess('Data berhasil diubah');
    }

    public function destroy($id){
        Mapel::destroy($id);

        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }

    public function printNilaiMapel($payload){
        $mapel = Mapel::with(['nilai.user', 'kelas'])->where('user_id', Auth::id());

        $mapel->whereHas('nilai', function($query) use ($payload){
            if(isset($payload['tahun_ajaran'])){
                $query->where('tahun_ajaran_id', $payload['tahun_ajaran']);
            }

            if(isset($payload['search_class'])){
                $query->where('kelas_id', $payload['search_class']);
            }
        });

        return $mapel->get();
    }
}
