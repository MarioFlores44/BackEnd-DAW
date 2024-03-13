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

Route::get('/', [ArticlesController::class, 'show'])->name('index');

Route::get('/dashboard',  [ArticlesController::class, 'show2'])->middleware(['auth'])->name('modificar');

Route::get('/crear', function(){
    return view('nou');
})->name('crear');

Route::get('nouArticle', [ArticlesController::class, 'create'])->name('nouArticle');

Route::post('nouArticle', [ArticlesController::class, 'store']);

Route::get('editar')->name('editar');

Route::get('delete/{id}', [ArticlesController::class, 'delete'])->name('delete');

require __DIR__.'/auth.php';
