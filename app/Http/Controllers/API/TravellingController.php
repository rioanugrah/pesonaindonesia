<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Travelling;
use \App\Models\TravellingFasilitas;
use \App\Models\TravellingHighlight;
use \App\Models\Order;
use \App\Models\OrderList;
use App\Mail\Pembayaran;
use Validator;
use Mail;
use HTTP_Request2;
use \Carbon\Carbon;

class TravellingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->payment_live = env('OY_INDONESIA_LIVE');
        $this->automatics = $this->payment_live;

        $this->username = config('app.oy_username');
        // $this->app_key = config('app.oy_api_key');

        if($this->payment_live == true){
            $this->payment_production = 'https://partner.oyindonesia.com/api/';
            $this->api_key = env('OY_INDONESIA_APP_KEY_LIVE');
        }else{
            $this->payment_production = 'https://api-stg.oyindonesia.com/api/';
            $this->api_key = env('OY_INDONESIA_APP_KEY');
        }
    }
    public function index_v1()
    {
        $travellings = Travelling::orderBy('created_at','desc')->paginate(5);
        foreach ($travellings as $key => $travelling) {
            $travelling_highlights = TravellingHighlight::where('travelling_id',$travelling->id)->get();
            $travelling_fasilitas = TravellingFasilitas::where('travelling_id',$travelling->id)->get();
            $travellingss[] = [
                'id' => $travelling->id,
                'kategori_paket_id' => $travelling->kategori_paket_id,
                'nama_kategori' => $travelling->kategoriPaket->kategori_paket,
                'nama_travelling' => $travelling->nama_travelling,
                'deskripsi' => $travelling->deskripsi,
                'jumlah_paket' => $travelling->jumlah_paket,
                'meeting_point' => $travelling->meeting_point,
                'location' => $travelling->location,
                'contact_person' => $travelling->contact_person,
                'tanggal_rilis' => $travelling->tanggal_rilis,
                'diskon' => $travelling->diskon,
                'price' => $travelling->price,
                'images' => asset('frontend/assets_new/images/travelling/'.$travelling->images),
                'created_at' => Carbon::parse($travelling->created_at)->isoFormat('LL'),
                'updated_at' => Carbon::parse($travelling->updated_at)->isoFormat('LL'),
                'highlights' => $travelling_highlights,
                'fasilitas' => $travelling_fasilitas,
            ];
        }

        return response()->json([
            'status' => true,
            'data_row' => $travellings->count(),
            'data' => $travellingss
        ],200);
    }

    public function detail($id)
    {
        $travellings = Travelling::find($id);
        if(empty($travellings)){
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        $data = [
            'id' => $travellings->id,
            'kategori_paket_id' => $travellings->id,
            'nama_travelling' => $travellings->nama_travelling,
            'deskripsi' => $travellings->deskripsi,
            'jumlah_paket' => $travellings->jumlah_paket,
            'meeting_point' => $travellings->meeting_point,
            'location' => $travellings->location,
            'contact_person' => $travellings->contact_person,
            'tanggal_rilis' => $travellings->tanggal_rilis,
            'diskon' => $travellings->diskon,
            'price' => $travellings->price,
            'images' => asset('frontend/assets_new/images/travelling/'.$travellings->images),
            'created_at' => Carbon::parse($travellings->created_at)->isoFormat('LLL'),
            'updated_at' => Carbon::parse($travellings->updated_at)->isoFormat('LLL')
        ];
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
    
    public function travel_order(Request $request,$id)
    {
        $rules = [
            'first_name'  => 'required',
            'last_name'  => 'required',
            'alamat'  => 'required',
            'email'  => 'required',
            'phone'  => 'required',
            'tanggal_berangkat'  => 'required',
            'payment_method'  => 'required',
        ];
 
        $messages = [
            // 'images.required'  => 'Upload Gambar wajib diisi.',
            // 'images.max'  => 'Upload Gambar Max 2MB.',
            'first_name.required'   => 'Nama Pertama wajib diisi.',
            'last_name.required'   => 'Nama Terakhir wajib diisi.',
            'alamat.required'   => 'Alamat wajib diisi.',
            'email.required'   => 'Email wajib diisi.',
            'phone.required'   => 'No. Telpon wajib diisi.',
            'tanggal_berangkat.required'   => 'Tanggal berangkat wajib diisi.',
            'payment_method.required'   => 'Metode Pembayaran wajib diisi.',
            // 'deskripsi.required'   => 'Deskripsi wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $data['travelling'] = Travelling::find($id);
            $input['id'] = Carbon::now()->format('Ymd').rand(001,999);
            
            if($request->qty == 0 || $request->qty == null){
                $qty = 1;
            }else{
                $qty = $request->qty + 1;
            }

            $data['order'] = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'phone' => $request->phone,
                'jumlah' => $qty,
                'tanggal_berangkat' => $request->tanggal_berangkat,
                'payment_method' => $request->payment_method,
            ];

            // return $data['order'];
            $input['id'] = Carbon::now()->format('Ymd').rand(001,999);
            if($request->qty >= 1){
                if(empty($request->nama_anggota)){
                    // return redirect()->back();
                    return response()->json([
                        'success' => false,
                        'error' => 'Nama Anggota Wajib Diisi'
                    ]);
                }else{
                    foreach ($request->nama_anggota as $key => $value) {
                        OrderList::create([
                            // 'id' => rand(10000,99999),
                            'order_id' => $input['id'],
                            'pemesan' => $value,
                            'qty' => 1
                        ]);
                    }
                }
            }

            $paymentLink = new HTTP_Request2();
            $paymentLink->setUrl($this->payment_production.'/generate-static-va');
            $paymentLink->setMethod(HTTP_Request2::METHOD_POST);
            $paymentLink->setConfig(array(
                'follow_redirects' => TRUE
            ));
            $paymentLink->setHeader(array(
                'x-oy-username:'.$this->username,
                'x-api-key:'.$this->api_key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ));
            $paymentLink->setBody(json_encode(
                [
                    'partner_user_id' => $input['id'],
                    'bank_code' => $request->payment_method,
                    'amount' => $request->orderTotal,
                    'is_open' => false,
                    'is_single_use' => true,
                    'is_lifetime' => false,
                    'expiration_time' => 10,
                    'username_display' => 'Pesona Plesiran Indonesia',
                    'email' => $request->email,
                    'trx_expiration_time' => 10,
                    'partner_trx_id' => 'TRX-'.rand(10000,99990),
                    'trx_counter' => 1
                ]
            ));

            try {
                $response = $paymentLink->send();
                if ($response->getStatus() == 200) {
                    $dataUrl = json_decode($response->getBody(),true);
                    // $input['id'] = Str::uuid();
                    $input['icon'] = 'fa fa-cube';
                    $input['nama_order'] = $data['travelling']['nama_travelling'];
                    $input['pemesan'] = json_encode([
                        $data['order']
                    ]);
                    $input['bank'] = json_encode(
                        [
                            [
                                'kode_bank' => $dataUrl['bank_code'],
                                // 'nama_bank' => $dataUrl['bank_name'],
                                'nama_penerima' => 'Pesona Plesiran Indonesia',
                                'id_trx' => $dataUrl['id'],
                                'nomor_rekening' => $dataUrl['va_number'],
                            ]
                        ]
                    );
                    $input['qty'] = $qty;
                    $input['price'] = $request->orderTotal;
                    $input['status'] = 1;
                    if(!auth()->user()){
                        $input['user'] = '-';
                    }else{
                        $input['user'] = auth()->user()->id;
                    }
                    $order = Order::create($input);
                    $payment_link_array = array(
                        'id' => Str::uuid()->toString(),
                        'nama_penerima' => $request->first_name.' '.$request->last_name,
                        'total' => $request->orderTotal,
                        'partner_tx_id' => $input['id'],
                        // 'id_trx' => $dataUrl['id'],
                        // 'url' => $dataUrl['url'],
                    );
                    $email_marketing = 'marketing@plesiranindonesia.com';
                    $details = [
                        'title' => 'Konfirmasi Pembayaran',
                        'nama_pembayaran' => $request->first_name.' '.$request->last_name,
                        'nama_paket' => $data['travelling']['nama_travelling'],
                        'invoice' => $input['id'],
                        'email' => $request->email,
                        'total' => $request->orderTotal,
                        'body' => 'Terima kasih telah melakukan pembelian tiket '.$data['travelling']['nama_travelling'].'.'.
                                    ' Silahkan lakukan pembayaran berikut.',
                        'kode_bank' => $dataUrl['bank_code'],
                        'nama_penerima' => 'Pesona Plesiran Indonesia',
                        'nomor_rekening' => $dataUrl['va_number'],
                        'payment_expired' => date("d F Y H:i:s", substr($dataUrl['trx_expiration_time'], 0, 10)),
                        // 'url' => $dataUrl['url']
                    ];
                    Mail::to($details['email'])->send(new Pembayaran($details));
                    if($order){
                        $message_title="Berhasil !";
                        $message_content="Orderan Berhasil";
                        $message_type="success";
                        $message_succes = true;
                    }
    
                    $array_message = array(
                        'success' => $message_succes,
                        'message_title' => $message_title,
                        'message_content' => $message_content,
                        'message_type' => $message_type,
                    );
                    return response()->json([
                        'success' => true,
                        'data' => $dataUrl
                    ]);
                }else{
                    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase(); 
                }
                // return $dataUrl;
            } catch(HTTP_Request2_Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function cek_pembayaran($id)
    {
        $data['order'] = Order::find($id);
        $data['order_list'] = OrderList::select('order_id','pemesan','qty')
                                    ->where('order_id', $data['order']['id'])->get();
        foreach (json_decode($data['order']['pemesan']) as $key => $p) {
            $data['pemesan'] = $p;
        }
        foreach (json_decode($data['order']['bank']) as $key => $bank) {
            $banks = $bank;
            $data['bankss'] = $bank;
        }

        $paymentLink = new HTTP_Request2();
        // $paymentLink->setUrl($this->payment_production.'/payment-checkout/status?partner_tx_id='.$id);
        $paymentLink->setUrl($this->payment_production.'/static-virtual-account/'.$banks->id_trx);
        $paymentLink->setMethod(HTTP_Request2::METHOD_GET);
        $paymentLink->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $paymentLink->setHeader(array(
        'x-oy-username:'.$this->username,
        'x-api-key:'.$this->api_key,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
        ));
        try {
            $response = $paymentLink->send();
            if ($response->getStatus() == 200) {
                $dataPayment = json_decode($response->getBody(),true);
                $data['dataPayment'] = $dataPayment;
                if($dataPayment['va_status'] == 'WAITING_PAYMENT'){
                    $data['status_pembayaran'] = 1;
                    $data['status'] = 'Menunggu Pembayaran';
                }
                elseif($dataPayment['va_status'] == 'COMPLETE'){
                    $data['status_pembayaran'] = 3;
                    $data['status'] = 'Pembayaran Berhasil';
                    $data['order']->update([
                        'status' => $data['status_pembayaran']
                    ]);
                    // $data['transaksi']->update([
                    //     'status' => $data['status_pembayaran']
                    // ]);
                }
                elseif($dataPayment['va_status'] == 'EXPIRED'){
                    $data['status_pembayaran'] = 4;
                    $data['status'] = 'Pembayaran Kadaluwarsa';
                    $data['order']->update([
                        'status' => $data['status_pembayaran']
                    ]);
                }

                // return view('frontend.frontend4.payment_paket',$data);
                // return view('frontend.frontend5.order_payment',$data);
                return response()->json([
                    'success' => true,
                    'data' => $data
                ]);
                
            }
            else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
            }
        } catch (\HTTP_Request2_Exception $th) {
            echo 'Error: ' . $th->getMessage();
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
