<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
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

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://api-stg.oyindonesia.com/api/account-inquiry/invoices?offset=0&limit=10&status=000",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     // CURLOPT_TIMEOUT => 30000,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "GET",
        //     CURLOPT_HTTPHEADER => array(
        //         // Set Here Your Requesred Headers
        //         'Content-Type: application/json',
        //         'Accept: application/json',
        //         'x-oy-username:myuser: businesspesonaplesiranindonesia',
        //         'x-api-key:47860502-8fa8-4c73-9f2b-a06cf1cd64fc',
        //     ),
        // ));
        // $response = curl_exec($curl);
        // $err = curl_error($curl);
        // curl_close($curl);

        // return $response;

        require_once 'HTTP/Request2.php';
            $request = new HTTP_Request2();
            $request->setUrl('https://api-stg.oyindonesia.com/api/remit');
            $request->setMethod(HTTP_Request2::METHOD_POST);
            $request->setConfig(array(
            'follow_redirects' => TRUE
            ));
            $request->setHeader(array(
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'x-oy-username' => 'businesspesonaplesiranindonesia',
            'x-api-key' => '47860502-8fa8-4c73-9f2b-a06cf1cd64fc'
            ));
            $request->setBody('{\n  "recipient_bank": "008",\n  "recipient_account": "0201245681",\n    "amount": 15000,\n  "note": "Test API Disburse",\n  "partner_trx_id": "OYON0000064",\n  "email": "business.support@oyindonesia.com"\n}');
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
}
