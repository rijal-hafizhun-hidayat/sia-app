<?php

use App\Http\Controllers\Kelas\KelasController;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\MapelController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Http\Controllers\Nilai\NilaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TahunAjaran\Services\TahunAjaranServiceController;
use App\Http\Controllers\TahunAjaran\TahunAjaranController;
use App\Http\Controllers\Users\Service\UsersServiceController;
use App\Http\Controllers\Users\UsersController;
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
    Route::prefix('kelas')->group(function(){

        //view kelas
        Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('/add', [KelasController::class, 'add'])->name('kelas.add');
        Route::get('/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::get('/delete/{id}', [KelasController::class, 'delete'])->name('kelas.delete');

        //service kelas
        Route::post('/', [KelasServiceController::class, 'store'])->name('kelas.store');
        Route::put('/{id}', [KelasServiceController::class, 'update'])->name('kelas.update');
        Route::delete('/{id}', [KelasServiceController::class, 'destroy'])->name('kelas.destroy');
    });
    
    //route mapel
    Route::prefix('mapel')->group(function(){
        
        //view mapel
        Route::get('/', [MapelController::class, 'index'])->name('mapel.index');
        Route::get('/add', [MapelController::class, 'add'])->name('mapel.add');
        Route::get('/{id}', [MapelController::class, 'edit'])->name('mapel.edit');

        //service
        Route::post('/', [MapelServiceController::class, 'store'])->name('mapel.store');
        Route::put('/{id}', [MapelServiceController::class, 'update'])->name('mapel.update');
        Route::delete('/{id}', [MapelServiceController::class, 'destroy'])->name('mapel.destroy');
    });

    //route users
    Route::prefix('users')->group(function(){

        //view users
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/add', [UsersController::class, 'add'])->name('users.add');
        Route::get('/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::get('/detail/{id}', [UsersController::class, 'detail'])->name('users.detail');
        Route::get('/password/{id}', [UsersController::class, 'editPass'])->name('users.change-password');

        //service users
        Route::post('/', [UsersServiceController::class, 'store'])->name('users.store');
        Route::put('/{id}', [UsersServiceController::class, 'update'])->name('users.update');
        Route::put('/password/{id}', [UsersController::class, 'updatePass'])->name('users.update-pass');
        Route::delete('/{id}', [UsersServiceController::class, 'destroy'])->name('users.destroy');
    });

    //route tahun ajaran
    Route::prefix('tahun_ajaran')->group(function(){

        //view tahun ajaran
        Route::get('/', [TahunAjaranController::class, 'index'])->name('tahun_ajaran.index');
        Route::get('/add', [TahunAjaranController::class, 'add'])->name('tahun_ajaran.add');
        Route::get('/{id}', [TahunAjaranController::class, 'edit'])->name('tahun_ajaran.edit');

        //service tahun ajaran
        Route::post('/', [TahunAjaranServiceController::class, 'store'])->name('tahun_ajaran.store');
        Route::put('/{id}', [TahunAjaranServiceController::class, 'update'])->name('tahun_ajaran.update');
        Route::delete('/{id}', [TahunAjaranServiceController::class, 'destroy'])->name('tahun_ajaran.destroy');
    });
    
    //route nilai
    Route::prefix('nilai')->group(function(){

        //view nilai
        Route::get('/', [NilaiController::class, 'index'])->name('nilai.index');
        Route::get('/{user_id}/add', [NilaiController::class, 'add'])->name('nilai.add');
        Route::get('/{id}', [NilaiController::class, 'score'])->name('nilai.score');
        Route::get('/{user_id}/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');

        //service nilai
        Route::put('/{id}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::post('/', [NilaiController::class, 'store'])->name('nilai.store');
        Route::delete('/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
    });
});

require __DIR__.'/auth.php';
