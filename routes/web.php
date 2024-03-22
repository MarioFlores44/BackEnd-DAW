<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use Laravel\Socialite\Facades\Socialite;

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
// Ruta al index
Route::get('/', [ArticlesController::class, 'show'])->name('index');

// Ruta al index con permisos de modificación
Route::get('/dashboard',  [ArticlesController::class, 'show2'])->middleware(['auth'])->name('modificar');

// Ruta a la página para crear un nuevo artículo
Route::get('/crear', function(){
    return view('nou');
})->name('crear');

// Ruta para crear un nuevo artículo
Route::get('nouArticle', [ArticlesController::class, 'create'])->name('nouArticle');

// Ruta para guardar un nuevo artículo
Route::post('nouArticle', [ArticlesController::class, 'store']);

// Ruta para modificar un artículo
Route::post('update', [ArticlesController::class, 'update'])->name('update');

// Ruta para borrar un artículo
Route::get('delete/{id}', [ArticlesController::class, 'delete'])->name('delete');

// Rutas para modificar y gestionar el perfil de usuario
Route::get('profile', [ProfileController::class, 'edit'])->name('profile');

Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

// Rutas para la autenticación con Google
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
 
    // $user->token
});


require __DIR__.'/auth.php';
