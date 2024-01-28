<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketList;
use App\Models\PaketOrder;
use App\Models\Transaksi;
use App\Models\PaketOrderList;
use App\Events\EventRegisterEvent;

use App\Mail\Pembayaran;
use \Carbon\Carbon;

use Mail;
use DNS1D;
use Validator;
use DB;
use HTTP_Request2;

class FrontendNewController extends Controller
{
    public function __construct()
    {
        $this->menu = [
            [ 'name' => 'Home', 'active' => true ,'link' => route('frontend') ],
            [ 'name' => 'Tour', 'active' => false ,'link' => 'javascript:void()' ],
            [ 'name' => 'Tracking Order', 'active' => false ,'link' => 'javascript:void()' ],
        ];
        $this->payment_live = env('OY_INDONESIA_LIVE');
        $this->automatics = $this->payment_live;
        $this->username = config('app.oy_username');
        if($this->payment_live == true){
            $this->payment_production = 'https://partner.oyindonesia.com/api/';
            $this->api_key = env('OY_INDONESIA_APP_KEY_LIVE');
        }else{
            $this->payment_production = 'https://api-stg.oyindonesia.com/api/';
            $this->api_key = env('OY_INDONESIA_APP_KEY');
        }
    }

    // public function tour()
    // {
    //     $data['menus'] = $this->menu;
    //     $data['paket_trips'] = PaketList::where('kategori_paket_id',2)->where('status','!=',0)
    //                                     ->orderBy('created_at','desc')->paginate(9);
    //     return view('frontend.frontend_2022.tour',$data);
    // }

    // public function tour_detail($id,$paket_id)
    // {
    //     $data['menus'] = $this->menu;
    //     $data['payments'] = [
    //         ['kode_bank' => '014','nama_bank' => 'BCA','fee' => '4500','time' => '24 Jam'],
    //         ['kode_bank' => '008','nama_bank' => 'Mandiri','fee' => '4000','time' => '24 Jam'],
    //         ['kode_bank' => '002','nama_bank' => 'BRI','fee' => '4000','time' => '24 Jam'],
    //         ['kode_bank' => '009','nama_bank' => 'BNI','fee' => '4000','time' => '24 Jam'],
    //     ];
    //     $data['trip_detail'] = PaketList::where('id',$id)->where('paket_id',$paket_id)->first();
    //     return view('frontend.frontend_2022.tour_detail',$data);
    // }

    public function paket_list_order_payment($id)
    {
        // $data['whatsapp'] = $this->whatsapp;
        $data['paket'] = PaketOrder::find($id);
        $data['transaksi'] = Transaksi::where('partner_tx_id',$id)->first();
        $data['anggotas'] = PaketOrderList::select('order_paket_id','pemesan','qty')
                                    ->where('order_paket_id', $data['paket']['id'])->get();
        foreach (json_decode($data['paket']['pemesan']) as $key => $p) {
            // dd($p);
            $data['pemesan'] = $p;
            // dd($data['pemesan']);
        }
        $data['status_live'] = $this->automatics;

        if($this->automatics == true){
            //Payment
            $paymentLink = new HTTP_Request2();
            $paymentLink->setUrl($this->payment_production.'/payment-checkout/status?partner_tx_id='.$id);
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
                    // $dataPayment = $response->getBody();
                    // return $dataPayment;
                    $dataPayment = json_decode($response->getBody(),true);
                    // return $dataPayment['data']['status'];
    
                    if($dataPayment['data']['status'] == 'created'){
                        $data['status_pembayaran'] = 1;
                        $data['status'] = 'Menunggu Pembayaran';
                    }
                    elseif($dataPayment['data']['status'] == 'complete'){
                        $data['status_pembayaran'] = 3;
                        $data['status'] = 'Pembayaran Berhasil';
                        $data['paket']->update([
                            'status' => $data['status_pembayaran']
                        ]);
                        $data['transaksi']->update([
                            'status' => $data['status_pembayaran']
                        ]);
                    }
    
                    return view('frontend.frontend4.payment_paket',$data);
                    
                    // if($data['paket']['status'] == 1){
                    //     $data['status'] = 'Menunggu Pembayaran';
                    // }
                    // elseif($data['paket']['status'] == 2){
                    //     $data['status'] = 'Sedang Diproses';
                    // }
                    // elseif($data['paket']['status'] == 3){
                    //     $data['status'] = 'Pembayaran Berhasil';
                    // }else{
                    //     $data['status'] = 'Pembayaran Ditolak';
                    // }
                    
                    // return view('frontend.frontend4.payment_paket',$data);
                }
                else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
                }
            } catch (\HTTP_Request2_Exception $th) {
                echo 'Error: ' . $th->getMessage();
            }
        }
        else{
            $paymentLink = new HTTP_Request2();
            $paymentLink->setUrl($this->payment_production.'/payment-checkout/status?partner_tx_id='.$id);
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
                    // $dataPayment = $response->getBody();
                    // return $dataPayment;
                    $dataPayment = json_decode($response->getBody(),true);
                    // return $dataPayment['data']['status'];
    
                    if($dataPayment['data']['status'] == 'created'){
                        $data['status_pembayaran'] = 1;
                        $data['status'] = 'Menunggu Pembayaran';
                    }
                    elseif($dataPayment['data']['status'] == 'waiting_payment'){
                        $data['status_pembayaran'] = 1;
                        $data['status'] = 'Menunggu Pembayaran';
                    }
                    elseif($dataPayment['data']['status'] == 'complete'){
                        $data['status_pembayaran'] = 3;
                        $data['status'] = 'Pembayaran Berhasil';
                        $data['paket']->update([
                            'status' => $data['status_pembayaran']
                        ]);
                        $data['transaksi']->update([
                            'status' => $data['status_pembayaran']
                        ]);
                    }
    
                    return view('frontend.frontend4.payment_paket',$data);
                    
                }
                else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
                }
            } catch (\HTTP_Request2_Exception $th) {
                echo 'Error: ' . $th->getMessage();
            }
            
            return view('frontend.frontend4.payment_paket',$data);
        }
    }
}
