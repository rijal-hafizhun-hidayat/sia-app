<?php

use App\Http\Controllers\Kelas\KelasController;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\MapelController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Http\Controllers\ProfileController;
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

        //service users
        Route::post('/', [UsersServiceController::class, 'store'])->name('users.store');
        Route::put('/{id}', [UsersServiceController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UsersServiceController::class, 'destroy'])->name('users.destroy');
    });
    
    
});

require __DIR__.'/auth.php';
