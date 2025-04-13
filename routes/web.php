<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteProyectoController;
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
    return view('home');
});

Route::view('/contacto', 'contacto');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/administracion', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/administracion/proyectos', [AdminController::class, 'store'])->name('admin.projects.store');
});


Route::middleware(['auth', 'cliente'])->group(function () {
    Route::get('/mis-proyectos', [ClienteProyectoController::class, 'index'])->name('cliente.proyectos');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/proyectos', [ProjectController::class, 'index'])->name('proyectos.index');
});

require __DIR__.'/auth.php';
