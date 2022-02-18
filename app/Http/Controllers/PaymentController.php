<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Cart;
use \Carbon\Carbon;
use Illuminate\Support\Str;
use HTTP_Request2;

class PaymentController extends Controller
{
    public function __construct(){
        $this->username = config('app.oy_username');
        $this->app_key = config('app.oy_api_key');
        $this->whatsapp = ['nomor' => '-', 'message' => 'Hello'];
        $this->payment_production = 'https://partner.oyindonesia.com/api/';
        $this->payment_testing = 'https://api-stg.oyindonesia.com/api/';
    }
    public function payment()
    {
        // //  Initiate curl
        // $url = 'https://partner.oyindonesia.com/api/account-inquiry/invoices';
        // $ch = curl_init();
        // // Will return the response, if false it print the response
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // // Set the url
        // curl_setopt($ch, CURLOPT_URL,$url);
        // // Execute
        // $result=curl_exec($ch);
        // // Closing
        // curl_close($ch);

        // return $result;

        // $username = config('app.oy_username');
        // $api_key = config('app.oy_api_key');

        // require_once 'HTTP/Request2.php';
        //     $request = new HTTP_Request2();
        //     $request->setUrl('https://api-stg.oyindonesia.com/api/remit');
        //     $request->setMethod(HTTP_Request2::METHOD_POST);
        //     $request->setConfig(array(
        //     'follow_redirects' => TRUE
        //     ));
        //     $request->setHeader(array(
        //     'Content-Type' => 'application/json',
        //     'Accept' => 'application/json',
        //     'x-oy-username' => 'businesspesonaplesiranindonesia',
        //     'x-api-key' => '47860502-8fa8-4c73-9f2b-a06cf1cd64fc'
        //     ));
        //     $request->setBody('{\n  "recipient_bank": "008",\n  "recipient_account": "0201245681",\n    "amount": 15000,\n  "note": "Test API Disburse",\n  "partner_trx_id": "OYON0000064",\n  "email": "business.support@oyindonesia.com"\n}');
        // try {
        //     $response = $request->send();
        // if ($response->getStatus() == 200) {
        //     echo $response->getBody();
        // }
        // else {
        //     echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        //     $response->getReasonPhrase();
        // }
        // }
        // catch(HTTP_Request2_Exception $e) {
        //     echo 'Error: ' . $e->getMessage();
        // }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-stg.oyindonesia.com/api/payment-checkout/create-invoice",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            // CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
                'Accept: application/json',
                'x-oy-username:'.$this->username,
                'x-api-key:'.$this->app_key,
                'body: {
                    "partner_tx_id":"partner tx id",
                    "description":"desc invoice",
                    "notes":"notes satu",
                    "sender_name":"Sender Name API",
                    "amount":"50000",
                    "email":"",
                    "phone_number":"",
                    "is_open":"true",
                    "step":"input-amount",
                    "include_admin_fee":false,
                    "list_disabled_payment_methods":"",
                    "list_enabled_banks":"013",
                    "expiration":"2020-07-28 19:15:13",
                    "due_date":"2020-07-28 18:00:00",
                    "partner_user_id":"partner user id", 
                    "full_name" : "Raymond",
                    "is_va_lifetime": false,
                    "attachment": "-",
                    "invoice_items": [
                    {
                        "item":"item name", 
                        "description":"description", 
                        "quantity": 10, 
                        "date_of_purchase":"2020-09-20", 
                        "price_per_item": 33000  
                    }
                    ]
                }'
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        return $response;
    }

    public function balance()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-stg.oyindonesia.com/api/balance",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            // CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
                'Accept: application/json',
                'x-oy-username:'.$this->username,
                'x-api-key:'.$this->app_key,
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        return $response;
    }

    public function checkout1(Request $request)
    {
        $url = $this->payment_testing."payment-checkout/create-v2";
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            'Content-Type: application/json',
            'Accept: application/json',
            'x-oy-username:'.$this->username,
            'x-api-key:'.$this->app_key,
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data1 = '
            {
                "partner_tx_id":"H-49220220101",
                "description":"",
                "notes":"",
                "sender_name":"Rio Anugrah",
                "amount":"1704450",
                "email":"rioanugrah999@gmail.com",
                "phone_number":"082233684670",
                "is_open":false,
                "step":"input-amount",
                "include_admin_fee":true,
                "list_disabled_payment_methods":"",
                "list_enabled_banks":"",
                "expiration":"'.Carbon::now()->addHour().'",
                "due_date":"'.Carbon::now().'",
                "va_display_name":"Display Name on VA",
            }';
        // $data1 = '
        //     {
        //         "partner_tx_id":"'.$request->kode_booking.'",
        //         "description":"",
        //         "notes":"",
        //         "sender_name":"'.$request->firstname_booking." ".$request->lastname_booking.'",
        //         "amount":"'.$request->amount.'",
        //         "email":"'.$request->email_booking.'",
        //         "phone_number":"'.$request->phone_booking.'",
        //         "is_open":false,
        //         "step":"input-amount",
        //         "include_admin_fee":true,
        //         "list_disabled_payment_methods":"",
        //         "list_enabled_banks":"",
        //         "expiration":"'.Carbon::now()->addHour().'",
        //         "due_date":"'.Carbon::now().'",
        //         "va_display_name":"Display Name on VA",
        //     }';
        // $data1 = "";

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data1);

        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        // return $resp->getBody();
        return $resp;

        // return $request->all();

        // return response()->json($resp->message);
        // var_dump($resp);

        // dd($url);

        
    }

    public function checkout(Request $request)
    {
        // require_once 'HTTP/Request2.php';
        // return $request->all();

        $input = $request->all();

        $request = new HTTP_Request2();
        $request->setUrl('https://api-stg.oyindonesia.com/api/payment-checkout/create-v2');
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        'Content-Type' => 'application/json',
        'Accept: application/json',
        'x-oy-username' => $this->username,
        'x-api-key' => $this->app_key
        ));
        $data1 = '
            {
                "partner_tx_id":"'.$input['kode_booking'].'",
                "notes":"",
                "sender_name":"'.$input['firstname_booking']." ".$input['lastname_booking'].'",
                "amount":"'.$input['amount'].'",
                "email":"'.$input['email_booking'].'",
                "phone_number":"'.$input['phone_booking'].'",
                "is_open":"false",
                "step":"input-amount",
                "include_admin_fee":true,
                "list_disabled_payment_methods":"",
                "list_enabled_banks":"",
                "full_name" : "'.$input['firstname_booking']." ".$input['lastname_booking'].'",
                "is_va_lifetime": false,
                "expiration":"'.Carbon::now()->addHour(2).'",
                "due_date":"'.Carbon::now().'",
                "va_display_name":"Display Name on VA"
            }';
        
        $request->setBody($data1);
        try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
            // if()
            $r = $response->getBody();
            // return $this->filter($r);
            echo $response->getBody();
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getSaldo()
    {
        $request = new HTTP_Request2();
        $request->setUrl($this->payment_testing.'balance');
        $request->setMethod(HTTP_Request2::METHOD_GET);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        'x-oy-username' => $this->username,
        'x-api-key' => $this->app_key,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
        ));
        try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
            echo $response->getBody();
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(HTTP_Request2_Exception $e) {
        echo 'Error: ' . $e->getMessage();
        }
    }

    public function createInvoice(Request $request)
    {
        $production = false;
        $linkVA = 'generate-static-va';

        $input = $request->all();
        $id_random = rand(1,9999);

        $request = new HTTP_Request2();
        if($production == true){
            $request->setUrl($this->payment_production.'generate-static-va');
        }else{
            $request->setUrl($this->payment_testing.'generate-static-va');
        }
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        'Content-Type' => 'application/json',
        'Accept: application/json',
        'x-oy-username' => $this->username,
        'x-api-key' => $this->app_key
        ));
        // $data1 = '
        //     {
        //         "partner_tx_id":"'.$input['kode_booking'].'",
        //         "description":"",
        //         "notes":"'.$input['order_total'].'",
        //         "sender_name":"'.$input['firstname_booking']." ".$input['lastname_booking'].'",
        //         "amount":"'.$input['order_total'].'",
        //         "email":"'.$input['email_booking'].'",
        //         "phone_number":"'.$input['phone_booking'].'",
        //         "is_open":"false",
        //         "step":"input-amount",
        //         "include_admin_fee":true,
        //         "list_disabled_payment_methods":"",
        //         "list_enabled_banks":"",
        //         "full_name" : "'.$input['firstname_booking']." ".$input['lastname_booking'].'",
        //         "is_va_lifetime": false,
        //         "expiration":"'.Carbon::now()->addHour(2).'",
        //         "due_date":"'.Carbon::now().'",
        //         "partner_user_id":"'.auth()->user()->id_unique.'", 
        //         "invoice_items": [
        //             {
        //               "item":"'.$input['description'].'", 
        //               "description":"", 
        //               "quantity": '.$input['qty'].', 
        //               "date_of_purchase":"'.Carbon::parse($input['date_purchase'])->format('Y-m-d').'", 
        //               "price_per_item": '.$input['price'].'  
        //             },
        //             {
        //               "item":"PPn 10%", 
        //               "description":"", 
        //               "quantity": "1", 
        //               "date_of_purchase":"'.Carbon::parse($input['date_purchase'])->format('Y-m-d').'", 
        //               "price_per_item": '.$input['ppn'].'  
        //             }
        //         ]
        //     }';

        // $data1[] = [
        //     "partner_tx_id"=> $input['kode_booking'],
        //     "description"=>"",
        //     "notes"=> "",
        //     "sender_name"=> $input['firstname_booking']." ".$input['lastname_booking'],
        //     "amount"=>$input['order_total'],
        //     "email"=>$input['email_booking'],
        //     "phone_number"=>$input['phone_booking'],
        //     "is_open"=>false,
        //     "step"=>"input-amount",
        //     "include_admin_fee"=>true,
        //     "list_disabled_payment_methods"=>"",
        //     "list_enabled_banks"=>"",
        //     "full_name" => $input['firstname_booking']." ".$input['lastname_booking'],
        //     "is_va_lifetime"=> false,
        //     "expiration"=>Carbon::now()->addHour(2),
        //     "due_date"=>Carbon::now(),
        //     "partner_user_id"=>auth()->user()->id_unique, 
        // ];

        // $data1[] = [
        //     "partner_user_id"=>auth()->user()->id_unique, 
        //     "bank_code"=>"002",
        //     "amount"=>$input['order_total'],
        //     "is_open"=>false,
        //     "is_single_use" => false,
        //     "is_lifetime" => false,
        //     "expiration_time"=>Carbon::now()->addHour(2),
        //     "username_display" => "va name",
        //     "email"=>$input['email_booking'],
        //     "trx_expiration_time" => "5",
        //     "partner_tx_id"=> $input['kode_booking'],
        //     "trx_counter" => "1"
        // ];

        $data[] = [
            "partner_user_id"=>auth()->user()->id_unique, 
            "bank_code"=>"002",
            "amount"=>$input['order_total'],
            "is_open"=>false,
            "is_single_use" => false,
            "is_lifetime" => false,
            "expiration_time"=>5,
            "username_display" => "va name",
            "email"=>$input['email_booking'],
            "trx_expiration_time" => 5,
            "partner_tx_id"=> $input['kode_booking'],
            "trx_counter" => 1
        ];

        // $data1 = json_encode($data);
        // dd($data1);
        $request->setBody($data1);
        // $request->setBody('"{\n\"partner_user_id\":\"5120010121\",\n\"bank_code\": \"002\",\n\"amount\": 50000,\n\"is_open\": true,\n\"is_single_use\" : false,\n\"is_lifetime\": false,\n\"expiration_time\": 5,\n\"username_display\": \"va name\",\n\"email\": \"email@mail.com\",\n\"trx_expiration_time\": 5,\n\"partner_trx_id\": \"TRX0001\",\n\"trx_counter\" : 1\n}"');
        try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
            // if()
            $r['data'] = json_decode($response->getBody(),true);
            $r['whatsapp'] = $this->whatsapp;
            $r['input'] = $input;

            echo $r['data'];

            if($r['data']['status'] == true){
                // $transaksi = Transaksi::firstOrCreate(['partner_tx_id' => $input['kode_booking']],[
                //     'id' => Str::uuid()->toString(),
                //     'nama_penerima' => $input['firstname_booking']." ".$input['lastname_booking'],
                //     'total' => $input['order_total'],
                //     'created_at' => Carbon::parse($input['date_purchase']),
                //     'updated_at' => Carbon::parse($input['date_purchase'])
                // ]);
            }else{
                $r['url'] = $this->payment_testing.'payment-checkout/'.$input['kode_booking'];
            }
            // return $this->filter($r);
            // $transaksi = Transaksi::firstOrCreate(['partner_tx_id' => $input['kode_booking']],[
            //     'id' => Str::uuid()->toString(),
            //     'nama_penerima' => $input['firstname_booking']." ".$input['lastname_booking'],
            //     'total' => $input['order_total'],
            //     'created_at' => Carbon::parse($input['date_purchase']),
            //     'updated_at' => Carbon::parse($input['date_purchase'])
            // ]);
            // echo $response->getBody();

            // $c = json_decode($r['data'],true);
            // dd($c['message']);
            // return redirect($r['data']['url']);
            // return $r;

            // return view('frontend.frontend4.confirmation',$r);
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function checkout2(Request $request)
    {
        $data['whatsapp'] = $this->whatsapp;
        // $data['message'] = [
        //     'status' => true,
        //     'title' => 'PAYMENT CONFIRMED',
        //     'message' => 'Thank you, your payment has been successful and your booking is now confirmed.A confirmation
        //     email has been sent to info@travele.com.'
        // ];
        $input = $request->all();
        // dd($input);
        return view('frontend.frontend2.confirmation',$data,$input)->with([
            'title' => 'PAYMENT CONFIRMED',
            'message' => 'Thank you, your payment has been successful and your booking is now confirmed.A confirmation email has been sent to info@travele.com.'
        ]);
    }

    public function cekInvoice()
    {
        # code...
    }
}
