<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NotificationNotif;
use App\Events\NotificationEvent;
use App\Mail\TestingMail;
use App\User;
use Mail;
use PDF;
use Notification;
use \Carbon\Carbon;

class TestingController extends Controller
{
    public function save(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }

    public function send_notif(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        $SERVER_API_KEY = env('FIREBASE_SERVER_KEY');
        
        // dd($firebaseToken);
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        return($response);
    }

    public function testInvoice()
    {
        $pdf = PDF::loadview('emails.testingPDF');
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function sendNotif($code)
    {
        // $user = User::where('role','!=',4)->get();
        // $notif = [
        //     'id' => 1,
        //     'url' => 'http://localhost:8000',
        //     'title' => 'Notif Baru',
        //     'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
        //     'color_icon' => 'warning',
        //     'icon' => 'uil-clipboard-alt',
        //     'publish' => Carbon::now(),
        // ];
        // // dd($notif);
        // // $user = User::find(auth()->user()->id);
        // Notification::send($user, new NotificationNotif($notif));
        // // Notification::send($user, new NotificationNotif('1','http://localhost:8000','Notif Baru','data masuk','primary','uil-angle-down','21'));
        // return event(new NotificationEvent('1','http://localhost:8000','Notif Baru','data masuk','primary','uil-angle-down','21'));

        $email = 'rioanugrah999@gmail.com';
        $invoice = \App\Models\Transactions::where('transaction_code',$code)->first();
        // $detail['invoice'] = $invoice;
        // $maildata = [
        //     'title' => 'Laravel Mail Sending Example with Markdown',
        //     'url' => 'https://www.positronx.io'
        // ];
        // $maildata = [
        //     'invoice' => $invoice
        // ];

        Mail::to($email)->send(new TestingMail($invoice));
   
        dd("Mail has been sent successfully");
    }

    public function coba()
    {
        return auth()->user()->assignRole('Administrator');
    }
}

