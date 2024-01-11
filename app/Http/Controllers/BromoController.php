<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Models\Bromo;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Transactions;
use App\Models\TransactionList;
use App\Models\BuktiPembayaran;

use App\Models\VerifikasiTiket;
use App\Models\VerifikasiTiketList;

use App\Events\NotificationEvent;
use App\Notifications\NotificationNotif;

use App\Mail\Pembayaran;
use App\Mail\InvoiceTravelling;

use \Carbon\Carbon;
use DataTables;
use Notification;
use Validator;
use DB;
use Mail;
use HTTP_Request2;

class BromoController extends Controller
{
    public function __construct(){
        // $this->midtrans_is_production = env('MIDTRANS_IS_PRODUCTION');
        if (env('MIDTRANS_IS_PRODUCTION') == true) {
            $this->midtrans_client_key = env('MIDTRANS_CLIENT_KEY_LIVE');
            $this->midtrans_server_key = env('MIDTRANS_SERVER_KEY_LIVE');
            $this->url_payment = 'https://app.midtrans.com/snap/snap.js';
        }else{
            $this->midtrans_client_key = env('MIDTRANS_CLIENT_KEY_DEMO');
            $this->midtrans_server_key = env('MIDTRANS_SERVER_KEY_DEMO');
            $this->url_payment = 'https://app.sandbox.midtrans.com/snap/snap.js';
        }
    }

    public function f_index()
    {
        $data['today'] = Carbon::today();
        $data['week_start'] = $data['today']->startOfWeek()->format('Y-m-d');
        $data['week_end'] = $data['today']->endOfWeek()->format('Y-m-d');
        // dd(date('Y-m-d'));
        // dd(Carbon::today()->format('Y-m-d'));
        // for ($i=$data['week_start']; $i <= $data['week_end']; $i++) { 
        //     if ($i == Carbon::today()->format('Y-m-d')) {
        //         $data['week_arrays'][] = $i.' True';
        //     }else{
        //         $data['week_arrays'][] = $i.' False';
        //     }
        // }
        // dd($data);
        return view('frontend.frontend5.bromo.index', $data);
    }

    public function f_booking($id,$tanggal)
    {
        $tanggal_live = Carbon::now()->format('H:i');
        // $tanggal_live = '23:01';
        // dd($tanggal_live);
        $data['bromo'] = Bromo::where('id',$id)
                                ->where('tanggal','LIKE','%'.$tanggal.'%')
                                // ->whereTime('tanggal','>=',$tanggal_live)
                                // ->whereYear('tanggal','>=',$tanggal->format('Y'))
                                // ->whereMonth('tanggal','>=',$tanggal->format('m'))
                                // ->whereDate('tanggal','>=',$tanggal->format('d'))
                                ->first();
        // dd($data['bromo']);
        if (empty($data['bromo'])) {
            return redirect()->back();
        }

        return view('frontend.frontend5.bromo.reservasi',$data);
    }

