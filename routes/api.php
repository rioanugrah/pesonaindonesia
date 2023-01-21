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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::prefix('paket')->group(function () {
    Route::get('/', 'API\PaketController@paket');
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('home', 'API\HomeController@index');
    Route::prefix('hotel')->group(function () {
        Route::get('/', 'API\HotelController@index')->name('api.hotel');
    });
    Route::prefix('paket_order')->group(function () {
        Route::get('/', 'API\PaketController@paket_order');
    });
    Route::post('details', 'API\UserController@details');

    Route::prefix('travelling')->group(function () {
        Route::get('/', 'API\TravellingController@index_v1');
    });
    Route::post('logout', 'API\UserController@logout');
    
});
