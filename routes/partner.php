<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

// Route::domain('partner.plesiranindonesia.com')->group(function () {
// Route::domain('partner.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
//     Route::get('home', 'FrontendController@partnership')->name('frontend.partnership');
// });