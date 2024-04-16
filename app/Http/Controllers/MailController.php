<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Payment\TripayController;
use App\Mail\Invoice;
use \Carbon\Carbon;
use Mail;

class MailController extends Controller
{
    function __construct(
        TripayController $tripay_payment
    ){
        $this->tripay_payment = $tripay_payment;
    }
    public function sendMail(
        $status,$transaction_code,$amount,
        $bill_name,$bill_email,$bill_phone,$bill_address,
        $qty,$reference,$ticket
    )
    {
        // $data = $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email'
        // ]);
        $tripay = $this->tripay_payment;
        $data['detail_payment'] = json_decode($tripay->detailTransaction($reference));

        $email = 'rioanugrah999@gmail.com';

        $body = [
            'date' => \Carbon\Carbon::now()->format('d-m-Y H:i'),
            'status' => $status,
            'transaction_code' => $transaction_code,
            'amount' => $amount,
            'bill_name' => $bill_name,
            'bill_email' => $bill_email,
            'bill_phone' => $bill_phone,
            'bill_address' => $bill_address,
            'qty' => $qty,
            'barcode' => $ticket,
            'items' => $data['detail_payment']->data->order_items
        ];

        Mail::to($email)->send(new Invoice($body));
        // return back()->with('status','Mail sent successfully');
        // return 'Mail sent successfully';
    }
    public function sendMail2()
    {
        // $data = $request->validate([
        //     'name'=>'required',
        //     'email'=>'required|email'
        // ]);
        $tripay = $this->tripay_payment;
        $data['detail_payment'] = json_decode($tripay->detailTransaction('DEV-T30765151938ZAUYE'));
        // dd($data);

        $email = 'rioanugrah999@gmail.com';

        $body = [
            'date' => \Carbon\Carbon::now()->format('d-m-Y H:i'),
            'status' => 'Paid',
            'transaction_code' => '1285292123',
            'amount' => '100000',
            'bill_name' => 'Rio',
            'bill_email' => 'rio',
            'bill_phone' => '0812',
            'bill_address' => 'asdafqwda',
            'qty' => 1,
            'barcode' => $data['detail_payment']->data->merchant_ref,
            'items' => $data['detail_payment']->data->order_items
        ];
        // dd($body);
        return view('backend_new_2023.emails.invoiceTiketBromo',compact('body'));
        // Mail::to($email)->send(new Invoice($body));
        // return back()->with('status','Mail sent successfully');
        return 'Mail sent successfully';
    }
}
