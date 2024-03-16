<?php

namespace App\Http\Controllers\Kelas\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\Kelas\StoreKelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasServiceController extends Controller
{
    public function getKelas(){
        if(request()->filled('tahun_ajaran')){
            $kelas = Kelas::where('tahun_ajaran', request()->tahun_ajaran)->latest()->paginate(10);
        }
        else{
            $kelas = Kelas::latest()->paginate(10);
        }

        return $kelas;
    }

    public function getAll(){
        return Kelas::all();
    }

    public function getKelasById($id){
        return Kelas::with('wali')->find($id);
    }

    public function store(StoreKelasRequest $request){
        Kelas::create([
            'nama' => $request->nama,
            'tahun_ajaran' => $request->tahun_ajaran
        ]);
        return redirect()->route('kelas.index')->withSuccess('Data berhasil disimpan');
    }

    public function update(StoreKelasRequest $request, $id){
        $kelas = Kelas::find($id);
 
        $kelas->nama = $request->nama;
        $kelas->tahun_ajaran = $request->tahun_ajaran;
        
        $kelas->save();

        return redirect()->route('kelas.index')->withSuccess('Data berhasil diubah');
    }

    public function destroy($id){
        Kelas::destroy($id);

        return redirect()->route('kelas.index')->withSuccess('Data berhasil dihapus');
    }

    public function updateWaliKelas(Kelas $kelas, $payload){
        return $kelas->update([
            'wali_kelas' => $payload['wali']
        ]);
    }
}
