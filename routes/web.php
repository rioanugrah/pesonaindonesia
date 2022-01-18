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
Route::post('kontak/simpan', 'FrontendController@kontak_simpan')->name('kontak.simpan');

Route::get('hotel', 'FrontendController@hotel')->name('frontend.hotel');
Route::get('hotel/{slug}', 'FrontendController@hotel_detail')->name('frontend.hotelDetail');
Route::get('hotel/{slug}/{slug_kamar}', 'FrontendController@kamar_hotel_detail')->name('frontend.kamarHotelDetail');
// Route::get('#/wisata', 'FrontendController@index');
Route::get('ticket', function(){
    return view('backend.ticket.tiket_wisata');
});

Route::get('partnership', 'FrontendController@partnership')->name('frontend.partnership');
Route::get('wistlist', 'FrontendController@wistlist')->name('frontend.wistlist');
Route::post('wistlist/search', 'FrontendController@search_wistlist')->name('frontend.search.wistlist');

Auth::routes(['verify' => true]);

Route::domain('{account}.localhost.com')->group(function () {
    Route::get('/', function($account){
        return response()->json([
            'status' => true
        ]);
    });
});
Route::domain('testing.'.env('APP_URL'))->group(function () {
    Route::get('/', function(){
        echo 'Plesiran Malang';
        // return response()->json([
        //     'status' => true
        // ]);
    });
});

Route::prefix('plesiranmalang')->group(function () {
    Route::get('/', 'FrontendPlesiranMalangController@index')->name('plmlg');
    Route::get('hotel', 'FrontendPlesiranMalangController@hotel')->name('plmlg.hotel');
    Route::get('hotel/{slug}', 'FrontendPlesiranMalangController@hotel_detail')->name('plmlg.hotelDetail');

});

Route::get('send-notif/{name}', function ($name) {
    event(new \App\Events\WisataEvent($name));
    return "Event has been sent!";
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('b')->group(function () {
        Route::get('home', 'HomeController@index')->name('home')->middleware('verified');
        Route::get('wisatas', 'WisataController@index')->name('wisata')->middleware('verified');
        
        Route::get('kategori_kota', 'KategoriKotaController@index')->name('ktkota')->middleware('verified');
        Route::post('kategori_kota/simpan', 'KategoriKotaController@simpan')->name('ktkota.simpan')->middleware('verified');
        
        Route::get('cooperation', 'CooperationController@index')->name('cooperation')->middleware('verified');
        Route::get('cooperation/{id}/download', 'CooperationController@download')->name('cooperation.download')->middleware('verified');
        
        Route::get('pengguna', 'UsersController@index')->name('pengguna')->middleware('verified');
        
        Route::get('roles', 'RolesController@index')->name('roles')->middleware('verified');
        Route::post('roles/simpan', 'RolesController@simpan')->name('roles.simpan')->middleware('verified');
        Route::get('roles/{id}/edit', 'RolesController@edit')->name('roles.edit')->middleware('verified');
        Route::get('roles/{slug}', 'RolesController@detail')->name('roles.detail')->middleware('verified');
        Route::post('roles/update', 'RolesController@update')->name('roles.update')->middleware('verified');
       
        Route::get('status', 'StatusController@index')->name('status')->middleware('verified');
        
        Route::get('slider', 'SliderController@index')->name('slider')->middleware('verified');
        
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
        
        Route::get('perusahaan', 'PerusahaanController@index')->name('perusahaan')->middleware('verified');
        Route::post('perusahaan/simpan', 'PerusahaanController@simpan')->name('perusahaan.simpan')->middleware('verified');
        Route::get('perusahaan/{id}/edit', 'PerusahaanController@edit')->name('perusahaan.edit')->middleware('verified');
        Route::post('perusahaan/update', 'PerusahaanController@update')->name('perusahaan.update')->middleware('verified');
        Route::get('perusahaan/delete/{id}', 'PerusahaanController@destroy')->name('perusahaan.hapus')->middleware('verified');
    });

    Route::get('country/simpan', 'CountryController@simpan');

    Route::post('wisata/simpan', 'WisataController@simpan')->name('wisata.simpan')->middleware('verified');
    
    Route::post('cooperation/simpan', 'CooperationController@simpan')->name('cooperation.simpan')->middleware('verified');
    Route::post('cooperation/kab_kota', 'CooperationController@select_kab_kota')->middleware('verified');
    
    Route::post('hotel/kab_kota', 'HotelController@select_kab_kota')->middleware('verified');
    Route::post('hotel/kecamatan', 'HotelController@select_kecamatan')->middleware('verified');
    
    Route::get('pengguna/{id}', 'UsersController@detail')->middleware('verified');
    Route::get('pengguna/delete/{id}', 'UsersController@delete')->middleware('verified');
    Route::post('pengguna/simpan', 'UsersController@simpan')->name('pengguna.simpan')->middleware('verified');
    Route::post('pengguna/update', 'UsersController@update')->name('pengguna.update')->middleware('verified');
    
    Route::post('status/simpan', 'StatusController@simpan')->name('status.simpan')->middleware('verified');
    
    Route::post('slider/simpan', 'SliderController@simpan')->name('slider.simpan')->middleware('verified');
    
    Route::get('tiket_wisata/{id}/{created_at}', 'TiketWisataController@cekTiket')->name('detail_tiket_wisata')->middleware('verified');
    
    Route::get('testing', 'ChatController@chat')->name('chat')->middleware('verified');
    
    Route::get('payment', 'FrontendController@payment')->middleware('verified');
    Route::post('payment/balance', 'PaymentController@balance')->name('payment.balance')->middleware('verified');
    Route::post('payment/checkout', 'PaymentController@createInvoice')->name('payment')->middleware('verified');
    Route::get('balance', 'PaymentController@getSaldo')->middleware('verified');

    Route::get('cart', 'CartController@index')->name('cart')->middleware('verified');
    Route::post('cart/simpan', 'CartController@simpan')->name('cart.simpan')->middleware('verified');
    Route::get('cart/delete/{id}', 'CartController@delete')->name('cart.delete')->middleware('verified');
    Route::get('cart/status/{kode_booking}', 'CartController@status')->name('cart.status')->middleware('verified');
    Route::post('checkout', 'CartController@checkout')->name('checkout')->middleware('verified');

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