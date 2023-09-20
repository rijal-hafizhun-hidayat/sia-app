<?php

use App\Http\Controllers\Guru\GuruController;
use App\Http\Controllers\Guru\Service\GuruServiceController;
use App\Http\Controllers\Kelas\KelasController;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\MapelController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //route kelas
    //view kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/add', [KelasController::class, 'add'])->name('kelas.add');
    Route::get('/kelas/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::get('/kelas/delete/{id}', [KelasController::class, 'delete'])->name('kelas.delete');

    //service kelas
    Route::post('/kelas', [KelasServiceController::class, 'store'])->name('kelas.store');
    Route::put('/kelas/{id}', [KelasServiceController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}', [KelasServiceController::class, 'destroy'])->name('kelas.destroy');

    //route mapel
    //view mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
    Route::get('/mapel/add', [MapelController::class, 'create'])->name('mapel.add');
    Route::get('/mapel/{id}', [MapelController::class, 'edit'])->name('mapel.edit');

    //service
    Route::post('/mapel', [MapelServiceController::class, 'store'])->name('mapel.store');
    Route::put('/mapel/{id}', [MapelServiceController::class, 'update'])->name('mapel.update');
    Route::delete('/mapel/{id}', [MapelServiceController::class, 'destroy'])->name('mapel.destroy');

    //route guru
    //view guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/add', [GuruController::class, 'create'])->name('guru.add');
    Route::get('/guru/{id}', [GuruController::class, 'edit'])->name('guru.edit');
    Route::get('/guru/detail/{id}', [GuruController::class, 'detail'])->name('guru.detail');

    //service guru
    Route::post('/guru', [GuruServiceController::class, 'store'])->name('guru.store');
    Route::put('/guru/{id}', [GuruServiceController::class, 'update'])->name('guru.update');
});

require __DIR__.'/auth.php';
