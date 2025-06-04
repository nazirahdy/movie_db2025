<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [MovieController::class, 'index']);

Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
Route::Post('/movie',[MovieController::class,'store'])->name('movie.store');
Route::Post('/',[MovieController::class,'index'])->name('homepage');

Route::get('/login', [AuthController::class,'formLogin'])->name('login');

Route::post('/login', [AuthController::class,'login']);
Route::post('/logout',[AuthController::class, 'destroy'])->name('logout');

Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');


Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');