<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
Auth::routes(['verify' => true]);

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    // Route::post('simpan',function(){
    //     return 'test';
    // })->name('payment.test.simpan');

    Route::get('coba','TestingController@coba');
    Route::get('testinfomail','TestingController@testInfoMail');
    Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

    Route::get('/', 'FrontendController@index')->name('frontend');
    // Route::get('struktur-organisasi', 'FrontendController@struktur')->name('struktur');
    Route::get('tentang-kami', 'FrontendController@tentang_kami')->name('tentang_kami');
    Route::get('gallery', 'FrontendController@gallery')->name('frontend.gallery');
    Route::get('visi-misi', 'FrontendController@visimisi')->name('visi_misi');
    Route::get('tim-kami', 'FrontendController@tim')->name('tim_kami');
    Route::get('kontak', 'FrontendController@kontak')->name('kontak');
    Route::post('kontak/simpan', 'FrontendController@kontak_simpan')->name('kontak.simpan');
    Route::get('sitemap', 'SitemapController@index')->name('sitemap');
    Route::get('sitemap/create', 'SitemapController@create');
    Route::get('wistlist', 'FrontendController@wistlist')->name('frontend.wistlist');
    Route::post('wistlist/search', 'FrontendController@search_wistlist')->name('frontend.search.wistlist');
    Route::post('event_register', 'FrontendController@eventRegister')->name('frontend.eventRegister');
    Route::get('promosi/{generate}/{slug}', 'FrontendController@detail_promosi')->name('frontend.detailPromosi');
    Route::get('kebijakan-pemesanan-perjalanan', 'FrontendController@info')->name('frontend.info');

    Route::get('tracking_order', 'FrontendController@tracking_order')->name('frontend.tracking');
    Route::post('tracking_order/cari', 'FrontendController@tracking_order_search')->name('frontend.tracking.cari');

    Route::get('cart', 'CartController@index')->name('cart')->middleware('verified');

    Route::get('instagram', 'InstagramController@instagram');
    Route::get('servers', 'HomeController@servers');

    Route::get('kebijakan-privasi', 'FrontendController@kebijakan_privasi')->name('frontend.kebijakan_privasi');

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

    // Route::prefix('tour')->group(function () {
    //     Route::get('/', 'FrontendNewController@tour')->name('frontend_new.tour');
    //     Route::get('{id}/{paket_id}', 'FrontendNewController@tour_detail')->name('frontend_new.tour_detail');
    //     Route::post('{slug}/{id}/checkout', 'FrontendNewController@paket_list_order_payment')->name('frontend_new.paket.checkout');

    // });

    Route::prefix('hotel')->group(function () {
        Route::get('/', 'FrontendController@hotel')->name('frontend.hotel');
        Route::get('search', 'FrontendController@search_hotel')->name('frontend.hotel_search');
        Route::get('{slug}', 'FrontendController@hotel_detail')->name('frontend.hotelDetail');
        Route::get('{slug}/{slug_kamar}', 'FrontendController@kamar_hotel_detail')->name('frontend.kamarHotelDetail');
    });
    Route::prefix('event')->group(function () {
        Route::get('/', 'FrontendController@event')->name('frontend.event');
        Route::get('{id}/{slug}', 'FrontendController@eventDetail')->name('frontend.eventDetail');
    });

    Route::prefix('blog')->group(function () {
        Route::get('/', 'FrontendController@blog')->name('frontend.blog');
        Route::get('{slug}', 'FrontendController@blog_detail')->name('frontend.blog_detail');
    });
    Route::prefix('honeymoon')->group(function () {
        Route::get('{slug}', 'FrontendController@honeymoon_detail')->name('frontend.honeymoon_detail');
        Route::get('{slug}/order', 'FrontendController@honeymoon_order')->name('frontend.honeymoon_order');
        Route::post('{slug}/buy_now', 'FrontendController@honeymoon_buy')->name('frontend.honeymoon_buy');
        Route::get('{slug}/payment/{id}', 'FrontendController@honeymoon_confirm')->name('frontend.honeymoon_confirm');
    });

    // Route::prefix('partner')->group(function(){
    //     Route::get('/', 'FrontendController@partnership')->name('frontend.partnership');
    //     Route::post('simpan', 'CooperationController@simpan_frontend')->name('frontend.partnership.simpan');
    // });

    // Route::prefix('gallery')->group(function () {
    //     Route::get('/', 'GalleryController@index')->name('frontend.gallery');
    // });

    Route::prefix('dokumentasi')->group(function () {
        Route::get('/', 'GalleryController@dokumentasi')->name('frontend.dokumentasi');
    });

    Route::prefix('promosi')->group(function () {
        Route::get('{id}', 'CouponController@promosi')->name('frontend.promosi');
        Route::post('{id}/cek_kode', 'CouponController@cek_kupon_used')->name('cek_kode');
    });

    Route::prefix('travelling')->group(function(){
        Route::get('/', 'TravellingController@f_index')->name('frontend.travelling');
        Route::get('{id}/order', 'TravellingController@f_detail_order')->name('frontend.travelling_detail_order');
        Route::get('{id}/{slug}', 'FrontendController@travelling_detail')->name('frontend.travelling.detail');
        Route::get('search', 'TravellingController@f_cari_travelling')->name('frontend.search.travelling');
        Route::post('order/{id}/checkout', 'TravellingController@buy_order')->name('frontend.travelling.checkout');
        Route::get('payment/{id}', 'TravellingController@order_payment')->name('frontend.travelling.payment');
    });

    Route::prefix('bromo')->group(function(){
        Route::get('/', 'BromoController@f_index')->name('frontend.bromo');
        Route::get('reservasi/{id}/{tanggal}', 'BromoController@f_booking')->name('frontend.bromo.booking');
        Route::post('reservasi/{id}/{tanggal}/ckeckout', 'BromoController@f_booking_payment_checkout')->name('frontend.bromo.checkout');
        // Route::post('reservasi/{id}/{tanggal}/{id_transaksi}/payment', 'BromoController@f_booking_payment_manual')->name('frontend.bromo.payment_manual');
    });
    Route::get('reservasi/payment/{reference}', 'BromoController@f_checkout_detail')->name('frontend.bromo.f_checkout_detail');
    Route::get('reservasi/invoice/{transaction_code}', 'BromoController@f_booking_invoice')->name('frontend.bromo.f_reservasi_invoice');
    Route::get('reservasi/sendEmail/{transaction_code}', 'BromoController@f_send_mail')->name('frontend.bromo.sendEmail')->middleware('verified');

    Route::prefix('tour')->group(function(){
        Route::get('/', 'Frontend\v2\TourController@index')->name('frontend.tour');
    });

    Route::prefix('sewa-bus')->group(function () {
        Route::get('/', 'FrontendController@sewa_bus')->name('frontend.sewa_bus');
    });

    Route::get('invoice/{id}/tiket_wisata', 'InvoiceController@tiket_wisata')->name('invoice.tiket_wisata');
    Route::get('invoice/{kode_order}', 'InvoiceController@invoice_order')->name('invoice');
    Route::get('invoice/{kode_order}/send', 'InvoiceController@invoice_send')->name('invoice.send');

    Route::get('invoice_testing/{kode_order}', 'InvoiceController@invoice_testing');
    Route::get('testings', 'FrontendController@frontend_testing');

    // Route::get('invoice_testing/{kode_order}', function($kode_order){
    //     return view('emails.InvoiceTravelling',[
    //         'details' => [
    //             'invoice' => $kode_order,
    //             'nama_pembayaran' => 'Rio',
    //             'alamat' => 'Rio',
    //             'phone' => '082233684670',
    //             'email' => 'rioanugrah999@gmail.com',
    //             'total' => '350000',
    //             'created_at' => '2024-01-03 21:00:00',
    //             'updated_at' => '2024-01-03 21:00:00',
    //         ]
    //     ]);
    // });

    // Route::get('testing_wa', function(){
    //     $nohp = "082233684670";
    //     if(!preg_match("/[^+0-9]/",trim($nohp))){
    //         // cek apakah no hp karakter ke 1 dan 2 adalah angka 62
    //         if(substr(trim($nohp), 0, 2)=="62"){
    //             $hp    =trim($nohp);
    //         }
    //         // cek apakah no hp karakter ke 1 adalah angka 0
    //         else if(substr(trim($nohp), 0, 1)=="0"){
    //             $hp    ="62".substr(trim($nohp), 1);
    //         }
    //     }
    //     return $hp;
    // });

    // Route::get('callback',function(){
    //     return 'Oke';
    // });
    // Route::post('callback','Payment\TripayController@handle');

});

