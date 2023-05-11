<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::domain('campingadventure.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    // Route::get('/', function(){
    //     return view('layouts.camping.index');
    // });
    Route::get('/', 'Camping\FrontendController@index');
    // Route::get('testing', 'Camping\TestingController@index');

});