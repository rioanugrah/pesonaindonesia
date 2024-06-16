<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\TripayController;
use Illuminate\Http\Request;

use App\Models\Transactions;

class PaymentController extends Controller
{
    function __construct(
        TripayController $tripay_payment,
        Transactions $transaction
    ){
        if (env('MIDTRANS_IS_PRODUCTION') == true) {
            $this->midtrans_client_key = env('MIDTRANS_CLIENT_KEY_LIVE');
            $this->midtrans_server_key = env('MIDTRANS_SERVER_KEY_LIVE');
            $this->url_payment = 'https://app.midtrans.com/snap/snap.js';
        }else{
            $this->midtrans_client_key = env('MIDTRANS_CLIENT_KEY_DEMO');
            $this->midtrans_server_key = env('MIDTRANS_SERVER_KEY_DEMO');
            $this->url_payment = 'https://app.sandbox.midtrans.com/snap/snap.js';
        }

        $this->tripay_payment = $tripay_payment;
        $this->transaction = $transaction;
    }

    public function payment_detail($id)
    {
        $dataTransaction = $this->transaction->find($id);
        // dd($dataTransaction);
        if (empty($dataTransaction)) {
            return response()->json([
                'success' => false,
                'message_title' => 'Payment Not Found',
            ]);
        }

        $payment = $this->tripay_payment->detailTransaction($dataTransaction->transaction_reference);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $dataTransaction->id,
                'transaction_code' => $dataTransaction->transaction_code,
                'transaction_reference' => $dataTransaction->transaction_reference,
                'transaction_unit' => $dataTransaction->transaction_unit,
                'transaction_qty' => $dataTransaction->transaction_qty,
                'transaction_price' => $dataTransaction->transaction_price,
                'transaction_status' => $dataTransaction->status,
                'payment_method' => json_decode($payment)->data->payment_method,
                'payment_code' => json_decode($payment)->data->payment_method != 'QRISC' || 'QRIS2' ? json_decode($payment)->data->pay_code : null,
                'qr_url' => json_decode($payment)->data->payment_method == 'QRISC' || json_decode($payment)->data->payment_method == 'QRIS2' ? json_decode($payment)->data->qr_url : null,
                'instruction_payment' => json_decode($payment)->data
            ]
        ]);
    }
}
