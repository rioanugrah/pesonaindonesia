<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('payment/test', 'Payment\PaymentMidtransController@test_payment')->name('payment.test');
    // Route::post('simpan',function(){
    //     return 'test';
    // })->name('payment.test.simpan');
    Route::post('payment/checkout', 'Payment\PaymentMidtransController@payment_checkout')->name('payment.checkout');
});