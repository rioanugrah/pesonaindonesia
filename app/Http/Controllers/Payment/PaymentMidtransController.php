<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Transactions;
use App\Models\TransactionList;

use App\Events\NotificationEvent;
use App\Notifications\NotificationNotif;

use \Carbon\Carbon;
use Notification;
use DB;
// use Midtrans\Config;
// use Midtrans\Snap;
// use App\Services\Midtrans\CreateSnapTokenService;
// use Config;

class PaymentMidtransController extends Controller
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

    public function test_payment(Request $request)
    {
        // Set your Merchant Server Key
        // if (env('MIDTRANS_IS_PRODUCTION') == true) {
        //     \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // }else{
        // }
        \Midtrans\Config::$serverKey = $this->midtrans_server_key;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => 10000,
        //     ),
        //     'customer_details' => array(
        //         'first_name' => 'budi',
        //         'last_name' => 'pratama',
        //         'email' => 'budi.pra@example.com',
        //         'phone' => '08111222333',
        //     ),
        // );
        $params = [
            'transaction_details' => [
                'order_id' => 'TRX-'.rand(),
                'gross_amount' => $request->orderTotal,
            ],
            'customer_details' => array(
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ),
        ];

        $data['midtrans_client_key'] = $this->midtrans_client_key;
        $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
        // $snapToken = Snap::getSnapToken($params);
        return view('frontend.frontend5.payment.index',$data);
        // return view('orders.show', compact('order', 'snapToken'));
    }

    public function payment_checkout(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = $this->midtrans_server_key;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // $urutan = Order::max('kode_order');
        DB::beginTransaction();

        try {
            $input['id'] = Str::uuid()->toString();
            $input['transaction_code'] = 'TRX-'.rand(1000,9999).Carbon::now()->format('mY');
            $input['transaction_unit'] = $request->title;

            if (!empty($request->nama_anggota)) {
                foreach ($request->nama_anggota as $key => $value) {
                    $data['item_details'][] = [
                        'id' => $key+1,
                        'name' => $value,
                        'qty' => 1
                    ];
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
                $input['transaction_order'] = json_encode([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->alamat,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);
            }

            if($request->qty == 0 and $request->qty == null){
                $input['transaction_qty'] = 1;
            }else{
                $input['transaction_qty'] = $request->qty;
            }

            $input['transaction_price'] = $request->orderTotal;
            if (auth()->user()) {
                $input['user'] = auth()->user()->id;
            }else{
                $input['user'] = null;
            }
            $input['status'] = 'Unpaid';
            
            $transactions = Transactions::create($input);
            DB::commit();
            
            if($transactions){
                $params['transaction_details'] = [
                    'order_id' => $input['transaction_code'],
                    'gross_amount' => $request->orderTotal,
                ];
                $params['customer_details'] = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ];
                // $params['item_details'] = [
                //     [
                //         'id' => '1',
                //         'price' => $request->orderTotal,
                //         'quantity' => $input['qty'],
                //         'name' => $request->title
                //     ]
                // ];
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
                // foreach ($users as $user) {
                // }

                $data['kode_order'] = $input['transaction_code'];
                $data['first_name'] = $request->first_name;
                $data['last_name'] = $request->last_name;
                $data['email'] = $request->email;
                $data['title'] = $request->title;
                $data['qty'] = $input['transaction_qty'];
                $data['price'] = $input['transaction_price'];
        
                $data['link_url_payment'] = $this->url_payment;
                $data['midtrans_client_key'] = $this->midtrans_client_key;
                $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
                return view('frontend.frontend5.payment.index',$data);
            }
            
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back();
        }
        
        // return $data['snapToken'];
        // return view('orders.show', compact('order', 'snapToken'));
    }

    public function payment_callback(Request $request)
    {
        $serverKey = $this->midtrans_server_key;
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            $transactions = Transactions::where('transaction_code',$request->order_id)->first();
            $transactions->update([
                'status' => 'Paid'
            ]);
        }else{
            $transactions = Transactions::where('transaction_code',$request->order_id)->first();
            $transactions->update([
                'status' => 'Not Paid'
            ]);
        }
    }
}
