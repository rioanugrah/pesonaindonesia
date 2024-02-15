<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use \Carbon\CarbonPeriod;

use App\Notifications\NotificationNotif;

use App\User;
use App\Models\Bromo;
use App\Models\Transactions;
use App\Models\TransactionList;
use App\Models\BuktiPembayaran;

use App\Models\VerifikasiTiket;
use App\Models\VerifikasiTiketList;

use Notification;
use Validator;
use DB;
use Mail;
use HTTP_Request2;

class BromoController extends Controller
{
    function __construct(
        Bromo $bromo,
        Transactions $transaction,
        // TransactionList $transaction_list,
        BuktiPembayaran $bukti_pembayaran,
        VerifikasiTiket $verifikasi_tiket,
        VerifikasiTiketList $verifikasi_tiket_list,
        User $user
    ){
        $this->bromo = $bromo;
        $this->transaction = $transaction;
        // $this->transaction_list = $transaction_list;
        $this->bukti_pembayaran = $bukti_pembayaran;
        $this->verifikasi_tiket = $verifikasi_tiket;
        $this->verifikasi_tiket_list = $verifikasi_tiket_list;
        $this->user = $user;
    }
    public function index()
    {
        $today = Carbon::today();
        $week_start = $today->startOfWeek()->format('Y-m-d');
        $week_end= $today->endOfWeek()->format('Y-m-d');
        $schedule_bromos = CarbonPeriod::create($week_start,$week_end);
        foreach ($schedule_bromos as $schedule_bromo) {
            $jadwal_bromos = $this->bromo->whereDate('tanggal',$schedule_bromo->format('Y-m-d'))->get();
            foreach ($jadwal_bromos as $jadwal_bromo) {
                if ($jadwal_bromo->tanggal >= Carbon::now()->format('Y-m-d H:i') ) {
                    $status = 'open';
                }else{
                    $status = 'close';
                }
                $data['data'][] = [
                    'id' => $jadwal_bromo->id,
                    'date' => Carbon::create($jadwal_bromo->tanggal)->isoFormat('LL'),
                    'time' => Carbon::create($jadwal_bromo->tanggal)->format('H:i'),
                    'schedule' => Carbon::create($jadwal_bromo->tanggal)->format('Y-m-d'),
                    'slug' => $jadwal_bromo->slug,
                    'title' => $jadwal_bromo->title,
                    'meeting_point' => $jadwal_bromo->meeting_point,
                    'category_trip' => $jadwal_bromo->category_trip,
                    'quota' => $jadwal_bromo->quota,
                    'max_quota' => $jadwal_bromo->max_quota,
                    // 'price' => 'Rp. '.number_format($jadwal_bromo->price,0,',','.'),
                    'price' => number_format($jadwal_bromo->price,0,',','.'),
                    'discount' => $jadwal_bromo->discount,
                    'status' => $status
                ];
            }
        }
        return $data;
    }

    public function detail($id)
    {
        $detail_packet_bromo = $this->bromo->where('id',$id)->first();
        if (empty($detail_packet_bromo)) {
            return [
                'success' => false,
                'message_content' => 'Data tidak ditemukan'
            ];
        }

        if ($detail_packet_bromo->tanggal >= Carbon::now() ) {
            $status = 'open';
        }else{
            $status = 'close';
        }

        return [
            'success' => true,
            'data' => [
                'id' => $detail_packet_bromo->id,
                'slug' => $detail_packet_bromo->slug,
                'title' => $detail_packet_bromo->title,
                'date' => Carbon::parse($detail_packet_bromo->tanggal)->isoFormat('DD MMMM YYYY'),
                'time' => Carbon::parse($detail_packet_bromo->tanggal)->isoFormat('H:mm'),
                'meeting_point' => $detail_packet_bromo->meeting_point,
                'category_trip' => $detail_packet_bromo->category_trip,
                'quota' => $detail_packet_bromo->quota,
                'max_quota' => $detail_packet_bromo->max_quota,
                'destination' => json_decode($detail_packet_bromo->destination),
                'list_include' => json_decode($detail_packet_bromo->include),
                'list_exclude' => json_decode($detail_packet_bromo->exclude),
                'price' => $detail_packet_bromo->price,
                'accounting' => number_format($detail_packet_bromo->price,0,',','.'),
                'discount' => $detail_packet_bromo->discount,
                'status' => $status,
            ]
        ];
    }

