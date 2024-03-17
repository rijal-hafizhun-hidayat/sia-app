<?php

namespace App\Http\Controllers\TahunAjaran\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\TahunAjaran\StoreTahunAjaranRequest;
use App\Http\Requests\TahunAjaran\UpdateTahunAjaranRequest;
use App\Models\TahunAjaran;

class TahunAjaranServiceController extends Controller
{
    public function getTahunAjaran(){
        return TahunAjaran::latest()->get();
    }

    public function getTahunAjaranById($id){
        return TahunAjaran::find($id);
    }

    public function findTahunAjaranByName($name){
        return TahunAjaran::where('nama', 'like', '%'.$name.'%')->first();
    }

    public function store(StoreTahunAjaranRequest $request){
        TahunAjaran::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('tahun_ajaran.index')->withSuccess('Data berhasil disimpan');
    }

    public function update(UpdateTahunAjaranRequest $request, $id){
        $tahunAjaran = TahunAjaran::find($id);

        $tahunAjaran->nama = $request->nama;

        $tahunAjaran->save();

        return redirect()->route('tahun_ajaran.index')->withSuccess('Data berhasil diubah');
    }

    public function destroy($id){
        TahunAjaran::destroy($id);

        return redirect()->route('tahun_ajaran.index')->withSuccess('Data berhasil dihapus');
    }
}
