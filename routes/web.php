<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index'])->name('homepage');

Route::get('/movie/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movie', [MovieController::class, 'store'])->name('movies.store');

Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movies.show');
