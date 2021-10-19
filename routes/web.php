<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::get('/posts', [PostController::class, 'list'])->name('posts.list');
Route::get('/posts/create-form', [PostController::class, 'createForm'])->name('posts.create-form');
Route::post('/posts/create-save', [PostController::class, 'create'])->name('posts.create-save');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
