<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\Travelling;
use \App\Models\TravellingFasilitas;
use \App\Models\TravellingHighlight;
use \App\Models\Order;
use \App\Models\OrderList;
use App\Mail\Pembayaran;
use App\Mail\InvoiceTravelling;
use DataTables;
use Validator;
use DB;
use File;
use \Carbon\Carbon;

use Mail;
use HTTP_Request2;

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

    public function f_index()
    {
        $data['travellings'] = Travelling::orderBy('tanggal_rilis','desc')->paginate(10);
        // foreach ($data['travellings'] as $key => $value) {
        //     $datas[] = $value->deskripsi;
        // }
        // return json_decode(json_encode($datas['highlight']));
        // return json_encode($data['travellings'] );
        // return json_decode($travellingss->deskripsi->fasilitas,true);
        return view('frontend.frontend5.travelling.index',$data);
    }

    public function b_index(Request $request)
    {
        // dd($data = Travelling::all());
        if ($request->ajax()) {
            $data = Travelling::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kategori_paket_id', function($row){
                        return $row->kategoriPaket->kategori_paket;
                    })
                    ->addColumn('images', function($row){
                        return '<img src='.asset('frontend/assets_new/images/travelling/'.$row->images).' width="150">';
                    })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,2,",",".");
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href='.route('paket.list',['id' => $row->id]).' class="btn btn-secondary btn-sm" title="Paket List">
                                    <i class="fas fa-list"></i> Paket List
                                </a>
                                <button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action','images'])
                    ->make(true);
        }
        return view('backend.travelling.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_travelling'  => 'required',
            'kategori_paket_id'  => 'required',
            'tanggal_rilis'  => 'required',
            'price'  => 'required',
            'diskon'  => 'required',
            'images'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'nama_travelling.required'   => 'Nama Travelling wajib diisi.',
            'kategori_paket_id.required'   => 'Kategori wajib diisi.',
            'tanggal_rilis.required'   => 'Tanggal Rilis wajib diisi.',
            'price.required'   => 'Harga wajib diisi.',
            'diskon.required'   => 'Diskon wajib diisi.',
            'images.required'  => 'Upload Gambar wajib diisi.',
            'images.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->nama_travelling);
            // $input['deskripsi'] = json_encode($request['outer-deskripsi']);
            // $input['location'] = json_encode($request['outer-location']);
           foreach ($request['outer-highlight'][0] as $key => $od) {
                foreach ($od as $key => $outer_d) {
                    // dd($outer_d);
                    DB::table('travelling_highlight')->insert([
                        'travelling_id' => $input['id'],
                        'nama_highlight' => $outer_d['nama_highlight'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            // dd($od);
           }
           foreach ($request['outer-fasilitas'][0] as $key => $of) {
                foreach ($of as $key => $outer_f) {
                    // dd($outer_f['icon']);
                    DB::table('travelling_fasilitas')->insert([
                        'travelling_id' => $input['id'],
                        'icon' => $outer_f['icon'],
                        'nama_fasilitas' => $outer_f['nama_fasilitas'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            // dd($of);
           }
            $image = $request->file('images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['images'] = time().'.webp';
            $input['location'] = $request->nama_lokasi;
            // dd($request->input());
            $img->save(public_path('frontend/assets_new/images/travelling/').$input['images']);

            $travelling = Travelling::create($input);
            if($travelling){
                $message_title="Berhasil !";
                $message_content="Travelling ".$input['nama_travelling']." Berhasil Disimpan";
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
        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
        // dd($request->input());
    }

    public function f_detail_order($id)
    {
        $data['travelling'] = Travelling::find($id);
        return view('frontend.frontend5.travelling.order',$data);
    }

    public function f_cari_travelling(Request $request)
    {
        $data['travellings'] = Travelling::where('nama_travelling', 'like', '%'.$request->cari_destinasi.'%')
                                        ->orWhere('jumlah_paket', 'like', '%'.$request->jumlah_pax.'%')
                                        ->paginate(10);
        return view('frontend.frontend5.travelling.index',$data);
    }

    public function buy_order(Request $request,$id)
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
            if($request->qty >= 1){
                if(empty($request->nama_anggota)){
                    return redirect()->back();
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

            //Payment
            $paymentLink = new HTTP_Request2();
                // $paymentLink->setUrl('https://partner.oyindonesia.com/api/payment-checkout/create-v2');
                // $paymentLink->setUrl($this->payment_production.'/payment-checkout/create-v2');
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
                $input['icon'] = 'fa fa-cube';
                $input['nama_order'] = $data['travelling']['nama_travelling'];
                $input['pemesan'] = json_encode([
                    $data['order']
                ]);
                // $input['pemesan'] = $data['order'];
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
                // echo json_encode($details);
                // Mail::to($email_marketing)->send(new Pembayaran($details));
                
                Mail::to($details['email'])->send(new Pembayaran($details));

                // Transaksi::firstOrCreate($payment_link_array);
                
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

                return redirect(route('frontend.travelling.payment',['id' => $input['id']]));

                }
                else{
                    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                    $response->getReasonPhrase(); 
                }
            } catch(HTTP_Request2_Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    public function order_payment($id)
    {
        // $data['whatsapp'] = $this->whatsapp;
        $data['order'] = Order::find($id);
        // $data['transaksi'] = Transaksi::where('partner_tx_id',$id)->first();
        $data['order_list'] = OrderList::select('order_id','pemesan','qty')
                                    ->where('order_id', $data['order']['id'])->get();
        foreach (json_decode($data['order']['pemesan']) as $key => $p) {
            // dd($p);
            $data['pemesan'] = $p;
            // dd($data['pemesan']);
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
            $name = json_decode($data['order']['pemesan']);
            $bank = json_decode($data['order']['bank']);
            $details = [
                'title' => 'Invoice'.' - '.$data['order']['id'],
                'invoice' => $data['order']['id'],
                'nama_order' => $data['order']['nama_order'],
                'nama_pembayaran' => $name[0]->first_name.' '.$name[0]->last_name,
                'alamat' =>  $name[0]->alamat,
                'qty' =>  $data['order']['qty'],
                'phone' =>  $name[0]->phone,
                'email' =>  $name[0]->email,
                'total' =>  $data['order']['price'],
                'status' =>  $data['order']['status'],
                'bank' =>  $bank[0]->kode_bank,
                'nama_penerima' =>  $bank[0]->nama_penerima,
                'created_at' =>  $data['order']['created_at'],
                'updated_at' =>  $data['order']['updated_at'],
                'order_details' => $data['order_list']
                // 'body' => 'Terima kasih telah melakukan pembelian tiket '.$data['travelling']['nama_travelling'].'.'.
                //             ' Silahkan lakukan pembayaran berikut.',
                // 'kode_bank' => $dataUrl['bank_code'],
                // 'nama_penerima' => 'Pesona Plesiran Indonesia',
                // 'nomor_rekening' => $dataUrl['va_number'],
                // 'payment_expired' => date("d F Y H:i:s", substr($dataUrl['trx_expiration_time'], 0, 10)),
                // 'url' => $dataUrl['url']
            ];
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
                    Mail::to($details['email'])->send(new InvoiceTravelling($details));
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
                return view('frontend.frontend5.order_payment',$data);
                
            }
            else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
            }
        } catch (\HTTP_Request2_Exception $th) {
            echo 'Error: ' . $th->getMessage();
        }
        
        // return view('frontend.frontend4.payment_paket',$data);
        return view('frontend.frontend5.order_payment',$data);
    }
}