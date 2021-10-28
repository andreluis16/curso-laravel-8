<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    //Posts Routes
    Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::get('/posts', [PostController::class, 'list'])->name('posts.list');
    Route::get('/posts/create-form', [PostController::class, 'createForm'])->name('posts.create-form');
    Route::post('/posts/create-save', [PostController::class, 'create'])->name('posts.create-save');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

    //Music Routes
    Route::get('/music', [MusicController::class, 'list'])->name('music.list');
    Route::get('/music/create-form', [MusicController::class, 'createForm'])->name('music.create-form');
    Route::post('/music/create-save', [MusicController::class, 'create'])->name('music.create-save');
    Route::any('/music/search', [MusicController::class, 'search'])->name('music.search');
    Route::get('/music/{id}', [MusicController::class, 'show'])->name('music.show');
    Route::delete('music/{id}', [MusicController::class, 'destroy'])->name('music.destroy');
    Route::get('music/edit/{id}', [MusicController::class, 'edit'])->name('music.edit');
    Route::put('music/{id}', [MusicController::class, 'update'])->name('music.update');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
