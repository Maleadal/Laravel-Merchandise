<?php

use Illuminate\Support\Facades\Route;

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

Route::get('college/{id}', function ($id) {
    return view('shop', ['id' => $id]);
});

Route::get('college/{id}/{itemId}', function ($id, $itemId) {
    return view('item', ['id' => $id, 'itemId' => $itemId]);
});

Route::get('receipt', function () {
    return view('receipt');
});
