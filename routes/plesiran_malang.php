<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::domain('plesiranmalang.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('/', 'PlesiranMalang\FrontendController@index')->name('plesiranmalang.home');
    Route::prefix('destinasi')->group(function() {
        Route::get('{id}/{slug}', 'PlesiranMalang\FrontendController@tour_detail')->name('plesiranmalang.tour_detail');
    });
    Route::get('contact', 'PlesiranMalang\FrontendController@contact')->name('plesiranmalang.contact');
});