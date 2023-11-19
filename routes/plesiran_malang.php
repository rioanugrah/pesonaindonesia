<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::domain('plesiranmalang.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('/', function(){
        return view('layouts.f_plesiranmalang.app');
    })->name('plesiranmalang.home');
});