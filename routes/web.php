<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

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

// Ruta per a la pàgina principal
Route::get('/', [ArticlesController::class, 'show'])->name('index');

// Ruta per a la pàgina de edició
Route::get('/dashboard',  [ArticlesController::class, 'show2'])->middleware(['auth'])->name('modificar');

// Rutes per a la pàgina de creació
Route::get('/crear', function(){
    return view('nou');
})->name('crear');

Route::get('nouArticle', [ArticlesController::class, 'create'])->name('nouArticle');

Route::post('nouArticle', [ArticlesController::class, 'store']);

// Rutes per a l'edició i eliminació d'articles
Route::post('update', [ArticlesController::class, 'update'])->name('update');

Route::get('delete/{id}', [ArticlesController::class, 'delete'])->name('delete');

// Rutes per a l'administració del perfil
Route::get('profile', [ProfileController::class, 'edit'])->name('profile');

Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');


require __DIR__.'/auth.php';
