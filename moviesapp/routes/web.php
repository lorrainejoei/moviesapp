<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

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

Route::get('/movies', [MoviesController::class, 'index'])->name('movies');
Route::get('/all-movies', [MoviesController::class, 'allMovies'])->name('all_movies');
Route::get('/single-movie/{id}', [MoviesController::class, 'singleMovie'])->name('single_movie');
