<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::apiResource('commandes',
        \App\Http\Controllers\Api\CommandeController::class);

    Route::post('ligne-commandes/search', [\App\Http\Controllers\Api\LigneCommandeController::class, 'search']);

    Route::apiResource('ligne-commandes',
        \App\Http\Controllers\Api\LigneCommandeController::class);

    Route::post('file/upload', [\App\Http\Controllers\Api\FileHandlerController::class, 'upload']);
    Route::get('file/check/{numpiece}/{numero}', [\App\Http\Controllers\Api\FileHandlerController::class, 'getFilesInFolder']);
});

Route::post('/auth/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::get('/auth/find/{userId}', [\App\Http\Controllers\Api\AuthController::class, 'find']);
Route::post('/auth/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/auth/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