    public function f_booking_payment_checkout(Request $request, $id, $tanggal)
    {
        DB::beginTransaction();
        if (env('PAYMENT_MANUAL') == true) {
            $tanggal_live = Carbon::now()->format('H:i');
            $bromo = Bromo::where('id',$id)
                            ->where('tanggal','LIKE','%'.$tanggal.'%')
                            // ->whereTime('tanggal','>=',$tanggal_live)
                            ->first();
            $kode_jenis_transaksi = 'TRX-BRMO-M';
            $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
            $input['id'] = Str::uuid()->toString();
            $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
            $input['transaction_unit'] = $bromo->title;
            $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty : $bromo->price - (($bromo->discount/100) * $bromo->price);
            if (!empty($request->nama_anggota)) {
                $verifikasi_tiket = VerifikasiTiket::create([
                    'id' => Str::uuid()->toString(),
                    'transaction_id' => $input['id'],
                    'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                    'tanggal_booking' => $bromo->tanggal,
                    'nama_tiket' => $bromo->title,
                    'nama_order' => $request->first_name.' '.$request->last_name,
                    'address' => $request->alamat,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'qty' => $request->qty,
                    'price' => $transaction_price,
                    'status' => 'Unpaid'
                ]);
                foreach ($request->nama_anggota as $key => $value) {
                    $data['item_details'][] = [
                        'id' => $key+1,
                        'name' => $value,
                        'qty' => 1
                    ];

                    VerifikasiTiketList::create([
                        'id' => Str::uuid()->toString(),
                        'verifikasi_tiket_id' => $verifikasi_tiket->id,
                        'nama_order' => $value,
                        'qty' => 1
                    ]);
                }

                $input['transaction_order'] = json_encode([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->alamat,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    // 'payment_method' => env('PAYMENT_METHODE'),
                    // 'payment_name' => env('PAYMENT_NAME'),
                    // 'payment_rekening' => env('PAYMENT_REKENING'),
                    // 'prof_payment' => null,
                    'item_details' => $data['item_details']
                ]);
            }else{
                $input['transaction_order'] = json_encode([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->alamat,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    // 'payment_method' => env('PAYMENT_METHODE'),
                    // 'payment_name' => env('PAYMENT_NAME'),
                    // 'payment_rekening' => env('PAYMENT_REKENING'),
                    // 'prof_payment' => null,
                ]);

                $verifikasi_tiket = VerifikasiTiket::create([
                    'id' => Str::uuid()->toString(),
                    'transaction_id' => $input['id'],
                    'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                    'tanggal_booking' => $bromo->tanggal,
                    'nama_tiket' => $bromo->title,
                    'nama_order' => $request->first_name.' '.$request->last_name,
                    'address' => $request->alamat,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'qty' => $request->qty,
                    'price' => $transaction_price,
                    'status' => 'Unpaid'
                ]);
            }

            if($request->qty == 0 and $request->qty == null){
                $input['transaction_qty'] = 1;
            }else{
                $input['transaction_qty'] = $request->qty;
            }
            // return 'ok';

            $input['transaction_price'] = $transaction_price;
            if (auth()->user()) {
                $input['user'] = auth()->user()->id;
            }else{
                $input['user'] = null;
            }
            $input['status'] = 'Unpaid';
            
            $transactions = Transactions::create($input);
            $bromo->quota = $bromo->quota - $request->qty;
            $bromo->update();
            DB::commit();

            if ($transactions) {
                $user = User::where('role',1)->get();
                $notif = [
                    'id' => $input['id'],
                    'url' => route('b.invoice.detail',$input['transaction_code']),
                    'title' => $input['transaction_unit'],
                    'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
                    'color_icon' => 'warning',
                    'icon' => 'uil-clipboard-alt',
                    'publish' => $transactions->created_at,
                ];
                Notification::send($user,new NotificationNotif($notif));
                $data['id'] = $bromo->id;
                $data['id_transaksi'] = $input['id'];
                $data['tanggal'] = $tanggal;
                $data['kode_order'] = $input['transaction_code'];
                $data['first_name'] = $request->first_name;
                $data['last_name'] = $request->last_name;
                $data['email'] = $request->email;
                $data['title'] = $bromo->title;
                $data['qty'] = $input['transaction_qty'];
                $data['price'] = $input['transaction_price'];
                BuktiPembayaran::create([
                    'id' => Str::uuid()->toString(),
                    'id_transaksi' => $input['id'],
                    'kode_transaksi' => $input['transaction_code']
                ]);
                return view('frontend.frontend5.bromo.payment_manual',$data);
            }

            // if ($bromo->quota == 0) {
            //     // return 'test';
            //     return redirect()->back();
            // }else{
            //     $kode_jenis_transaksi = 'TRX-BRMO-M';
            //     $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
            //     $input['id'] = Str::uuid()->toString();
            //     $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
            //     $input['transaction_unit'] = $bromo->title;
            //     $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty : $bromo->price - (($bromo->discount/100) * $bromo->price);
            //     if (!empty($request->nama_anggota)) {
            //         $verifikasi_tiket = VerifikasiTiket::create([
            //             'id' => Str::uuid()->toString(),
            //             'transaction_id' => $input['id'],
            //             'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
            //             'tanggal_booking' => $bromo->tanggal,
            //             'nama_tiket' => $bromo->title,
            //             'nama_order' => $request->first_name.' '.$request->last_name,
            //             'address' => $request->alamat,
            //             'email' => $request->email,
            //             'phone' => $request->phone,
            //             'qty' => $request->qty,
            //             'price' => $transaction_price,
            //             'status' => 'Unpaid'
            //         ]);
            //         foreach ($request->nama_anggota as $key => $value) {
            //             $data['item_details'][] = [
            //                 'id' => $key+1,
            //                 'name' => $value,
            //                 'qty' => 1
            //             ];
    
            //             VerifikasiTiketList::create([
            //                 'id' => Str::uuid()->toString(),
            //                 'verifikasi_tiket_id' => $verifikasi_tiket->id,
            //                 'nama_order' => $value,
            //                 'qty' => 1
            //             ]);
            //         }
    
            //         $input['transaction_order'] = json_encode([
            //             'first_name' => $request->first_name,
            //             'last_name' => $request->last_name,
            //             'address' => $request->alamat,
            //             'email' => $request->email,
            //             'phone' => $request->phone,
            //             // 'payment_method' => env('PAYMENT_METHODE'),
            //             // 'payment_name' => env('PAYMENT_NAME'),
            //             // 'payment_rekening' => env('PAYMENT_REKENING'),
            //             // 'prof_payment' => null,
            //             'item_details' => $data['item_details']
            //         ]);
            //     }else{
            //         $input['transaction_order'] = json_encode([
            //             'first_name' => $request->first_name,
            //             'last_name' => $request->last_name,
            //             'address' => $request->alamat,
            //             'email' => $request->email,
            //             'phone' => $request->phone,
            //             // 'payment_method' => env('PAYMENT_METHODE'),
            //             // 'payment_name' => env('PAYMENT_NAME'),
            //             // 'payment_rekening' => env('PAYMENT_REKENING'),
            //             // 'prof_payment' => null,
            //         ]);
    
            //         $verifikasi_tiket = VerifikasiTiket::create([
            //             'id' => Str::uuid()->toString(),
            //             'transaction_id' => $input['id'],
            //             'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
            //             'tanggal_booking' => $bromo->tanggal,
            //             'nama_tiket' => $bromo->title,
            //             'nama_order' => $request->first_name.' '.$request->last_name,
            //             'address' => $request->alamat,
            //             'email' => $request->email,
            //             'phone' => $request->phone,
            //             'qty' => $request->qty,
            //             'price' => $transaction_price,
            //             'status' => 'Unpaid'
            //         ]);
            //     }

            //     if($request->qty == 0 and $request->qty == null){
            //         $input['transaction_qty'] = 1;
            //     }else{
            //         $input['transaction_qty'] = $request->qty;
            //     }
            //     // return 'ok';
    
            //     $input['transaction_price'] = $transaction_price;
            //     if (auth()->user()) {
            //         $input['user'] = auth()->user()->id;
            //     }else{
            //         $input['user'] = null;
            //     }
            //     $input['status'] = 'Unpaid';
                
            //     $transactions = Transactions::create($input);
            //     $bromo->quota = $bromo->quota - $request->qty;
            //     $bromo->update();
            //     DB::commit();

            //     if ($transactions) {
            //         $user = User::where('role',1)->get();
            //         $notif = [
            //             'id' => $input['id'],
            //             'url' => route('b.invoice.detail',$input['transaction_code']),
            //             'title' => $input['transaction_unit'],
            //             'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
            //             'color_icon' => 'warning',
            //             'icon' => 'uil-clipboard-alt',
            //             'publish' => $transactions->created_at,
            //         ];
            //         Notification::send($user,new NotificationNotif($notif));
            //         $data['id'] = $bromo->id;
            //         $data['tanggal'] = $tanggal;
            //         $data['kode_order'] = $input['transaction_code'];
            //         $data['first_name'] = $request->first_name;
            //         $data['last_name'] = $request->last_name;
            //         $data['email'] = $request->email;
            //         $data['title'] = $bromo->title;
            //         $data['qty'] = $input['transaction_qty'];
            //         $data['price'] = $input['transaction_price'];
            //         BuktiPembayaran::create([
            //             'id' => Str::uuid()->toString(),
            //             'id_transaksi' => $id,
            //             'kode_transaksi' => $input['transaction_code']
            //         ]);
            //         return view('frontend.frontend5.bromo.payment_manual',$data);
            //     }
            // }
        }else{
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = $this->midtrans_server_key;
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            // DB::beginTransaction();
            try {
                $tanggal_live = Carbon::now()->format('H:i');
                $bromo = Bromo::where('id',$id)
                                ->where('tanggal','LIKE','%'.$tanggal.'%')
                                ->whereTime('tanggal','>=',$tanggal_live)
                                ->first();
                // dd($bromo);

                $kode_jenis_transaksi = 'TRX-BRMO';
                $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
                $input['id'] = Str::uuid()->toString();
                $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
                $input['transaction_unit'] = $bromo->title;
                $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty : $bromo->price - (($bromo->discount/100) * $bromo->price);
                if (!empty($request->nama_anggota)) {
                    $verifikasi_tiket = VerifikasiTiket::create([
                        'id' => Str::uuid()->toString(),
                        'transaction_id' => $input['id'],
                        'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                        'tanggal_booking' => $bromo->tanggal,
                        'nama_tiket' => $bromo->title,
                        'nama_order' => $request->first_name.' '.$request->last_name,
                        'address' => $request->alamat,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'qty' => $request->qty,
                        'price' => $transaction_price,
                        'status' => 'Unpaid'
                    ]);
    
                    foreach ($request->nama_anggota as $key => $value) {
                        $data['item_details'][] = [
                            'id' => $key+1,
                            'name' => $value,
                            'qty' => 1
                        ];
    
                        VerifikasiTiketList::create([
                            'id' => Str::uuid()->toString(),
                            'verifikasi_tiket_id' => $verifikasi_tiket->id,
                            'nama_order' => $value,
                            'qty' => 1
                        ]);
                    }
    
                    $input['transaction_order'] = json_encode([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'address' => $request->alamat,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'item_details' => $data['item_details']
                    ]);
                }else{
                    // return 'ok';
                    $input['transaction_order'] = json_encode([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'address' => $request->alamat,
                        'email' => $request->email,
                        'phone' => $request->phone,
                    ]);
    
                    $verifikasi_tiket = VerifikasiTiket::create([
                        'id' => Str::uuid()->toString(),
                        'transaction_id' => $input['id'],
                        'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                        'tanggal_booking' => $bromo->tanggal,
                        'nama_tiket' => $bromo->title,
                        'nama_order' => $request->first_name.' '.$request->last_name,
                        'address' => $request->alamat,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'qty' => $request->qty,
                        'price' => $transaction_price,
                        'status' => 'Unpaid'
                    ]);
                }
    
                if($request->qty == 0 and $request->qty == null){
                    $input['transaction_qty'] = 1;
                }else{
                    $input['transaction_qty'] = $request->qty;
                }
                // return 'ok';
    
                $input['transaction_price'] = $transaction_price;
                if (auth()->user()) {
                    $input['user'] = auth()->user()->id;
                }else{
                    $input['user'] = null;
                }
                $input['status'] = 'Unpaid';
                
                $transactions = Transactions::create($input);
                $bromo->quota = $bromo->quota - $request->qty;
                $bromo->update();
                DB::commit();
                if ($transactions) {
                    // return 'ok';
                    $params['transaction_details'] = [
                        'order_id' => $input['transaction_code'],
                        'gross_amount' => $transaction_price,
                    ];
    
                    $params['customer_details'] = [
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                    ];
    
                    $user = User::where('role',1)->get();
                    $notif = [
                        'id' => $input['id'],
                        'url' => route('b.invoice.detail',$input['transaction_code']),
                        'title' => $input['transaction_unit'],
                        'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
                        'color_icon' => 'warning',
                        'icon' => 'uil-clipboard-alt',
                        'publish' => $transactions->created_at,
                    ];
                    Notification::send($user,new NotificationNotif($notif));
                    $data['kode_order'] = $input['transaction_code'];
                    $data['first_name'] = $request->first_name;
                    $data['last_name'] = $request->last_name;
                    $data['email'] = $request->email;
                    $data['title'] = $bromo->title;
                    $data['qty'] = $input['transaction_qty'];
                    $data['price'] = $input['transaction_price'];
            
                    $data['link_url_payment'] = $this->url_payment;
                    $data['midtrans_client_key'] = $this->midtrans_client_key;
                    $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
    
                    return view('frontend.frontend5.bromo.payment',$data);
                }

                // if ($bromo->quota == 0) {
                //     // return 'test';
                //     return redirect()->back();
                // }else{
                //     $kode_jenis_transaksi = 'TRX-BRMO';
                //     $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
                //     $input['id'] = Str::uuid()->toString();
                //     $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
                //     $input['transaction_unit'] = $bromo->title;
                //     $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty : $bromo->price - (($bromo->discount/100) * $bromo->price);
                //     if (!empty($request->nama_anggota)) {
                //         $verifikasi_tiket = VerifikasiTiket::create([
                //             'id' => Str::uuid()->toString(),
                //             'transaction_id' => $input['id'],
                //             'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                //             'tanggal_booking' => $bromo->tanggal,
                //             'nama_tiket' => $bromo->title,
                //             'nama_order' => $request->first_name.' '.$request->last_name,
                //             'address' => $request->alamat,
                //             'email' => $request->email,
                //             'phone' => $request->phone,
                //             'qty' => $request->qty,
                //             'price' => $transaction_price,
                //             'status' => 'Unpaid'
                //         ]);
        
                //         foreach ($request->nama_anggota as $key => $value) {
                //             $data['item_details'][] = [
                //                 'id' => $key+1,
                //                 'name' => $value,
                //                 'qty' => 1
                //             ];
        
                //             VerifikasiTiketList::create([
                //                 'id' => Str::uuid()->toString(),
                //                 'verifikasi_tiket_id' => $verifikasi_tiket->id,
                //                 'nama_order' => $value,
                //                 'qty' => 1
                //             ]);
                //         }
        
                //         $input['transaction_order'] = json_encode([
                //             'first_name' => $request->first_name,
                //             'last_name' => $request->last_name,
                //             'address' => $request->alamat,
                //             'email' => $request->email,
                //             'phone' => $request->phone,
                //             'item_details' => $data['item_details']
                //         ]);
                //     }else{
                //         // return 'ok';
                //         $input['transaction_order'] = json_encode([
                //             'first_name' => $request->first_name,
                //             'last_name' => $request->last_name,
                //             'address' => $request->alamat,
                //             'email' => $request->email,
                //             'phone' => $request->phone,
                //         ]);
        
                //         $verifikasi_tiket = VerifikasiTiket::create([
                //             'id' => Str::uuid()->toString(),
                //             'transaction_id' => $input['id'],
                //             'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                //             'tanggal_booking' => $bromo->tanggal,
                //             'nama_tiket' => $bromo->title,
                //             'nama_order' => $request->first_name.' '.$request->last_name,
                //             'address' => $request->alamat,
                //             'email' => $request->email,
                //             'phone' => $request->phone,
                //             'qty' => $request->qty,
                //             'price' => $transaction_price,
                //             'status' => 'Unpaid'
                //         ]);
                //     }
        
                //     if($request->qty == 0 and $request->qty == null){
                //         $input['transaction_qty'] = 1;
                //     }else{
                //         $input['transaction_qty'] = $request->qty;
                //     }
                //     // return 'ok';
        
                //     $input['transaction_price'] = $transaction_price;
                //     if (auth()->user()) {
                //         $input['user'] = auth()->user()->id;
                //     }else{
                //         $input['user'] = null;
                //     }
                //     $input['status'] = 'Unpaid';
                    
                //     $transactions = Transactions::create($input);
                //     $bromo->quota = $bromo->quota - $request->qty;
                //     $bromo->update();
                //     DB::commit();
                //     if ($transactions) {
                //         // return 'ok';
                //         $params['transaction_details'] = [
                //             'order_id' => $input['transaction_code'],
                //             'gross_amount' => $transaction_price,
                //         ];
        
                //         $params['customer_details'] = [
                //             'first_name' => $request->first_name,
                //             'last_name' => $request->last_name,
                //             'email' => $request->email,
                //             'phone' => $request->phone,
                //         ];
        
                //         $user = User::where('role',1)->get();
                //         $notif = [
                //             'id' => $input['id'],
                //             'url' => route('b.invoice.detail',$input['transaction_code']),
                //             'title' => $input['transaction_unit'],
                //             'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
                //             'color_icon' => 'warning',
                //             'icon' => 'uil-clipboard-alt',
                //             'publish' => $transactions->created_at,
                //         ];
                //         Notification::send($user,new NotificationNotif($notif));
                //         $data['kode_order'] = $input['transaction_code'];
                //         $data['first_name'] = $request->first_name;
                //         $data['last_name'] = $request->last_name;
                //         $data['email'] = $request->email;
                //         $data['title'] = $bromo->title;
                //         $data['qty'] = $input['transaction_qty'];
                //         $data['price'] = $input['transaction_price'];
                
                //         $data['link_url_payment'] = $this->url_payment;
                //         $data['midtrans_client_key'] = $this->midtrans_client_key;
                //         $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
        
                //         return view('frontend.frontend5.bromo.payment',$data);
                //     }
                // }
    
            } catch (\Throwable $th) {
                DB::rollback();
                // return $th;
                return redirect()->back();
            }
        }
    }

