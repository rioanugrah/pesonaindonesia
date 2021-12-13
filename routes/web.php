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
Route::get('/', 'FrontendController@index')->name('frontend');
Route::get('struktur-organisasi', 'FrontendController@struktur')->name('struktur');
Route::get('tentang-kami', 'FrontendController@tentang_kami')->name('tentang_kami');
Route::get('visi-misi', 'FrontendController@visimisi')->name('visi_misi');
Route::get('tim-kami', 'FrontendController@tim')->name('tim_kami');
Route::get('kontak', 'FrontendController@kontak')->name('kontak');
// Route::get('#/wisata', 'FrontendController@index');
Route::get('ticket', function(){
    return view('backend.ticket.tiket_wisata');
});


Auth::routes(['verify' => true]);

Route::domain('{account}.localhost.com')->group(function () {
    // Route::get('user/{id}', function ($account, $id) {
    //     //
    // });
    Route::get('/', function($account){
        return response()->json([
            'status' => true
        ]);
    });
});

Route::get('send-notif/{name}', function ($name) {
    event(new \App\Events\WisataEvent($name));
    return "Event has been sent!";
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home')->middleware('verified');
    Route::get('wisatas', 'WisataController@index')->name('wisata')->middleware('verified');
    Route::post('wisata/simpan', 'WisataController@simpan')->name('wisata.simpan')->middleware('verified');
    
    Route::get('cooperation', 'CooperationController@index')->name('cooperation')->middleware('verified');
    Route::post('cooperation/simpan', 'CooperationController@simpan')->name('cooperation.simpan')->middleware('verified');
    Route::post('cooperation/kab_kota', 'CooperationController@select_kab_kota')->middleware('verified');
    
    Route::get('pengguna', 'UsersController@index')->name('pengguna')->middleware('verified');
    Route::get('pengguna/{id}', 'UsersController@detail')->middleware('verified');
    Route::get('pengguna/delete/{id}', 'UsersController@delete')->middleware('verified');
    Route::post('pengguna/simpan', 'UsersController@simpan')->name('pengguna.simpan')->middleware('verified');
    Route::post('pengguna/update', 'UsersController@update')->name('pengguna.update')->middleware('verified');
    
    Route::get('roles', 'RolesController@index')->name('roles')->middleware('verified');

    Route::get('status', 'StatusController@index')->name('status')->middleware('verified');
    Route::post('status/simpan', 'StatusController@simpan')->name('status.simpan')->middleware('verified');
    
    Route::get('slider', 'SliderController@index')->name('slider')->middleware('verified');
    Route::post('slider/simpan', 'SliderController@simpan')->name('slider.simpan')->middleware('verified');
    
    Route::get('b/tiket_wisata', 'TiketWisataController@index_tiket_wisata')->name('tiket_wisata')->middleware('verified');
    Route::get('tiket_wisata/{id}/{created_at}', 'TiketWisataController@cekTiket')->name('detail_tiket_wisata')->middleware('verified');
    
    Route::get('b/hotel', 'HotelController@index')->name('hotel')->middleware('verified');
    Route::post('b/hotel/simpan', 'HotelController@simpan')->name('hotel.simpan')->middleware('verified');
    Route::get('b/hotel/{id}', 'HotelController@detail')->name('hotel.detail')->middleware('verified');
    Route::get('b/hotel/{id}/kamar', 'KamarHotelController@index')->name('kamar')->middleware('verified');
    Route::post('b/hotel/kamar/simpan', 'KamarHotelController@simpan')->name('kamar.simpan')->middleware('verified');
    Route::get('b/hotel/delete/{id}', 'HotelController@destroy')->name('hotel.hapus')->middleware('verified');
    
    Route::get('testing', 'ChatController@chat')->name('chat')->middleware('verified');
    
});

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('home', 'HomeController@index')->name('home')->middleware('verified');
//     Route::get('wisatas', 'WisataController@index')->name('wisata')->middleware('verified');
//     Route::post('wisata/simpan', 'WisataController@simpan')->name('wisata.simpan')->middleware('verified');
    
//     Route::get('cooperation', 'CooperationController@index')->name('cooperation')->middleware('verified');
//     Route::post('cooperation/simpan', 'CooperationController@simpan')->name('cooperation.simpan')->middleware('verified');
//     Route::post('cooperation/kab_kota', 'CooperationController@select_kab_kota')->middleware('verified');
    
//     Route::get('pengguna', 'UsersController@index')->name('pengguna')->middleware('verified');
//     Route::get('pengguna/{id}', 'UsersController@detail')->middleware('verified');
//     Route::get('pengguna/delete/{id}', 'UsersController@delete')->middleware('verified');
//     Route::post('pengguna/simpan', 'UsersController@simpan')->name('pengguna.simpan')->middleware('verified');
//     Route::post('pengguna/update', 'UsersController@update')->name('pengguna.update')->middleware('verified');
    
//     Route::get('roles', 'RolesController@index')->name('roles')->middleware('verified');

//     Route::get('status', 'StatusController@index')->name('status')->middleware('verified');
//     Route::post('status/simpan', 'StatusController@simpan')->name('status.simpan')->middleware('verified');
    
//     Route::get('slider', 'SliderController@index')->name('slider')->middleware('verified');
//     Route::post('slider/simpan', 'SliderController@simpan')->name('slider.simpan')->middleware('verified');
    
//     Route::get('tiket_wisata', 'TiketWisataController@index_tiket_wisata')->name('tiket_wisata')->middleware('verified');
//     Route::get('tiket_wisata/{id}/{created_at}', 'TiketWisataController@cekTiket')->name('detail_tiket_wisata')->middleware('verified');
    
//     // Route::get('chat', 'ChatController@chat')->name('chat')->middleware('verified');
    
// });

Route::any('/{page?}',function(){
    return View::make('layouts.status.404');
    // return View::make('pages.error.404');
})->where('page','.*');