<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::prefix('b')->group(function () {
            Route::prefix('home')->group(function() {
                Route::get('/', 'v2\HomeController@index')->name('home')->middleware('verified');
                Route::get('balance', 'v2\HomeController@balance')->name('balance')->middleware('verified');
                Route::get('ajax_booking', 'v2\HomeController@ajax_booking_travelling')->name('home.ajax_booking_travelling')->middleware('verified');
            });
            Route::prefix('tour')->group(function() {
                Route::get('/', 'v2\TourController@all_tour')->name('tour')->middleware('verified');
                Route::get('create', 'v2\TourController@all_tour_create')->name('tour.create')->middleware('verified');
                Route::post('simpan', 'v2\TourController@all_tour_simpan')->name('tour.create.simpan')->middleware('verified');
                Route::get('{id}/edit', 'v2\TourController@all_tour_edit')->name('tour.edit')->middleware('verified');
                Route::post('{id}/update', 'v2\TourController@all_tour_update')->name('tour.update')->middleware('verified');
                Route::get('{id}/delete', 'v2\TourController@all_tour_delete')->name('tour.delete')->middleware('verified');
                Route::get('order', 'v2\TourController@tour_order_view')->name('tour.order')->middleware('verified');
                Route::prefix('category')->group(function() {
                    Route::get('/', 'v2\TourController@tour_category')->name('tour.category')->middleware('verified');
                    Route::post('simpan', 'v2\TourController@tour_category_simpan')->name('tour.category.simpan')->middleware('verified');
                });
                Route::prefix('attribute')->group(function() {
                    Route::get('/', 'v2\TourController@tour_attribute')->name('tour.attribute')->middleware('verified');
                    Route::post('simpan', 'v2\TourController@tour_attribute_simpan')->name('tour.attribute.simpan')->middleware('verified');
                    Route::prefix('manage')->group(function() {
                        Route::get('{id}', 'v2\TourController@tour_attribute_manage')->name('tour.attribute.manage')->middleware('verified');
                        Route::post('{id}/simpan', 'v2\TourController@tour_attribute_manage_simpan')->name('tour.attribute.manage.simpan')->middleware('verified');
                        Route::get('{id}/detail/{tour_manage_id}', 'v2\TourController@tour_attribute_manage_detail')->name('tour.attribute.manage.detail')->middleware('verified');
                        Route::post('{id}/update', 'v2\TourController@tour_attribute_manage_update')->name('tour.attribute.manage.update')->middleware('verified');
                    });
                });
            });
            // Route::get('home', 'HomeController@index')->name('home')->middleware('verified');
            // Route::get('home/balance', 'HomeController@balance')->name('home.balance')->middleware('verified');
            
            Route::get('wisatas', 'WisataController@index')->name('wisata')->middleware('verified');
            Route::post('wisata/simpan', 'WisataController@simpan')->name('wisata.simpan')->middleware('verified');
            
            Route::get('kategori_kota', 'KategoriKotaController@index')->name('ktkota')->middleware('verified');
            Route::post('kategori_kota/simpan', 'KategoriKotaController@simpan')->name('ktkota.simpan')->middleware('verified');
            
            Route::prefix('kategori')->group(function() {
                Route::prefix('bidang_usaha')->group(function() {
                    Route::get('/', 'KategoriController@bidang_usaha')->name('kategori.bidang_usaha')->middleware('verified');
                    Route::post('simpan', 'KategoriController@bidang_usaha_simpan')->name('kategori.bidang_usaha.simpan')->middleware('verified');
                });
                Route::prefix('persewaan')->group(function() {
                    Route::get('/', 'KategoriController@persewaan')->name('kategori.persewaan')->middleware('verified');
                    Route::post('simpan', 'KategoriController@persewaan_simpan')->name('kategori.persewaan.simpan')->middleware('verified');
                });
            });

            Route::prefix('persewaan')->group(function() {
                Route::prefix('bus')->group(function() {
                    Route::get('/', 'PersewaanController@bus')->name('persewaan.bus')->middleware('verified');
                    Route::get('create', 'PersewaanController@bus_create')->name('persewaan.bus.create')->middleware('verified');
                    Route::post('simpan', 'PersewaanController@bus_simpan')->name('persewaan.bus.simpan')->middleware('verified');
                    Route::get('{id}/edit', 'PersewaanController@bus_edit')->name('persewaan.bus.edit')->middleware('verified');
                    Route::post('{id}/update', 'PersewaanController@bus_update')->name('persewaan.bus.update')->middleware('verified');
                    // Route::post('simpan', 'KategoriController@bidang_usaha_simpan')->name('kategori.bidang_usaha.simpan')->middleware('verified');
                });
            });

            Route::prefix('cooperation')->group(function() {
                Route::get('/', 'v2\CooperationController@index')->name('cooperation')->middleware('verified');
                Route::get('{id}/surat', 'v2\CooperationController@surat')->name('cooperation.surat')->middleware('verified');
                Route::get('notif', 'v2\CooperationController@notif')->middleware('verified');
                Route::post('simpan', 'v2\CooperationController@simpan')->name('cooperation.simpan')->middleware('verified');
                Route::get('{id}/download', 'v2\CooperationController@download')->name('cooperation.download')->middleware('verified');
                Route::get('{id}', 'v2\CooperationController@detail')->name('cooperation.detail')->middleware('verified');
                Route::get('{id}/edit', 'v2\CooperationController@edit')->middleware('verified');
                Route::get('{id}/hapus', 'v2\CooperationController@hapus')->middleware('verified');
                Route::post('upload', 'v2\CooperationController@upload_berkas')->name('cooperation.upload_berkas')->middleware('verified');
                Route::post('data/upload', 'v2\CooperationController@berkas')->name('cooperation.berkas')->middleware('verified');
                Route::post('status', 'v2\CooperationController@status')->name('cooperation.status')->middleware('verified');
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
            
            Route::prefix('coupons')->group(function(){
                Route::get('/', 'CouponController@index')->name('coupon')->middleware('verified');
                Route::post('simpan', 'CouponController@simpan')->name('coupon.simpan')->middleware('verified');
                Route::get('{id}/used', 'CouponController@kupon_used')->name('coupon.used')->middleware('verified');
                Route::post('{id}/used/simpan', 'CouponController@kupon_used_simpan')->name('coupon.used.simpan')->middleware('verified');
            });
    
            Route::prefix('travelling')->group(function(){
                Route::get('/', 'TravellingController@b_index')->name('travelling')->middleware('verified');
                Route::get('create', 'TravellingController@b_create')->name('travelling.create')->middleware('verified');
                Route::get('{id}/edit', 'TravellingController@b_edit')->name('travelling.edit')->middleware('verified');
                Route::post('simpan', 'TravellingController@simpan')->name('travelling.simpan')->middleware('verified');
                Route::post('{id}/update', 'TravellingController@update')->name('travelling.update')->middleware('verified');
                Route::get('{id}/delete', 'TravellingController@delete')->name('travelling.delete')->middleware('verified');
            });
    
            Route::prefix('vendors')->group(function(){
                Route::get('/', 'VendorsController@index')->name('vendors')->middleware('verified');
                Route::post('simpan', 'VendorsController@simpan')->name('vendors.simpan')->middleware('verified');
                Route::post('update', 'VendorsController@update')->name('vendors.update')->middleware('verified');
                Route::get('{kode_vendor}', 'VendorsController@detail')->name('vendors.detail')->middleware('verified');
                Route::get('produk/{kode_vendor}', 'VendorsController@detail_produk')->name('vendors.detail_produk')->middleware('verified');
                Route::get('produk/{kode_vendor}/create', 'VendorsController@detail_create')->name('vendors.detail_produk.create')->middleware('verified');
                Route::post('produk/{kode_vendor}/simpan', 'VendorsController@detail_simpan')->name('vendors.detail_produk.simpan')->middleware('verified');
            });
    
            Route::prefix('pengguna')->group(function(){
                Route::get('/', 'v2\PenggunaController@index')->name('pengguna')->middleware('verified');
                Route::post('simpan', 'v2\PenggunaController@simpan')->name('pengguna.simpan')->middleware('verified');
                Route::post('update', 'v2\PenggunaController@update')->name('pengguna.update')->middleware('verified');
                Route::get('{id}', 'v2\PenggunaController@detail')->name('pengguna.detail')->middleware('verified');
                Route::get('{id}/reset', 'v2\PenggunaController@reset')->name('pengguna.reset')->middleware('verified');
            });
            
            Route::resource('users','v2\UsersController');
            Route::prefix('permissions')->group(function(){
                Route::get('/', 'v2\PermissionsController@index')->name('permissions')->middleware('verified');
                Route::post('simpan', 'v2\PermissionsController@simpan')->name('permissions.simpan')->middleware('verified');
            });

            Route::get('profile', 'v2\UsersController@profile')->name('pengguna.profile')->middleware('verified');
    
            Route::prefix('visitor')->group(function(){
                Route::get('/', 'v2\VisitorController@index')->name('visitor')->middleware('verified');
            });

            Route::prefix('gallery')->group(function(){
                Route::get('/', 'v2\GalleryController@index')->name('b.gallery')->middleware('verified');
                Route::post('simpan', 'v2\GalleryController@simpan')->name('b.gallery.simpan')->middleware('verified');
            });
            
            // Route::prefix('roles')->group(function(){
            //     Route::get('/', 'RolesController@index')->name('roles')->middleware('verified');
            //     Route::post('simpan', 'RolesController@simpan')->name('roles.simpan')->middleware('verified');
            //     Route::get('{id}/edit', 'RolesController@edit')->name('roles.edit')->middleware('verified');
            //     Route::get('{slug}', 'RolesController@detail')->name('roles.detail')->middleware('verified');
            //     Route::post('update', 'RolesController@update')->name('roles.update')->middleware('verified');
            // });
            Route::resource('roles','v2\RolesController');
            
            Route::get('status', 'StatusController@index')->name('status')->middleware('verified');
            
            Route::prefix('slider')->group(function(){
                Route::get('/', 'SliderController@index')->name('slider')->middleware('verified');
                Route::get('{id}/edit', 'SliderController@edit')->name('slider.edit')->middleware('verified');
                Route::post('simpan', 'SliderController@simpan')->name('slider.simpan')->middleware('verified');
                Route::post('update', 'SliderController@update')->name('slider.update')->middleware('verified');
                Route::get('{id}/hapus', 'SliderController@delete')->name('slider.hapus')->middleware('verified');
            });
    
            Route::prefix('posting')->group(function() {
                Route::get('/', 'v2\PostingController@index')->name('posting')->middleware('verified');
                Route::get('buat', 'v2\PostingController@create')->name('posting.create')->middleware('verified');
                Route::post('simpan', 'v2\PostingController@simpan')->name('posting.simpan')->middleware('verified');
                Route::get('{slug}/edit', 'v2\PostingController@edit')->name('posting.edit')->middleware('verified');
                Route::post('{slug}/update', 'v2\PostingController@update')->name('posting.update')->middleware('verified');
                Route::get('{id}/delete', 'v2\PostingController@delete')->name('posting.delete')->middleware('verified');
            });
            // Route::prefix('paket')->group(function(){
    
            // });
    
            Route::get('tiket_wisata', 'TiketWisataController@index_tiket_wisata')->name('tiket_wisata')->middleware('verified');
            
            Route::prefix('hotel')->group(function() {
                Route::get('/', 'HotelController@index')->name('hotel')->middleware('verified');
                Route::post('/simpan', 'HotelController@simpan')->name('hotel.simpan')->middleware('verified');
                Route::post('/upload_image', 'HotelController@upload_image')->name('hotel.upload_image')->middleware('verified');
                Route::post('/update', 'HotelController@update')->name('hotel.update')->middleware('verified');
                Route::get('/{id}/image', 'HotelController@detail_image')->middleware('verified');
                Route::get('/{id}', 'HotelController@detail')->name('hotel.detail')->middleware('verified');
                Route::get('/{id}/edit', 'HotelController@edit')->name('hotel.edit')->middleware('verified');
                Route::get('/{id}/kamar', 'KamarHotelController@index')->name('kamar')->middleware('verified');
                Route::post('/kamar/simpan', 'KamarHotelController@simpan')->name('kamar.simpan')->middleware('verified');
                Route::get('/delete/{id}', 'HotelController@destroy')->name('hotel.hapus')->middleware('verified');
                Route::post('/export', 'HotelController@export')->name('hotel.export')->middleware('verified');
                Route::post('/import', 'HotelController@import')->name('hotel.import')->middleware('verified');
                Route::get('/checkroom/{id}', 'HotelController@checkRoom')->name('hotel.checkroom')->middleware('verified');
            });

            Route::prefix('honeymoon')->group(function(){
                Route::get('/', 'HoneymoonController@index')->name('honeymoon')->middleware('verified');
                Route::get('create', 'HoneymoonController@create')->name('honeymoon.create')->middleware('verified');
                Route::post('simpan', 'HoneymoonController@simpan')->name('honeymoon.simpan')->middleware('verified');
                Route::get('{id}/edit', 'HoneymoonController@edit')->name('honeymoon.edit')->middleware('verified');
                Route::post('{id}/update', 'HoneymoonController@update')->name('honeymoon.update')->middleware('verified');
                Route::get('{id}/delete', 'HoneymoonController@delete')->name('honeymoon.delete')->middleware('verified');
            });
            // Route::get('hotel/importExportView', 'DemoController@importExportView');
            Route::prefix('perusahaan')->group(function(){
                Route::get('/', 'v2\PerusahaanController@index')->name('perusahaan')->middleware('verified');
                Route::post('simpan', 'v2\PerusahaanController@simpan')->name('perusahaan.simpan')->middleware('verified');
                Route::get('{id}/edit', 'v2\PerusahaanController@edit')->name('perusahaan.edit')->middleware('verified');
                Route::post('update', 'v2\PerusahaanController@update')->name('perusahaan.update')->middleware('verified');
                Route::get('delete/{id}', 'v2\PerusahaanController@destroy')->name('perusahaan.hapus')->middleware('verified');
            });

            Route::get('log', 'LogController@index')->name('log')->middleware('verified');
            
            Route::prefix('events')->group(function(){
                Route::get('/', 'v2\EventController@index')->name('events')->middleware('verified');
                Route::get('buat', 'v2\EventController@create')->name('events.buat')->middleware('verified');
                Route::post('simpan', 'v2\EventController@simpan')->name('events.simpan')->middleware('verified');
                Route::get('{id}', 'v2\EventController@detail')->name('events.detail')->middleware('verified');
                Route::get('{id}/register', 'v2\EventController@detailEventRegister')->name('events.detailRegister')->middleware('verified');
                Route::get('delete/{id}', 'v2\EventController@destroy')->name('events.delete')->middleware('verified');
            });
            
            Route::prefix('seo')->group(function(){
                Route::get('/', 'v2\SeoController@index')->name('seo')->middleware('verified');
                Route::post('simpan', 'v2\SeoController@simpan')->name('seo.simpan')->middleware('verified');                
            });
            
            Route::prefix('invoice')->group(function(){
                Route::get('/', 'v2\InvoiceController@index')->name('b.invoice')->middleware('verified');
                Route::get('create', 'v2\InvoiceController@create')->name('b.invoice.create')->middleware('verified');
                Route::get('{kode_order}', 'v2\InvoiceController@detail')->name('b.invoice.detail')->middleware('verified');
                Route::get('{kode_order}/print', 'v2\InvoiceController@print_pos')->name('b.invoice.print_pos')->middleware('verified');
            });
            
            Route::prefix('transaction')->group(function(){
                Route::get('/', 'v2\OrderController@index')->name('b.order')->middleware('verified');
            });

            Route::prefix('finance')->group(function(){
                Route::get('laporan_transaksi', 'v2\LaporanKeuanganController@laporan_transaksi')->name('b.laporan_transaksi')->middleware('verified');
            });

            Route::prefix('promosi')->group(function(){
                Route::get('/', 'v2\PromosiController@index')->name('b.promosi')->middleware('verified');
                Route::get('create', 'v2\PromosiController@create')->name('b.promosi.create')->middleware('verified');
                Route::post('simpan', 'v2\PromosiController@simpan')->name('b.promosi.simpan')->middleware('verified');
                Route::get('{id_generate}/edit', 'v2\PromosiController@edit')->name('b.promosi.edit')->middleware('verified');
                Route::post('{id_generate}/update', 'v2\PromosiController@update')->name('b.promosi.update')->middleware('verified');
                Route::get('{id_generate}/delete', 'v2\PromosiController@delete')->name('b.promosi.delete')->middleware('verified');
            });
    
            // Route::get('pengguna/{id}', 'UsersController@detail')->middleware('verified');
            // Route::get('pengguna/delete/{id}', 'UsersController@delete')->middleware('verified');
            // Route::post('pengguna/simpan', 'UsersController@simpan')->name('pengguna.simpan')->middleware('verified');
            // Route::post('pengguna/update', 'UsersController@update')->name('pengguna.update')->middleware('verified');
        });

        Route::prefix('b/plesiran_malang')->group(function(){
            Route::prefix('tour')->group(function(){
                Route::get('/', 'PlesiranMalang\TourController@tour')->name('b.plesiran_malang.tour');
                Route::get('create', 'PlesiranMalang\TourController@tour_create')->name('b.plesiran_malang.tour_create');
                Route::post('simpan', 'PlesiranMalang\TourController@tour_simpan')->name('b.plesiran_malang.tour_simpan');
            });
        });
    });
    
    Route::post('cooperation/kab_kota', 'CooperationController@select_kab_kota')->name('select.kota');
    
    Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login_google');
    Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');
    
    Route::get('save-token1', 'TestingController@save')->name('save.token1');
    Route::post('save-token', 'TestingController@save')->name('save.token');
    Route::post('send-notification', 'TestingController@send_notif')->name('send.notification');
    Route::post('mark-as-read', 'NotifikasiController@markNotification')->name('markNotification');

});