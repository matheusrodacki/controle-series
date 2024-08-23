<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
})->middleware(Authenticator::class);

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('signin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Register
Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');

//Series
Route::resource('series', SeriesController::class)->except(['show']);

//Seasons
Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

//Episodes
Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index'); // Add this line for episodes route
Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update'); // Add this line for storing episodes
