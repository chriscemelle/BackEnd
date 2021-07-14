<?php

use  App\Http\Controllers\AuthController;
use  App\Http\Controllers\GamesController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware'=>'auth:api'],function(){
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/games/search', [GamesController::class, 'search']);
    Route::post('/games', [GamesController::class, 'store']);
    Route::get('/games', [GamesController::class, 'index']);
    Route::get('/games/{game}', [GamesController::class, 'show']);
    Route::put('/games/{game}', [GamesController::class, 'update']);
    Route::delete('/games/{game}', [GamesController::class, 'destroy']);
});