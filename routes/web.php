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
Route::get('tracking_order', 'FrontendController@tracking_order')->name('frontend.tracking');
Route::post('tracking_order/cari', 'FrontendController@tracking_order_search')->name('frontend.tracking.cari');

Route::get('invoice/{id}/tiket_wisata', 'InvoiceController@tiket_wisata')->name('invoice.tiket_wisata');
// Route::get('testingemail', function(){
//     return view('email.testingOrder');
// });
// Route::get('testingNew', function(){
//     $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
//     echo json_encode($age['Peter']);
//     // return view('email.testingOrder');
// });

Route::get('cart', 'CartController@index')->name('cart')->middleware('verified');

Route::get('instagram', 'InstagramController@instagram');

Route::prefix('wisata')->group(function () {
    Route::get('/', 'FrontendController@wisata')->name('frontend.wisata');
    Route::get('{slug}', 'FrontendController@wisata_detail')->name('frontend.wisataDetail');
});

Route::prefix('paket')->group(function () {
    Route::get('/', 'FrontendController@paket')->name('frontend.paket');
    Route::get('{slug}', 'FrontendController@paket_detail')->name('frontend.paket.detail');
    // Route::get('{slug}/{id}', 'FrontendController@paket_detail_list')->name('frontend.paket.detail.list');
    Route::get('{slug}/order/{id}', 'FrontendController@paket_cart')->name('frontend.paket.cart');
    Route::post('{slug}/{id}/checkout', 'PaketController@paket_list_order')->name('frontend.paket.checkout');
    Route::get('payment/{id}', 'FrontendController@paket_list_order_payment')->name('frontend.paket.payment');
    Route::post('{id}/upload', 'PaketController@paket_bukti_pembayaran')->name('frontend.paket.transfer');
    Route::get('{slug}/pages/{id}', 'PagesFrontendController@detail')->name('frontend.pagesDetail');
});

Route::prefix('tour')->group(function () {
    Route::get('/', 'FrontendNewController@tour')->name('frontend_new.tour');
    Route::get('{id}/{paket_id}', 'FrontendNewController@tour_detail')->name('frontend_new.tour_detail');
    Route::post('{slug}/{id}/checkout', 'FrontendNewController@paket_list_order_payment')->name('frontend_new.paket.checkout');

});

// Route::get('testingPayment', function(){
//     return json_encode([
//         'partner_tx_id' => 123,
//         'description' => '',
//         'notes' => '',
//         'sender_name' => 123,
//         'amount' => 123,
//         'email' => 123,
//         'phone_number' => 123,
//         'is_open' => false,
//         "step" => "input-amount",
//         'include_admin_fee' => false,
//         'list_disabled_payment_methods' => '',
//         'list_enabled_banks' => '',
//         // 'expiration' => '2022-09-12 23:00:00',
//         // 'due_date' => '2022-09-12 22:00:00',
//         // 'expiration' => '2022-09-12 21:00:00',
//         'expiration' => ''.\Carbon\Carbon::now()->addDays(1).'',
//         'due_date' => ''.\Carbon\Carbon::now().'',
//         "va_display_name" => "Display Name on VA"
//     ]);
// });

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

Route::prefix('blog')->group(function () {
    Route::get('/', 'FrontendController@blog')->name('frontend.blog');
});

Route::prefix('partner')->group(function(){
    Route::get('/', 'FrontendController@partnership')->name('frontend.partnership');
    Route::post('simpan', 'CooperationController@simpan_frontend')->name('frontend.partnership.simpan');
});

// Route::get('testings', function(){
//     return view('frontend.frontend_2022.index');
// });
Route::get('testings', 'FrontendController@frontend_testing');

