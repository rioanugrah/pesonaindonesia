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

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::prefix('payment')->group(function(){
        Route::post('callback', 'Payment\PaymentMidtransController@payment_callback');
    });
    
    Route::prefix('v1')->group(function(){
        Route::post('login', 'API\UserController@login');
        Route::post('logout', 'API\UserController@logout');
        Route::post('register', 'API\UserController@register');
        Route::prefix('paket')->group(function () {
            Route::get('/', 'API\PaketController@paket');
        });
        Route::prefix('event')->group(function () {
            Route::get('/', 'API\EventController@index');
        });
    });
    Route::group(['middleware' => 'auth:api'], function(){
        Route::prefix('v1')->group(function(){
            Route::get('home', 'API\HomeController@index');
            Route::prefix('hotel')->group(function () {
                Route::get('/', 'API\HotelController@index')->name('api.hotel');
            });
            Route::prefix('paket_order')->group(function () {
                Route::get('/', 'API\PaketController@paket_order');
            });
            Route::post('me', 'API\UserController@details');
            Route::prefix('travelling')->group(function () {
                Route::get('/', 'API\TravellingController@index_v1');
                Route::get('{id}', 'API\TravellingController@detail');
                Route::post('{id}/checkout', 'API\TravellingController@travel_order');
                Route::get('{id}/check', 'API\TravellingController@cek_pembayaran');
            });
            Route::post('logout', 'API\UserController@logout');
        });
    });
});

Route::domain('camping.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('testing', 'Camping\TestingController@index');
});