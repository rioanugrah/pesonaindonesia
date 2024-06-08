<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\TripayController;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class PaymentGatewayTripayController extends Controller
{
    function __construct(
        TripayController $tripay_payment
    ){
        $this->tripay_payment = $tripay_payment;
    }

    public function payment_method()
    {
        $tripay = $this->tripay_payment;
        $channels = json_decode($tripay->getPayment())->data;
        return response()->json([
            'success' => true,
            'data' => $channels
        ]);
    }
}
