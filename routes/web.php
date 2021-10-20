<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::get('/posts', [PostController::class, 'list'])->name('posts.list');
Route::get('/posts/create-form', [PostController::class, 'createForm'])->name('posts.create-form');
Route::post('/posts/create-save', [PostController::class, 'create'])->name('posts.create-save');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
