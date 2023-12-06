<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Berita\BeritaController;
use App\Http\Controllers\Berita\Service\BeritaServiceController;
use App\Http\Controllers\Users\Service\UsersServiceController;

class HomeController extends Controller
{
    protected $userService;
    protected $newsService;

    public function __construct(UsersServiceController $userService, BeritaServiceController $newsService)
    {
        $this->userService = $userService;
        $this->newsService = $newsService;
    }

    public function index(){
        return view('home', [
            'he_student' => $this->userService->getCountStudent('Laki-laki'),
            'she_student' => $this->userService->getCountStudent('Perempuan'),
            'teacher' => $this->userService->getCountTeacher(),
            'newses' => $this->newsService->getThreeLatest()
        ]);
    }
}
