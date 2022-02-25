<?php

use App\Http\Controllers\MoviesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// All routes /api must be authenticated on Middleware/CheckPassword
Route::group(['middleware' => ['api', 'checkPassword'], 'namespace' => 'Api'], function() {
    Route::get('movies/getAllItems', [MoviesController::class, 'getAllItems']);
    Route::get('movies/{id}/getItem', [MoviesController::class, 'getItem']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
