<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::domain('plesiranmalang.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('/', function(){
        return view('frontend.plesiran_malang_new.home');
    })->name('plesiranmalang.home');
    Route::get('contact', function(){
        return view('frontend.plesiran_malang_new.contact');
    })->name('plesiranmalang.contact');

    
});