// Route::group(['middleware' => ['auth']], function(){
//     Route::get('login', function(){
//         return redirect('login');
//     });
// });

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
            Route::post('simpan', 'CooperationController@simpan')->name('cooperation.simpan')->middleware('verified');
            Route::get('{id}/download', 'CooperationController@download')->name('cooperation.download')->middleware('verified');
            Route::get('{id}', 'CooperationController@detail')->middleware('verified');
            Route::get('{id}/edit', 'CooperationController@edit')->middleware('verified');
            Route::get('{id}/hapus', 'CooperationController@hapus')->middleware('verified');
            Route::post('upload', 'CooperationController@upload_berkas')->name('cooperation.upload_berkas')->middleware('verified');
            Route::post('data/upload', 'CooperationController@berkas')->name('cooperation.berkas')->middleware('verified');
            Route::post('status', 'CooperationController@status')->name('cooperation.status')->middleware('verified');
        });

        Route::prefix('paket')->group(function(){
            Route::get('/', 'PaketController@index')->name('paket')->middleware('verified');
            Route::post('simpan', 'PaketController@simpan')->name('paket.simpan')->middleware('verified');
            Route::get('{id}', 'PaketController@detail')->name('paket.detail')->middleware('verified');
            Route::post('update', 'PaketController@update')->name('paket.update')->middleware('verified');
            Route::get('{id}/paket_images', 'PaketController@detail_upload')->name('paket.imageUpload')->middleware('verified');
            Route::get('{id}/list', 'PaketController@paket_list')->name('paket.list')->middleware('verified');
            Route::get('{id}/list/{detail}', 'PaketController@paket_list_detail')->name('paket.listdetail')->middleware('verified');
            Route::get('{id}/list/{detail}/edit', 'PaketController@paket_list_edit')->name('paket.listedit')->middleware('verified');
            // Route::get('{id}/order', 'PaketController@paket_order')->name('paket.order')->middleware('verified');
            Route::post('{id}/list/simpan', 'PaketController@paket_list_simpan')->name('paket.list.simpan')->middleware('verified');
            Route::post('{detail}/list/{id}/update', 'PaketController@paket_list_update')->name('paket.list.update')->middleware('verified');
            Route::post('upload/paket_images', 'PaketController@simpan_image')->name('paket.simpan_imageUpload')->middleware('verified');
            Route::get('{id}/hapus', 'PaketController@hapus')->name('paket.delete')->middleware('verified');
        });
        Route::prefix('paket_order')->group(function(){
            Route::get('/', 'PaketOrderController@index')->name('paket.order')->middleware('verified');
            Route::get('{id}/bukti_pembayaran', 'PaketOrderController@bukti_pembayaran')->name('paket.order.bukti_pembayaran')->middleware('verified');
            Route::post('bukti_pembayaran/update', 'PaketOrderController@bukti_pembayaran_update')->name('paket.order.bukti_pembayaran.update')->middleware('verified');
        });

        Route::prefix('pengguna')->group(function(){
            Route::get('/', 'UsersController@index')->name('pengguna')->middleware('verified');
            Route::get('{id}', 'UsersController@detail')->name('pengguna.detail')->middleware('verified');
            Route::get('{id}/reset', 'UsersController@reset')->name('pengguna.reset')->middleware('verified');
        });

        
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

Route::post('cooperation/kab_kota', 'CooperationController@select_kab_kota')->name('select.kota');

// Route::middleware('web')->domain('partner.'.env('APP_URL'))->group(function(){
//     Route::get('/', 'FrontendController@partnership')->name('frontend.partnership');
// });
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

Route::get('save-token1', 'TestingController@save')->name('save.token1');
Route::post('save-token', 'TestingController@save')->name('save.token');
Route::post('send-notification', 'TestingController@send_notif')->name('send.notification');

// Route::prefix('app')->group(function () {
//     Route::get('/', 'Apps\HomeController@index')->name('apps');
    
//     Route::get('login', 'Apps\Auth\LoginController@login')->name('apps.login');
//     Route::post('login', 'Apps\Auth\LoginController@authenticate')->name('apps.post.login');
//     Route::get('logout', 'Apps\Auth\LoginController@logout')->name('apps.logout');

//     Route::get('home', 'Apps\HomeController@index')->middleware('verified')->name('apps.home');
//     Route::get('hotel', 'Apps\HotelController@index')->name('apps.hotel');
//     Route::get('hotel/{slug}', 'Apps\HotelController@detail')->name('apps.detail');
// });
// Route::group(['domain' => 'app.localhost'], function () {
//     Route::get('/', 'Apps\HomeController@index');
//     // {
//         // return view('auth.login');
//         // return "This will respond to requests for 'admin.localhost/'";
//     // });
//     Route::get('login', 'Apps\Auth\LoginController@login')->name('apps.login');
//     Route::post('login', 'Apps\Auth\LoginController@authenticate')->name('apps.post.login');
//     Route::get('logout', 'Apps\Auth\LoginController@logout')->name('apps.logout');

//     Route::get('home', 'Apps\HomeController@index')->middleware('verified')->name('apps.home');
//     Route::get('hotel', 'Apps\HotelController@index')->name('apps.hotel');
//     Route::get('hotel/{slug}', 'Apps\HotelController@detail')->name('apps.detail');
// });

// Route::any('{page?}',function(){
//     return View::make('layouts.status.404');
//     // return View::make('pages.error.404');
// })->where('page','.*');