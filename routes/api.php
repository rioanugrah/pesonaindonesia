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
// Route::prefix('packet_bromo')->group(function () {
//     Route::get('/', 'API\BromoController@index');
// });
Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::prefix('payment')->group(function(){
        Route::post('callback', 'Payment\PaymentMidtransController@payment_callback');
    });
    
    Route::prefix('v1')->group(function(){
        Route::post('login', 'API\UserController@login');
        Route::post('logout', 'API\UserController@logout');
        Route::post('register', 'API\UserController@register');
        // Route::prefix('packet_bromo')->group(function () {
        //     Route::get('/', 'API\BromoController@index');
        // });
        Route::group(['middleware' => 'auth:api'], function () {
            Route::prefix('packet_bromo')->group(function () {
                Route::get('/', 'API\BromoController@index');
                Route::get('{id}', 'API\BromoController@detail');
                Route::post('{id}/booking', 'API\BromoController@booking');
            });
            Route::prefix('paket')->group(function () {
                Route::get('/', 'API\PaketController@paket');
            });
            Route::prefix('event')->group(function () {
                Route::get('/', 'API\EventController@index');
            });
            Route::get('list_hotel', 'API\HotelController@list_hotel')->name('api.list_hotel');
            Route::prefix('tour')->group(function () {
                Route::get('/', 'API\TourController@list_tour');
                Route::get('{id}', 'API\TourController@tour_detail');
            });
            Route::prefix('booking')->group(function () {
                Route::get('/', 'API\BookingController@booking');
                Route::get('{id}/payment', 'API\BookingController@booking_detail_payment');
                Route::get('process', 'API\BookingController@booking_process');
                Route::get('complete', 'API\BookingController@booking_complete');
            });
        });
    });
});

Route::domain('camping.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('testing', 'Camping\TestingController@index');
});