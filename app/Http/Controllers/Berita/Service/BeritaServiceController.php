<?php

namespace App\Http\Controllers\Berita\Service;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaServiceController extends Controller
{
    public function getAll(){
        return Berita::all();
    }

    public function storeData($payload, $filePath){
        return Berita::create([
            'judul' => $payload['judul'],
            'isi_berita' => $payload['isi_berita'],
            'cover' => $filePath
        ]);
    }

    public function findById($id){
        return Berita::find($id);
    }

    public function destroyById(Berita $news){
        return $news->delete();
    }

    public function updateDataById(Berita $news, $payload, $filePath){
        //dd($news, $payload, $filePath);
        return $news->update([
            'judul' => $payload['judul'],
            'isi_berita' => $payload['isi_berita'],
            'cover' => $filePath ?? $news->cover
        ]);
    }
}
