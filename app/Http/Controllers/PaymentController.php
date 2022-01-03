<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;

class PaymentController extends Controller
{
    public function __construct(){
        $this->username = config('app.oy_username');
        $this->app_key = config('app.oy_api_key');
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
        
    }
}
