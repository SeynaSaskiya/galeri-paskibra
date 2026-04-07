<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'beranda'])->name('home');
Route::get('/post/{post}', [HomeController::class, 'show'])->name('post.show');
