<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    // Route::get('/', function(){
    //     return view('frontend_2023.home');
    // })->name('frontend');
    Route::get('/','v2\FrontendController@home')->name('frontend');
});