    public function f_booking_payment_manual(Request $request, $id, $tanggal, $id_transaksi)
    {
        // dd($id_transaksi);
        $bukti_pembayaran = BuktiPembayaran::where('id_transaksi',$id_transaksi)->first();
        // dd($bukti_pembayaran);
        if (empty($bukti_pembayaran)) {
            return redirect()->back();
        }

        $image = $request->file('images');
        $img = \Image::make($image->path());
        $img = $img->encode('webp', 75);
        $input['images'] = time().'.webp';
        $img->save(public_path('bukti_pembayaran/').$input['images']);

        $bukti_pembayaran->update([
            'images' => $input['images']
        ]);
        // return view('frontend.frontend5.invoice.index');
        return redirect()->route('invoice',['kode_order' => $bukti_pembayaran->kode_transaksi]);
    }

    // public function f_order_payment($id)
    // {
    //     $data['order'] = Order::find($id);
    //     $data['order_list'] = OrderList::select('order_id','pemesan','qty')
    //                                     ->where('order_id', $data['order']['id'])
    //                                     ->get();
    //     foreach (json_decode($data['order']['pemesan']) as $key => $p) {
    //         $data['pemesan'] = $p;
    //     }
    //     foreach (json_decode($data['order']['bank']) as $key => $bank) {
    //         $banks = $bank;
    //         $data['bankss'] = $bank;
    //     }
        
