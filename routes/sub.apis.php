<?php
use Illuminate\Support\Facades\Route;

// Route::get('/',function(){
//     echo date("d F Y H:i:s", substr("1670161610000", 0, 10));
// });

Route::get('/', 'FrontendController@frontend_testing');
