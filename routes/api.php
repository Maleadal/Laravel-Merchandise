<?php

use App\Http\Controllers\CollegeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReservationController as Reservation;
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

Route::get('/items', [ItemController::class, 'index']);
Route::prefix('/item')->group(function(){
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});

Route::get('/reservations', [Reservation::class, 'index']);
Route::prefix('/reservation')->group(function(){
    Route::post('/store', [Reservation::class, 'store']);
    Route::put('/{id}', [Reservation::class, 'update']);
    Route::delete('/{id}', [Reservation::class, 'destroy']);
});

Route::get('/colleges', [CollegeController::class, 'index']);