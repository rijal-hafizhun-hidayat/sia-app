<?php

namespace App\Http\Controllers\Nilai\Service;

use App\Http\Controllers\Controller;
use App\Models\Nilai;

class NilaiServiceController extends Controller
{
    public function getNilaiById($id){
        return Nilai::where('user_id', $id)->get();
    }

    public function storeData($payload){
        return Nilai::create([
            'kelas_id' => $payload['kelas_id'],
            'user_id' => $payload['user_id'],
            'mapel_id' => $payload['mapel_id'],
            'tahun_ajaran_id' => $payload['tahun_ajaran_id'],
            'nilai_uts' => $payload['nilai_uts'],
            'nilai_uas' => $payload['nilai_uas']
        ]);
    }

    public function findById($id){
        return Nilai::find($id);
    }

    public function deleteById($id){
        return Nilai::destroy($id);
    }

    public function updateData($payload, $id){
        return Nilai::where('id', $id)->update([
            'user_id' => $payload['user_id'],
            'mapel_id' => $payload['mapel_id'],
            'tahun_ajaran_id' => $payload['tahun_ajaran_id'],
            'nilai_uts' => $payload['nilai_uts'],
            'nilai_uas' => $payload['nilai_uas']
        ]);
    }
}
