<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Payment\TripayController;
use App\User;
use App\Models\Bromo;
use App\Models\Transactions;
use App\Models\TransactionList;
use App\Models\VerifikasiTiket;
use App\Models\VerifikasiTiketList;
use \Carbon\Carbon;
use App\Notifications\NotificationNotif;

use App\Mail\Pembayaran;
use App\Mail\InvoiceTravelling;
use DataTables;
use Notification;
use Validator;
use DB;
use Mail;
class TicketBromoController extends Controller
{
    function __construct(
        TripayController $tripay_payment,
        User $user,
        Bromo $bromo,
        Transactions $transactions,
        VerifikasiTiket $verifikasi_tiket,
        VerifikasiTiketList $verifikasi_tiket_list
    ){
        $this->tripay_payment = $tripay_payment;
        $this->user = $user;
        $this->bromo = $bromo;
        $this->transactions = $transactions;
        $this->verifikasi_tiket = $verifikasi_tiket;
        $this->verifikasi_tiket_list = $verifikasi_tiket_list;
    }

    public function index(Request $request)
    {
        // dd($data);
        // $data_transactions = $this->transactions->with('verifikasi_tiket')->where('user',auth()->user()->generate)->get();
        //     foreach ($data_transactions as $key => $data_transaction) {
        //         $explode_transaction_code_bromo = explode('-',$data_transaction->transaction_code);
        //         if ($explode_transaction_code_bromo[1] == 'BRMO') {
        //             $data[] = [
        //                 'id' => $data_transaction->id,
        //                 'transaction_code' => $data_transaction->transaction_code,
        //                 'transaction_unit' => $data_transaction->transaction_unit,
        //                 'transaction_reference' => $data_transaction->transaction_reference,
        //                 'transaction_qty' => $data_transaction->transaction_qty,
        //                 'transaction_price' => $data_transaction->transaction_price,
        //                 'code_ticket' => $data_transaction->verifikasi_tiket->kode_tiket,
        //                 'booking_date' => $data_transaction->verifikasi_tiket->tanggal_booking,
        //                 'status' => $data_transaction->status,
        //             ];
        //         }
        //     }
        //     dd($data);
        if ($request->ajax()) {
            $data_transactions = $this->transactions->with('verifikasi_tiket')
                                                    ->where('transaction_code','LIKE','%BRMO%')
                                                    ->where('user',auth()->user()->generate)
                                                    ->get();
            // foreach ($data_transactions as $key => $data_transaction) {
            //     $explode_transaction_code_bromo = explode('-',$data_transaction->transaction_code);
            //     if ($explode_transaction_code_bromo[1] == 'BRMO') {
            //         $data[] = [
            //             'id' => $data_transaction->id,
            //             'transaction_code' => $data_transaction->transaction_code,
            //             'transaction_unit' => $data_transaction->transaction_unit,
            //             'transaction_reference' => $data_transaction->transaction_reference,
            //             'transaction_qty' => $data_transaction->transaction_qty,
            //             'transaction_price' => $data_transaction->transaction_price,
            //             'code_ticket' => $data_transaction->verifikasi_tiket->kode_tiket,
            //             'booking_date' => $data_transaction->verifikasi_tiket->tanggal_booking,
            //             'status' => $data_transaction->status,
            //         ];
            //     }
            // }

            return DataTables::of($data_transactions)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        switch ($row['status']) {
                            case 'Unpaid':
                                return '<span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row['status']).'</span>';
                                break;
                            case 'Paid':
                                return '<span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row['status']).'</span>';
                                break;
                            case 'Not Paid':
                                return '<span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row['status']).'</span>';
                                break;

                            default:
                                # code...
                                break;
                        }
                    })
                    ->addColumn('code_ticket', function($row){
                        return $row->verifikasi_tiket->kode_tiket;
                    })
                    ->addColumn('transaction_unit', function($row){
                        return ucwords($row['transaction_unit']);
                    })
                    ->addColumn('booking_date', function($row){
                        return Carbon::create($row['booking_date'])->isoFormat('LLLL');
                    })
                    ->addColumn('transaction_price', function($row){
                        return 'Rp. '.number_format($row['transaction_price'],0,',','.');
                    })
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        // $btn .= '<a href='.route('b.ticket_bromo.checkout',['reference' => $row['transaction_reference']]).' class="btn btn-sm btn-success"><i class="uil-eye"></i> Purchase Detail</a>';
                        // if ($row['status'] == 'Paid') {
                        //     $btn .= '<a href='.route('b.ticket_bromo.invoice',['reference' => $row['transaction_reference']]).' class="btn btn-sm btn-info"><i class="uil-file-download-alt"></i> Invoice</a>';
                        // }
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }

        // dd($data);
        return view('backend_new_2023.ticket_bromo.index');
    }

    public function create()
    {
        $data['bromos'] = $this->bromo->whereYear('tanggal','>=',Carbon::today()->format('Y'))
                                        ->whereMonth('tanggal','>=',Carbon::today()->format('m'))
                                        // ->whereDate('tanggal',Carbon::today()->format('d'))
                                        ->latest()
                                        ->get();
        // foreach ($bromos as $key => $bromo) {
        //     $schedule_bromo = strtotime($bromo->tanggal);
        //     $date_now = strtotime(Carbon::now());
        //     if ($schedule_bromo >= $date_now) {
        //         $data['bromos'][] = [
        //             'id' => $bromo->id,
        //             'tanggal' => Carbon::create($bromo->tanggal)->isoFormat('LLL'),
        //             'time' => Carbon::create($bromo->tanggal)->format('H:i'),
        //             // 'slug' => $bromo->slug,
        //             // 'title' => $bromo->title,
        //             // 'meeting_point' => $bromo->meeting_point,
        //             'category_trip' => $bromo->category_trip == 'Publik' ? 'Open Trip' : 'Private Trip',
        //             // 'quota' => $bromo->quota,
        //             // 'max_quota' => $bromo->max_quota,
        //             // 'destination' => $bromo->destination,
        //             // 'include' => $bromo->include,
        //             // 'exclude' => $bromo->exclude,
        //             // 'price' => $bromo->price,
        //             // 'discount' => $bromo->discount,
        //         ];
        //     }
        // }
        $tripay = $this->tripay_payment;
        $data['channels'] = json_decode($tripay->getPayment())->data;
        return view('backend_new_2023.ticket_bromo.create',$data);
    }

    public function detail_bromo($id)
    {
        $bromo = $this->bromo->find($id);
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $bromo->id,
                    'tanggal' => Carbon::create($bromo->tanggal)->isoFormat('LLL'),
                    'time' => Carbon::create($bromo->tanggal)->format('H:i'),
                    'slug' => $bromo->slug,
                    'title' => $bromo->title,
                    'meeting_point' => $bromo->meeting_point,
                    'category_trip' => $bromo->category_trip == 'Publik' ? 'Open Trip' : 'Private Trip',
                    'quota' => $bromo->quota,
                    'max_quota' => $bromo->max_quota,
                    'destination' => json_decode($bromo->destination),
                    'include' => json_decode($bromo->include),
                    'exclude' => json_decode($bromo->exclude),
                    // 'price' => 'Rp. '.number_format($bromo->price,0,',','.'),
                    'price' => $bromo->price,
                    'discount' => $bromo->discount,
            ]
        ]);
    }

    public function buy(Request $request)
    {
        DB::beginTransaction();
        // dd($request->all());
            $bromo = $this->bromo->find($request->booking_date_id);
            $kode_jenis_transaksi = 'TRX-BRMO';
            $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
            $input['id'] = Str::uuid()->toString();
            $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
            $input['transaction_unit'] = $bromo->title;
            $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * ($request->qty_team+1) : $bromo->price - (($bromo->discount/100) * $bromo->price);
            // dd($transaction_price);
            if (!empty($request->nama_anggota)) {
                $verifikasi_tiket = $this->verifikasi_tiket->create([
                    'id' => Str::uuid()->toString(),
                    'transaction_id' => $input['id'],
                    'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                    'tanggal_booking' => $bromo->tanggal,
                    'nama_tiket' => $bromo->title,
                    'nama_order' => $request->first_name.' '.$request->last_name,
                    'address' => $request->alamat,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'qty' => $request->qty_team+1,
                    'price' => $transaction_price,
                    'status' => 'Unpaid'
                ]);

                foreach ($request->nama_anggota as $key => $value) {
                    $data['item_details'][] = [
                        'id' => $key+1,
                        'name' => $value,
                        'qty' => 1
                    ];

                    $this->verifikasi_tiket_list->create([
                        'id' => Str::uuid()->toString(),
                        'verifikasi_tiket_id' => $verifikasi_tiket->id,
                        'nama_order' => $value,
                        'qty' => 1
                    ]);
                };

                $input['transaction_order'] = json_encode([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'item_details' => $data['item_details']
                ]);

            }else{
                $input['transaction_order'] = json_encode([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);

                $verifikasi_tiket = $this->verifikasi_tiket->create([
                    'id' => Str::uuid()->toString(),
                    'transaction_id' => $input['id'],
                    'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                    'tanggal_booking' => $bromo->tanggal,
                    'nama_tiket' => $bromo->title,
                    'nama_order' => $request->first_name.' '.$request->last_name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'qty' => $request->qty_team+1,
                    'price' => $transaction_price,
                    'status' => 'Unpaid'
                ]);
            }

            if($request->qty == 0 and $request->qty == null){
                $input['transaction_qty'] = 1;
            }else{
                $input['transaction_qty'] = $request->qty;
            }

            $input['transaction_price'] = $transaction_price;
            // dd($transaction_price);
            if (auth()->user()) {
                $input['user'] = auth()->user()->generate;
            }else{
                $input['user'] = null;
            }
            $input['status'] = 'Unpaid';

            $tripay = $this->tripay_payment;
            // $url_return = '';
            $paymentDetail = $tripay->requestTransaction(
                $bromo->title,
                $request->method,$input['transaction_price'],
                $request->first_name,$request->last_name,$request->email,$request->phone,
                $input['transaction_code'],
                // $url_return
                route('b.ticket_bromo.invoice',['transaction_code' => $input['transaction_code']])
            );
            // dd($url_return);
            // dd(json_decode($paymentDetail)->data->reference);
            $input['transaction_reference'] = json_decode($paymentDetail)->data->reference;
            $transactions = $this->transactions->create($input);
            $bromo->quota = $bromo->quota - ($request->qty_team+1);
            $bromo->update();
            DB::commit();

            if ($transactions) {
                $user = $this->user->where('role',1)->get();
                $notif = [
                    'id' => $input['id'],
                    'url' => route('b.invoice.detail',$input['transaction_code']),
                    'title' => $input['transaction_unit'],
                    'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
                    'color_icon' => 'warning',
                    'icon' => 'uil-clipboard-alt',
                    'publish' => $transactions->created_at,
                ];
                Notification::send($user,new NotificationNotif($notif));
                $payment_reference = json_decode($paymentDetail);
                return response()->json([
                    'success' => true,
                    'message_title' => 'Success',
                    'message_content' => 'The purchase has been successful, please wait',
                    'link' => json_decode($paymentDetail)->data->checkout_url
                    // 'link' => route('b.ticket_bromo.checkout',['reference' => $payment_reference->data->reference])
                ]);
                // return redirect()->route('b.ticket_bromo.checkout',['reference' => $payment_reference->data->reference]);
            }
        // try {
        //     $bromo = $this->bromo->find($request->booking_date_id);
        //     $kode_jenis_transaksi = 'TRX-BRMO';
        //     $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
        //     $input['id'] = Str::uuid()->toString();
        //     $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
        //     $input['transaction_unit'] = $bromo->title;
        //     $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty+1 : $bromo->price - (($bromo->discount/100) * $bromo->price);

        //     if (!empty($request->nama_anggota)) {
        //         $verifikasi_tiket = $this->verifikasi_tiket->create([
        //             'id' => Str::uuid()->toString(),
        //             'transaction_id' => $input['id'],
        //             'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
        //             'tanggal_booking' => $bromo->tanggal,
        //             'nama_tiket' => $bromo->title,
        //             'nama_order' => $request->first_name.' '.$request->last_name,
        //             'address' => $request->alamat,
        //             'email' => $request->email,
        //             'phone' => $request->phone,
        //             'qty' => $request->qty_team,
        //             'price' => $transaction_price,
        //             'status' => 'Unpaid'
        //         ]);

        //         foreach ($request->nama_anggota as $key => $value) {
        //             $data['item_details'][] = [
        //                 'id' => $key+1,
        //                 'name' => $value,
        //                 'qty' => 1
        //             ];

        //             $this->verifikasi_tiket_list->create([
        //                 'id' => Str::uuid()->toString(),
        //                 'verifikasi_tiket_id' => $verifikasi_tiket->id,
        //                 'nama_order' => $value,
        //                 'qty' => 1
        //             ]);
        //         };

        //         $input['transaction_order'] = json_encode([
        //             'first_name' => $request->first_name,
        //             'last_name' => $request->last_name,
        //             'address' => $request->alamat,
        //             'email' => $request->email,
        //             'phone' => $request->phone,
        //             'item_details' => $data['item_details']
        //         ]);

        //     }else{
        //         $input['transaction_order'] = json_encode([
        //             'first_name' => $request->first_name,
        //             'last_name' => $request->last_name,
        //             'address' => $request->alamat,
        //             'email' => $request->email,
        //             'phone' => $request->phone,
        //         ]);

        //         $verifikasi_tiket = $this->verifikasi_tiket->create([
        //             'id' => Str::uuid()->toString(),
        //             'transaction_id' => $input['id'],
        //             'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
        //             'tanggal_booking' => $bromo->tanggal,
        //             'nama_tiket' => $bromo->title,
        //             'nama_order' => $request->first_name.' '.$request->last_name,
        //             'address' => $request->alamat,
        //             'email' => $request->email,
        //             'phone' => $request->phone,
        //             'qty' => $request->qty_team+1,
        //             'price' => $transaction_price,
        //             'status' => 'Unpaid'
        //         ]);
        //     }

        //     if($request->qty == 0 and $request->qty == null){
        //         $input['transaction_qty'] = 1;
        //     }else{
        //         $input['transaction_qty'] = $request->qty;
        //     }

        //     $input['transaction_price'] = $transaction_price;
        //     if (auth()->user()) {
        //         $input['user'] = auth()->user()->id;
        //     }else{
        //         $input['user'] = null;
        //     }
        //     $input['status'] = 'Unpaid';

        //     $tripay = $this->tripay_payment;
        //     $paymentDetail = $tripay->requestTransaction(
        //         $bromo->title,
        //         $request->method,$input['transaction_price'],
        //         $request->first_name,$request->last_name,$request->email,$request->phone,
        //         $input['transaction_code']
        //     );
        //     $input['transaction_reference'] = json_decode($paymentDetail)->data->reference;
        //     $transactions = $this->transactions->create($input);
        //     $bromo->quota = $bromo->quota - $request->qty_team+1;
        //     $bromo->update();
        //     DB::commit();

        //     if ($transactions) {
        //         $user = $this->user->where('role',1)->get();
        //         $notif = [
        //             'id' => $input['id'],
        //             'url' => route('b.invoice.detail',$input['transaction_code']),
        //             'title' => $input['transaction_unit'],
        //             'message' => 'Pesanan Baru - Sedang Melakukan Pembayaran',
        //             'color_icon' => 'warning',
        //             'icon' => 'uil-clipboard-alt',
        //             'publish' => $transactions->created_at,
        //         ];
        //         Notification::send($user,new NotificationNotif($notif));
        //         $payment_reference = json_decode($paymentDetail);
        //         return response()->json([
        //             'success' => true,
        //             'message_title' => 'Success',
        //             'message_content' => 'The purchase has been successful, please wait',
        //             'link' => redirect()->route('b.ticket_bromo.checkout',['reference' => $payment_reference->data->reference])
        //         ]);
        //         // return redirect()->route('b.ticket_bromo.checkout',['reference' => $payment_reference->data->reference]);
        //     }
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     // return redirect()->back();
        //     return response()->json([
        //         'success' => false,
        //         'message_title' => 'Failed',
        //         'message_content' => 'Purchase Failed, please try again'
        //     ]);
        // }
    }

    public function checkout($reference)
    {
        $tripay = $this->tripay_payment;
        $data['detail_payment'] = json_decode($tripay->detailTransaction($reference));
        $data['transaction'] = $this->transactions->where('transaction_reference',$reference)->first();
        return view('backend_new_2023.ticket_bromo.checkout',$data);
    }

    public function check_payment($reference)
    {
        $tripay = $this->tripay_payment;
        $data['detail_payment'] = json_decode($tripay->detailTransaction($reference));
        return response()->json([
            'success' => $data['detail_payment']->success,
            'message' => $data['detail_payment']->message,
            'data' => [
                'reference' => $data['detail_payment']->data->reference,
                'merchant_ref' => $data['detail_payment']->data->merchant_ref,
                'status' => $data['detail_payment']->data->status,
                'link' => $data['detail_payment']->data->status == 'PAID' ? route('b.ticket_bromo.invoice',['reference' => $reference]) : null
            ],
        ]);
    }

    public function detail($reference)
    {
        $tripay = $this->tripay_payment;
        $data['detail_payment'] = json_decode($tripay->detailTransaction($reference));
        $data['transaction'] = $this->transactions->where('transaction_reference',$reference)->first();
        return view('backend_new_2023.ticket_bromo.detail',$data);
    }

    public function invoice($transaction_code)
    {
        $data['transaction'] = $this->transactions->where('transaction_code',$transaction_code)->first();
        if (empty($data['transaction'])) {
            return redirect()->back();
        }
        $tripay = $this->tripay_payment;
        $data['detail_payment'] = json_decode($tripay->detailTransaction($data['transaction']['transaction_reference']));
        return view('backend_new_2023.ticket_bromo.invoice',$data);
    }
}
