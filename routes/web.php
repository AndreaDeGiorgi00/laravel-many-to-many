<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProjectController;

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

Route::get('/', [GuestHomeController::class,'index']);


//rotte per il back-office

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function(){
    //rotta utente loggato
    Route::get('/', [AdminHomeController::class,'index'])->name('home');
    //rotta per la index
    Route::get('/Project', [ProjectController::class, 'index'])->name('projects.index');
    //rotta per lo show
    Route::get('/Project{id}', [ProjectController::class, 'show'])->name('projects.show');
    //rotta per il destroy
    Route::delete('/Project{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    //rotta per il create
    Route::get('/Project/Create', [ProjectController::class, 'create'])->name('projects.create');
    //rotta per lo store
    Route::post('/Project', [ProjectController::class, 'store'])->name('projects.store');
    //rottaper update
    Route::get('/Project{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    //rotta per l'edit
    Route::put('/Project/{id}', [ProjectController::class, 'update'])->name('projects.update');
    

    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
