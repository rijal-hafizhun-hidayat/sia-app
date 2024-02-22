<?php

namespace App\Http\Controllers\Berita;

use App\Http\Controllers\Berita\Service\BeritaServiceController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Berita\StoreBeritaRequest;
use App\Http\Requests\Berita\UpdateBeritaRequest;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    protected $beritaService;

    public function __construct()
    {
        $this->beritaService = new BeritaServiceController;
    }

    public function index(){
        return view('berita.index', [
            'news' => $this->beritaService->getAll()
        ]);
    }

    public function create(){
        return view('berita.create');
    }

    public function store(StoreBeritaRequest $request){
        $payload = $request->validated();
        //$filePath = Storage::putFile('public/berita', $request->file('cover'));
        $this->beritaService->storeData($payload);

        return redirect()->route('berita.index')->withSuccess('Data berhasil disimpan');
    }

    public function destroy($id){
        $news = $this->beritaService->findById($id);
        $this->beritaService->destroyById($news);

        return redirect()->route('berita.index')->withSuccess('Data berhasil dihapus');
    }

    public function tampil($id){
        return view('berita.tampil', [
            'news' => $this->beritaService->findById($id)
        ]);
    }

    public function update(UpdateBeritaRequest $request, $id){
        $payload = $request->validated();

        $news = $this->beritaService->findById($id);

        $this->beritaService->updateDataById($news, $payload);

        return redirect()->route('berita.index')->withSuccess('Data berhasil diubah');
    }

    public function viewNews($id){
        return view('berita.lihat', [
            'news' => $this->beritaService->findById($id)
        ]);
    }
}
