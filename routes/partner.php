<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::domain('partner.plesiranindonesia.com')->group(function () {
    Route::get('/', 'FrontendController@partnership')->name('frontend.partnership');
});