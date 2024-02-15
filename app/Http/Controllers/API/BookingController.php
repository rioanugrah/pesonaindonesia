<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;

use \Carbon\Carbon;
use DNS1D;

class BookingController extends Controller
{
    function __construct(
        Transactions $transaction
    ){
        $this->transaction = $transaction;
    }

    public function booking()
    {
        $booking = $this->transaction->with('verifikasi_tiket')
                                            ->where('user',auth()->user()->generate)
                                            // ->where('status','Unpaid')
                                            ->orderBy('created_at','desc')
                                            ->get();
        if ($booking->isEmpty()) {
            return [
                'success' => false,
                'message_title' => 'Empty',
                'message_content' => 'Data Belum Tersedia'
            ];
        }
        foreach ($booking as $key => $book) {
            $data[] = [
                'id' => $book->id,
                'transaction_code' => $book->transaction_code,
                'transaction_unit' => $book->transaction_unit,
                'transaction_order' => json_decode($book->transaction_order),
                'transaction_qty' => $book->transaction_qty,
                'transaction_price' => $book->transaction_price,
                'user' => $book->user,
                'status' => $book->status,
                'verifikasi_tiket' => $book->verifikasi_tiket
                // 'verifikasi_tiket' => [
                //     'id' => $book->verifikasi_tiket,
                //     // 'transaction_id' => $book->verifikasi_tiket->transaction_id,
                //     // 'kode_tiket' => $book->verifikasi_tiket->kode_tiket,
                //     // 'tanggal_booking' => Carbon::create($book->verifikasi_tiket->tanggal_booking)->format('d-m-Y H:i'),
                //     // 'nama_tiket' => $book->verifikasi_tiket->nama_tiket,
                //     // 'nama_order' => $book->verifikasi_tiket->nama_order,
                //     // 'address' => $book->verifikasi_tiket->address,
                //     // 'email' => $book->verifikasi_tiket->email,
                //     // 'phone' => $book->verifikasi_tiket->phone,
                //     // 'qty' => $book->verifikasi_tiket->qty,
                //     // 'price' => $book->verifikasi_tiket->price,
                //     // 'status' => $book->verifikasi_tiket->status,
                // ],
            ];
        }
        return [
            'success' => true,
            'data' => $data
        ];
    }

    public function booking_detail_payment($id)
    {
        $booking = $this->transaction->find($id);
        if (empty($booking)) {
            return [
                'success' => false,
                'message_title' => 'Empty',
                'message_content' => 'Data Belum Tersedia'
            ];
        }
        $transaction_order = json_decode($booking->transaction_order);
        return [
            'success' => true,
            'data' => [
                'id' => $booking->id,
                'transaction_code' => $booking->transaction_code,
                'transaction_unit' => $booking->transaction_unit,
                'first_name' => $transaction_order->first_name,
                'last_name' => $transaction_order->last_name,
                'phone' => $transaction_order->phone,
                'transaction_qty' => $booking->transaction_qty,
                'transaction_price' => $booking->transaction_price,
                'user' => $booking->user,
                'status' => $booking->status,
                'barcode' => DNS1D::getBarcodeSVG('4445645656', 'PHARMA2T',3,33)
            ]
        ];
    }

    public function booking_process()
    {
        $booking_process = $this->transaction->with('verifikasi_tiket')
                                            ->where('user',auth()->user()->generate)
                                            ->where('status','Unpaid')
                                            ->orderBy('created_at','desc')
                                            ->get();
        if ($booking_process->isEmpty()) {
            return [
                'success' => false,
                'message_title' => 'Empty',
                'message_content' => 'Data Belum Tersedia'
            ];
        }
        return [
            'success' => true,
            'data' => $booking_process
        ];
    }

    public function booking_complete()
    {
        $booking_process = $this->transaction->with('verifikasi_tiket')
                                            ->where('user',auth()->user()->generate)
                                            ->where('status','Paid')
                                            ->orderBy('created_at','desc')
                                            ->get();
        if ($booking_process->isEmpty()) {
            return [
                'success' => false,
                'message_title' => 'Empty',
                'message_content' => 'Data Belum Tersedia'
            ];
        }
        return [
            'success' => true,
            'data' => $booking_process
        ];
    }
}