    public function booking(Request $request, $id)
    {
        DB::beginTransaction();
        // return $request->all();
        // return auth()->user()->generate;
        // return env('MIDTRANS_CLIENT_KEY_DEMO');
        if (env('PAYMENT_MANUAL') == true) {
            try {
                $bromo = $this->bromo->find($id);
                $kode_jenis_transaksi = 'TRX-BRMO-M';
                $kode_random_transaksi = Carbon::now()->format('Ym').rand(100,999);
                $input['id'] = Str::uuid()->toString();
                $input['transaction_code'] = $kode_jenis_transaksi.'-'.$kode_random_transaksi;
                $input['transaction_unit'] = $bromo->title;
                $transaction_price = $bromo->category_trip == 'Publik' ? ($bromo->price - (($bromo->discount/100) * $bromo->price)) * $request->qty : $bromo->price - (($bromo->discount/100) * $bromo->price);
                $this->verifikasi_tiket->create([
                    'id' => Str::uuid()->toString(),
                    'transaction_id' => $input['id'],
                    'kode_tiket' => 'E-TIKET-'.$kode_random_transaksi,
                    'tanggal_booking' => $bromo->tanggal,
                    'nama_tiket' => $bromo->title,
                    'nama_order' => $request->first_name.' '.$request->last_name,
                    'address' => $request->alamat,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'qty' => $request->qty,
                    'price' => $transaction_price,
                    'status' => 'Unpaid'
                ]);
                
                if($request->qty == 0 and $request->qty == null){
                    $input['transaction_qty'] = 1;
                }else{
                    $input['transaction_qty'] = $request->qty;
                }
                $input['transaction_price'] = $transaction_price;
                if (auth()->user()) {
                    $input['user'] = auth()->user()->generate;
                }else{
                    $input['user'] = null;
                }
                $input['status'] = 'Unpaid';
                $input['transaction_order'] = json_encode([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    // 'payment_method' => env('PAYMENT_METHODE'),
                    // 'payment_name' => env('PAYMENT_NAME'),
                    // 'payment_rekening' => env('PAYMENT_REKENING'),
                    // 'prof_payment' => null,
                    // 'item_details' => $data['item_details']
                ]);

                if ($bromo->quota == 0) {
                    return response()->json([
                        'success' => false,
                        'error' => "Kuota Booking Habis"
                    ]);
                }else{
                    $bromo->quota = $bromo->quota - $request->qty;
                }
                $transactions = $this->transaction->create($input);
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
                    // $data['id'] = $bromo->id;
                    // $data['id_transaksi'] = $input['id'];
                    // $data['tanggal'] = $tanggal;
                    // $data['kode_order'] = $input['transaction_code'];
                    // $data['first_name'] = $request->first_name;
                    // $data['last_name'] = $request->last_name;
                    // $data['email'] = $request->email;
                    // $data['title'] = $bromo->title;
                    // $data['qty'] = $input['transaction_qty'];
                    // $data['price'] = $input['transaction_price'];
                    $this->bukti_pembayaran->create([
                        'id' => Str::uuid()->toString(),
                        'id_transaksi' => $input['id'],
                        'kode_transaksi' => $input['transaction_code']
                    ]);

                    $message_title="Berhasil !";
                    $message_content="Booking ".$bromo->title." Berhasil Dibuat";
                    $message_type="success";
                    $message_succes = true;
                }

                $array_message = array(
                    'success' => $message_succes,
                    'message_title' => $message_title,
                    'message_content' => $message_content,
                    'message_type' => $message_type,
                );

                return $array_message;
            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json([
                    'success' => false,
                    'error' => "Booking Gagal"
                ]);
            }
            
        }
        
        // $input['transaction_order'] = [
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'address' => $request->address,
        //     'email' => $request->email,
        //     'phone' => $request->phone
        // ];
        // return response()->json($input,200);
        // return [
        //     'success' => true
        // ];
    }
}
