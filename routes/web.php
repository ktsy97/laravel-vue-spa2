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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/{any}', function () {
        return view('app');
    })->where('any', '.*');

    route::post('/store', [App\Http\Controllers\LikeController::class, 'store']);
    route::post('/check', [App\Http\Controllers\LikeController::class, 'check']);

    Route::get('/api/cities', [App\Http\Controllers\WeatherController::class, 'index']);
    Route::get('/api/hours', [App\Http\Controllers\WeatherController::class, 'show']);
});
