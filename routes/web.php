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
Auth::routes(['verify' => true]);

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

Route::get('paket', 'FrontendController@paket')->name('frontend.paket');

Route::get('instagram', 'InstagramController@index');

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

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('b')->group(function () {
        Route::get('home', 'HomeController@index')->name('home')->middleware('verified');
        Route::get('home/balance', 'HomeController@balance')->name('home.balance')->middleware('verified');
        
        Route::get('wisatas', 'WisataController@index')->name('wisata')->middleware('verified');
        Route::post('wisata/simpan', 'WisataController@simpan')->name('wisata.simpan')->middleware('verified');
        
        Route::get('kategori_kota', 'KategoriKotaController@index')->name('ktkota')->middleware('verified');
        Route::post('kategori_kota/simpan', 'KategoriKotaController@simpan')->name('ktkota.simpan')->middleware('verified');
        
        Route::prefix('cooperation')->group(function() {
            Route::get('/', 'CooperationController@index')->name('cooperation')->middleware('verified');
            Route::get('notif', 'CooperationController@notif')->middleware('verified');
            Route::get('{id}/download', 'CooperationController@download')->name('cooperation.download')->middleware('verified');
            Route::get('{id}', 'CooperationController@detail')->middleware('verified');
            Route::post('upload', 'CooperationController@upload_berkas')->name('cooperation.upload_berkas')->middleware('verified');
            Route::post('data/upload', 'CooperationController@berkas')->name('cooperation.berkas')->middleware('verified');
            Route::post('status', 'CooperationController@status')->name('cooperation.status')->middleware('verified');
        });

        Route::prefix('paket')->group(function(){
            Route::get('/', 'PaketController@index')->name('paket')->middleware('verified');
            Route::post('simpan', 'PaketController@simpan')->name('paket.simpan')->middleware('verified');
            Route::get('{id}/paket_images', 'PaketController@detail_upload')->name('paket.imageUpload')->middleware('verified');
            Route::post('upload/paket_images', 'PaketController@simpan_image')->name('paket.simpan_imageUpload')->middleware('verified');
        });

        Route::get('pengguna', 'UsersController@index')->name('pengguna')->middleware('verified');
        
        Route::prefix('roles')->group(function(){
            Route::get('/', 'RolesController@index')->name('roles')->middleware('verified');
            Route::post('simpan', 'RolesController@simpan')->name('roles.simpan')->middleware('verified');
            Route::get('{id}/edit', 'RolesController@edit')->name('roles.edit')->middleware('verified');
            Route::get('{slug}', 'RolesController@detail')->name('roles.detail')->middleware('verified');
            Route::post('update', 'RolesController@update')->name('roles.update')->middleware('verified');
        });
        
        Route::get('status', 'StatusController@index')->name('status')->middleware('verified');
        
        Route::prefix('slider')->group(function(){
            Route::get('/', 'SliderController@index')->name('slider')->middleware('verified');
            Route::get('{id}/edit', 'SliderController@edit')->name('slider.edit')->middleware('verified');
            Route::post('simpan', 'SliderController@simpan')->name('slider.simpan')->middleware('verified');
            Route::post('update', 'SliderController@update')->name('slider.update')->middleware('verified');
            Route::get('{id}/hapus', 'SliderController@delete')->name('slider.hapus')->middleware('verified');
        });

        // Route::prefix('paket')->group(function(){

        // });

        Route::get('tiket_wisata', 'TiketWisataController@index_tiket_wisata')->name('tiket_wisata')->middleware('verified');
        
        Route::get('hotel', 'HotelController@index')->name('hotel')->middleware('verified');
        Route::post('hotel/simpan', 'HotelController@simpan')->name('hotel.simpan')->middleware('verified');
        Route::post('hotel/upload_image', 'HotelController@upload_image')->name('hotel.upload_image')->middleware('verified');
        Route::post('hotel/update', 'HotelController@update')->name('hotel.update')->middleware('verified');
        Route::get('hotel/{id}/image', 'HotelController@detail_image')->middleware('verified');
        Route::get('hotel/{id}', 'HotelController@detail')->name('hotel.detail')->middleware('verified');
        Route::get('hotel/{id}/edit', 'HotelController@edit')->name('hotel.edit')->middleware('verified');
        Route::get('hotel/{id}/kamar', 'KamarHotelController@index')->name('kamar')->middleware('verified');
        Route::post('hotel/kamar/simpan', 'KamarHotelController@simpan')->name('kamar.simpan')->middleware('verified');
        Route::get('hotel/delete/{id}', 'HotelController@destroy')->name('hotel.hapus')->middleware('verified');
        Route::post('hotel/export', 'HotelController@export')->name('hotel.export')->middleware('verified');
        Route::post('hotel/import', 'HotelController@import')->name('hotel.import')->middleware('verified');
        Route::get('hotel/checkroom/{id}', 'HotelController@checkRoom')->name('hotel.checkroom')->middleware('verified');
        // Route::get('hotel/importExportView', 'DemoController@importExportView');
        
        Route::get('perusahaan', 'PerusahaanController@index')->name('perusahaan')->middleware('verified');
        Route::post('perusahaan/simpan', 'PerusahaanController@simpan')->name('perusahaan.simpan')->middleware('verified');
        Route::get('perusahaan/{id}/edit', 'PerusahaanController@edit')->name('perusahaan.edit')->middleware('verified');
        Route::post('perusahaan/update', 'PerusahaanController@update')->name('perusahaan.update')->middleware('verified');
        Route::get('perusahaan/delete/{id}', 'PerusahaanController@destroy')->name('perusahaan.hapus')->middleware('verified');

        Route::get('log', 'LogController@index')->name('log')->middleware('verified');
        
        Route::get('events', 'EventsController@index')->name('events')->middleware('verified');
        Route::post('events/simpan', 'EventsController@simpan')->name('events.simpan')->middleware('verified');
        Route::get('events/{id}', 'EventsController@detail')->name('events.detail')->middleware('verified');
        Route::get('events/{id}/register', 'EventsController@detailEventRegister')->name('events.detailRegister')->middleware('verified');
        Route::get('events/delete/{id}', 'EventsController@destroy')->name('events.delete')->middleware('verified');

        Route::get('post', 'PostController@index')->name('post')->middleware('verified');
        Route::post('post/simpan', 'PostController@simpan')->name('post.simpan')->middleware('verified');

        Route::get('pengguna/{id}', 'UsersController@detail')->middleware('verified');
        Route::get('pengguna/delete/{id}', 'UsersController@delete')->middleware('verified');
        Route::post('pengguna/simpan', 'UsersController@simpan')->name('pengguna.simpan')->middleware('verified');
        Route::post('pengguna/update', 'UsersController@update')->name('pengguna.update')->middleware('verified');
    });
});

Route::middleware('web')->domain('partner.'.env('APP_URL'))->group(function(){
    Route::get('/', 'FrontendController@partnership')->name('frontend.partnership');
});
Route::middleware('web')->domain('app.'.env('APP_URL'))->group(function(){
    Route::get('/', 'Apps\HomeController@index');
    Route::get('login', 'Apps\Auth\LoginController@login')->name('apps.login');
    Route::post('login', 'Apps\Auth\LoginController@authenticate')->name('apps.post.login');
    Route::get('logout', 'Apps\Auth\LoginController@logout')->name('apps.logout');
    
    Route::get('home', 'Apps\HomeController@index')->middleware('verified')->name('apps.home');
    Route::get('hotel', 'Apps\HotelController@index')->name('apps.hotel');
    Route::get('hotel/{slug}', 'Apps\HotelController@detail')->name('apps.detail');
});
Route::middleware('web')->domain('plesiranmalang.'.env('APP_URL'))->group(function(){
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