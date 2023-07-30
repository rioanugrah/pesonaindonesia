<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderList;
use \Carbon\Carbon;
// use Midtrans\Config;
// use Midtrans\Snap;
// use App\Services\Midtrans\CreateSnapTokenService;
// use Config;

class PaymentMidtransController extends Controller
{
    public function __construct(){
        // $this->midtrans_is_production = env('MIDTRANS_IS_PRODUCTION');
        $this->midtrans_client_key = env('MIDTRANS_CLIENT_KEY');
        $this->midtrans_server_key = env('MIDTRANS_SERVER_KEY');
        if (env('MIDTRANS_IS_PRODUCTION') == true) {
            $this->url_payment = 'https://app.midtrans.com/snap/snap.js';
        }else{
            $this->url_payment = 'https://app.sandbox.midtrans.com/snap/snap.js';
        }
    }

    public function test_payment(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
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

        $data['midtrans_client_key'] = env('MIDTRANS_CLIENT_KEY');
        $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
        // $snapToken = Snap::getSnapToken($params);
        return view('frontend.frontend5.payment.index',$data);
        // return view('orders.show', compact('order', 'snapToken'));
    }

    public function payment_checkout(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // $urutan = Order::max('kode_order');
        $input['id'] = Str::uuid()->toString();
        $input['kode_order'] = 'TRX-'.rand(1000,9999).Carbon::now()->format('mY');
        $input['nama_order'] = $request->title;

        foreach ($request->nama_anggota as $key => $value) {
            $data['item_details'][] = [
                'id' => $key+1,
                'name' => $value,
                'qty' => 1
            ];
        }

        $input['pemesan'] = json_encode([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->alamat,
            'email' => $request->email,
            'phone' => $request->phone,
            'item_details' => $data['item_details']
        ]);

        if($request->qty == 0 and $request->qty == null){
            $input['qty'] = 1;
        }else{
            $input['qty'] = $request->qty;
        }

        $input['price'] = $request->orderTotal;
        if (auth()) {
            $input['user'] = auth()->user()->id;
        }else{
            $input['user'] = null;
        }
        $input['status'] = 'Unpaid';
        
        $order = Order::create($input);

        if($order){
            $params['transaction_details'] = [
                'order_id' => $input['kode_order'],
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

            $data['kode_order'] = $input['kode_order'];
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['email'] = $request->email;
            $data['title'] = $request->title;
            $data['qty'] = $input['qty'];
            $data['price'] = $input['price'];
    
            $data['link_url_payment'] = $this->url_payment;
            $data['midtrans_client_key'] = env('MIDTRANS_CLIENT_KEY');
            $data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
            return view('frontend.frontend5.payment.index',$data);
        }

        return redirect()->back();
        
        // return $data['snapToken'];
        // return view('orders.show', compact('order', 'snapToken'));
    }

    public function payment_callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            $order = Order::where('kode_order',$request->order_id)->first();
            $order->update([
                'status' => 'Paid'
            ]);
        }else{
            $order = Order::where('kode_order',$request->order_id)->first();
            $order->update([
                'status' => 'Not Paid'
            ]);
        }
    }
}