    //     $paymentLink = new HTTP_Request2();
    //     // $paymentLink->setUrl($this->payment_production.'/payment-checkout/status?partner_tx_id='.$id);
    //     $paymentLink->setUrl($this->payment_production.'/static-virtual-account/'.$banks->id_trx);
    //     $paymentLink->setMethod(HTTP_Request2::METHOD_GET);
    //     $paymentLink->setConfig(array(
    //     'follow_redirects' => TRUE
    //     ));
    //     $paymentLink->setHeader(array(
    //     'x-oy-username:'.$this->username,
    //     'x-api-key:'.$this->api_key,
    //     'Content-Type' => 'application/json',
    //     'Accept' => 'application/json'
    //     ));
    //     try {
    //         $response = $paymentLink->send();
    //         $name = json_decode($data['order']['pemesan']);
    //         $bank = json_decode($data['order']['bank']);
    //         $details = [
    //             'title' => 'Invoice'.' - '.$data['order']['id'],
    //             'invoice' => $data['order']['id'],
    //             'nama_order' => $data['order']['nama_order'],
    //             'nama_pembayaran' => $name[0]->first_name.' '.$name[0]->last_name,
    //             'alamat' =>  $name[0]->alamat,
    //             'qty' =>  $data['order']['qty'],
    //             'phone' =>  $name[0]->phone,
    //             'email' =>  $name[0]->email,
    //             'total' =>  $data['order']['price'],
    //             'status' =>  $data['order']['status'],
    //             'bank' =>  $bank[0]->kode_bank,
    //             'nama_penerima' =>  $bank[0]->nama_penerima,
    //             'created_at' =>  $data['order']['created_at'],
    //             'updated_at' =>  $data['order']['updated_at'],
    //             'order_details' => $data['order_list']
    //             // 'body' => 'Terima kasih telah melakukan pembelian tiket '.$data['travelling']['nama_travelling'].'.'.
    //             //             ' Silahkan lakukan pembayaran berikut.',
    //             // 'kode_bank' => $dataUrl['bank_code'],
    //             // 'nama_penerima' => 'Pesona Plesiran Indonesia',
    //             // 'nomor_rekening' => $dataUrl['va_number'],
    //             // 'payment_expired' => date("d F Y H:i:s", substr($dataUrl['trx_expiration_time'], 0, 10)),
    //             // 'url' => $dataUrl['url']
    //         ];
    //         if ($response->getStatus() == 200) {
    //             $dataPayment = json_decode($response->getBody(),true);
    //             $data['dataPayment'] = $dataPayment;
    //             if($dataPayment['va_status'] == 'WAITING_PAYMENT'){
    //                 $data['status_pembayaran'] = 1;
    //                 $data['status'] = 'Menunggu Pembayaran';
    //             }
    //             elseif($dataPayment['va_status'] == 'COMPLETE'){
    //                 $data['status_pembayaran'] = 3;
    //                 $data['status'] = 'Pembayaran Berhasil';
    //                 $data['order']->update([
    //                     'status' => $data['status_pembayaran']
    //                 ]);

