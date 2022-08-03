<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('frontend.index');
//     // return view('welcome');
// });
$url = url('/');

Auth::routes(['verify' => true]);

Route::middleware('web')->domain(env('APP_URL'))->group(function(){
    Route::get('/', 'FrontendController@index')->name('frontend');
    Route::get('wisata', 'FrontendController@wisata')->name('struktur');
    // Route::get('struktur-organisasi', 'FrontendController@struktur')->name('struktur');
    Route::get('tentang-kami', 'FrontendController@tentang_kami')->name('tentang_kami');
    Route::get('visi-misi', 'FrontendController@visimisi')->name('visi_misi');
    Route::get('tim-kami', 'FrontendController@tim')->name('tim_kami');
    Route::get('kontak', 'FrontendController@kontak')->name('kontak');
    Route::post('kontak/simpan', 'FrontendController@kontak_simpan')->name('kontak.simpan');
    Route::get('sitemap', 'SitemapController@index')->name('sitemap');
    Route::get('sitemap/create', 'SitemapController@create');
    Route::get('wistlist', 'FrontendController@wistlist')->name('frontend.wistlist');
    Route::post('wistlist/search', 'FrontendController@search_wistlist')->name('frontend.search.wistlist');
    Route::post('event_register', 'FrontendController@eventRegister')->name('frontend.eventRegister');
    Route::get('kebijakan-pemesanan-perjalanan', 'FrontendController@info')->name('frontend.info');

    Route::prefix('hotel')->group(function () {
        Route::get('/', 'FrontendController@hotel')->name('frontend.hotel');
        Route::get('search', 'FrontendController@search_hotel')->name('frontend.hotel_search');
        Route::get('{slug}', 'FrontendController@hotel_detail')->name('frontend.hotelDetail');
        Route::get('{slug}/{slug_kamar}', 'FrontendController@kamar_hotel_detail')->name('frontend.kamarHotelDetail');
    });
    Route::prefix('event')->group(function () {
        Route::get('/', 'FrontendController@event')->name('frontend.event');
        Route::get('{slug}', 'FrontendController@eventDetail')->name('frontend.eventDetail');
    });
});

Route::middleware('web')->domain('partner.'.$url)->group(function(){
    Route::get('/', 'FrontendController@partnership')->name('frontend.partnership');
});
Route::middleware('web')->domain('app.'.$url)->group(function(){
    Route::get('/', 'Apps\HomeController@index');
    Route::get('login', 'Apps\Auth\LoginController@login')->name('apps.login');
    Route::post('login', 'Apps\Auth\LoginController@authenticate')->name('apps.post.login');
    Route::get('logout', 'Apps\Auth\LoginController@logout')->name('apps.logout');
    
    Route::get('home', 'Apps\HomeController@index')->middleware('verified')->name('apps.home');
    Route::get('hotel', 'Apps\HotelController@index')->name('apps.hotel');
    Route::get('hotel/{slug}', 'Apps\HotelController@detail')->name('apps.detail');
});
Route::middleware('web')->domain('hotel.'.env('APP_URL'))->group(function(){
    Route::get('/', 'FrontendPlesiranMalangController@index')->name('plmlg');
    Route::get('hotel', 'FrontendPlesiranMalangController@hotel')->name('plmlg.hotel');
    Route::get('hotel/{slug}', 'FrontendPlesiranMalangController@hotel_detail')->name('plmlg.hotelDetail');
});

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login_google');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');

// Route::any('/{page?}',function(){
//     return View::make('layouts.status.404');
//     // return View::make('pages.error.404');
// })->where('page','.*');