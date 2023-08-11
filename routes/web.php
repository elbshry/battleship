<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::any('/play', '\App\Http\Controllers\GameController@play');

Route::post('/check_hit', '\App\Http\Controllers\GameController@checkHit')->name('game.check_hit');

Route::any('/reset', '\App\Http\Controllers\GameController@resetGame');