Route::domain('partner.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
// Route::domain('partner.plesiranindonesia.com')->group(function () {
    Route::get('/', 'FrontendController@partnership')->name('partnership');
    Route::post('cooperation/kab_kota', 'CooperationController@select_kab_kota');
    Route::post('home/simpan', 'FrontendController@partnership_simpan')->name('partnership.simpan');
});

// Route::domain('booking.'.parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
//     Route::get('{id}/order', 'TravellingController@f_detail_order')->name('frontend.travelling_detail_order');
// });

// Route::get('test', function () {
//     // event(new App\Events\TravellingEvent('1','http://localhost:8000','Notif Baru','data masuk','primary','uil-angle-down','21'));
//     // event(new App\Events\NotificationEvent('1','http://localhost:8000','Notif Baru','data masuk','primary','uil-angle-down','21'));

//     // new App\Notifications\NotificationNotif;
//     $user = auth()->user();
//     new Notification::send($user,new App\Notifications\NotificationNotif('1','http://localhost:8000','Notif Baru','data masuk','primary','uil-angle-down','21'));
//     // NotificationNotif::send(send(auth()->user(),('1','http://localhost:8000','Notif Baru','data masuk','primary','uil-angle-down','21')));

//         // event(new App\Events\TravellingEvent('1'));
//     return "Event has been sent!";
// });

// Route::get('test/{code}', 'TestingController@sendNotif');

// Route::get('send-notif/{name}', function ($name) {
//     event(new \App\Events\TravellingEvent($name));
//     return "Event has been sent!";
// });

// Route::get('testing_new/{code}', function ($code) {
//     $invoice = \App\Models\Transactions::where('transaction_code',$code)->first();
//     return view('emails.InvoiceTesting',compact('invoice'));
// });

// Route::get('new_test', function(){
//     return env('MIDTRANS_CLIENT_KEY_DEMO');
// });

// Route::any('{page?}',function(){
//     return View::make('layouts.status.404');
//     // return View::make('pages.error.404');
// })->where('page','.*');
