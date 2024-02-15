<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('crypto')->group(function () {
    Route::get('/', [\App\Http\Controllers\CryptoController::class, 'index']);
    Route::post('store', [\App\Http\Controllers\CryptoController::class, 'store']);
    Route::post('show/{id}', [\App\Http\Controllers\CryptoController::class, 'show']);
    Route::put('update/{id}', [\App\Http\Controllers\CryptoController::class, 'update']);
    Route::delete('delete/{id}', [\App\Http\Controllers\CryptoController::class, 'delete']);
});
