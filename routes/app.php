<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return 'Second subdomain landing page';
// });
Route::get('/', 'FrontendController@blog');