    //                 $pdf = PDF::loadView('emails.InvoiceTravelling',['details' => $details]);
    //                 $pdf->setPaper('A4', 'portrait');

    //                 Mail::send('emails.messageInvoice', ['details' => $details], function ($message) use ($details, $pdf) {
    //                     $message->to($details["email"], $details["email"])
    //                             ->subject($details["title"])
    //                             ->attachData($pdf->output(), 'Invoice - '.$details["invoice"].'.pdf');
    //                 });

    //             }
    //             elseif($dataPayment['va_status'] == 'EXPIRED'){
    //                 $data['status_pembayaran'] = 4;
    //                 $data['status'] = 'Pembayaran Kadaluwarsa';
    //                 $data['order']->update([
    //                     'status' => $data['status_pembayaran']
    //                 ]);
    //             }

    //             // return view('frontend.frontend4.payment_paket',$data);
    //             return view('frontend.frontend5.order_payment',$data);
                
    //         }
    //         else {
    //         echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    //         $response->getReasonPhrase();
    //         }
    //     } catch (\HTTP_Request2_Exception $th) {
    //         echo 'Error: ' . $th->getMessage();
    //     }
    // }

    public function b_index(Request $request)
    {
        if ($request->ajax()) {
            $data = Bromo::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        // return 'Rp. '.number_format($row->price,0,',','.');
                        if ($row->tanggal >= Carbon::now()) {
                            $status = '<span class="badge bg-success">OPEN</span>';
                        }else{
                            $status = '<span class="badge bg-danger">CLOSED</span>';
                        }
                        return $status;
                    })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,0,',','.');
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .= '<button onclick="reupload(`'.$row->id.'`)" class="btn btn-info btn-xs"><i class="fas fa-file"></i> Re-upload</button>';
                        // $btn .= '<a href='.route('tour.edit',['id' => $row->id]).' class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                        // $btn .= '<button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }

        return view('backend_new_2023.bromo.index');
    }

    public function b_simpan(Request $request)
    {
        $rules = [
            'tanggal'  => 'required',
            'title'  => 'required',
            'meeting_point'  => 'required',
            'category_trip'  => 'required',
            'quota'  => 'required',
            'max_quota'  => 'required',
            'price'  => 'required',
            'discount'  => 'required',
            'group_include'  => 'required',
            'group_exclude'  => 'required',
        ];
 
        $messages = [
            'tanggal.required'   => 'Tanggal Dibuat wajib diisi.',
            'title.required'   => 'Judul wajib diisi.',
            'meeting_point.required'   => 'Meeting Point wajib diisi.',
            'category_trip.required'  => 'Kategori Trip wajib diisi.',
            'quota.required'   => 'Kuota wajib diisi.',
            'max_quota.required'   => 'Maksimal Kuota wajib diisi.',
            'price.required'   => 'Harga wajib diisi.',
            'discount.required'   => 'Diskon wajib diisi.',
            'group_include.required'   => 'Include wajib diisi.',
            'group_exlude.required'   => 'Exclude wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->title);
            $input['tanggal'] = $request->tanggal;
            $input['title'] = $request->title;
            $input['meeting_point'] = $request->meeting_point;
            $input['category_trip'] = $request->category_trip;
            $input['quota'] = $request->quota;
            $input['max_quota'] = $request->max_quota;
            $input['include'] = json_encode($request->group_include);
            $input['exclude'] = json_encode($request->group_exclude);
            $input['price'] = $request->price;
            $input['discount'] = $request->discount;

            $bromo = Bromo::create($input);
            if ($bromo) {
                $message_title="Berhasil !";
                $message_content="Paket Bromo Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return $array_message;
        }

        return response()->json([
            'success' => false,
            'error' => $validator->errors()->all()
        ]);
    }

    public function b_detail($id)
    {
        $bromo = Bromo::find($id);
        if (empty($bromo)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Data tidak ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $bromo
        ]);
    }

    public function b_reupload_simpan(Request $request)
    {
        $bromo = Bromo::find($request->reupload_id);
        $input['id'] = Str::uuid()->toString();
        $input['tanggal'] = $request->reupload_tanggal;
        $input['title'] = $request->reupload_title;
        $input['slug'] = Str::slug($request->reupload_title);
        $input['meeting_point'] = $request->reupload_meeting_point;
        $input['category_trip'] = $request->reupload_category_trip;
        $input['quota'] = $request->reupload_quota;
        $input['max_quota'] = $request->reupload_max_quota;
        $input['include'] = $bromo->include;
        $input['exclude'] = $bromo->exclude;
        $input['price'] = $request->reupload_price;
        $input['discount'] = $request->reupload_discount;

        $reupload = Bromo::create($input);

        if ($reupload) {
            $message_title="Berhasil !";
            $message_content="Paket Travelling ".$request->title." Berhasil Dibuat";
            $message_type="success";
            $message_succes = true;
        }

        $array_message = array(
            'success' => $message_succes,
            'message_title' => $message_title,
            'message_content' => $message_content,
            'message_type' => $message_type,
        );

        return response()->json($array_message);
    }
}
