<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Hotel;
use App\Models\KamarHotel;
use App\Models\FasilitasUmumHotel;
use App\Models\ContactUs;
use App\Models\Transaksi;
use App\Models\Provinsi;
use App\Models\CheckRoom;
use App\Models\Events;
use App\Models\EventRegister;
use App\Models\Wisata;
use App\Models\Paket;
use App\Models\PaketList;
use App\Models\PaketOrder;
use App\Models\PaketOrderList;
use App\User;

use App\Models\KategoriPaket;

use App\Models\KabupatenKota;
use \Carbon\Carbon;

// use App\Notifications\WisataNotification;
use App\Events\EventRegisterEvent;

use App\Mail\Pembayaran;
use Mail;

use DNS1D;
use Validator;
use DB;
use HTTP_Request2;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->whatsapp = ['nomor' => env('WA_BUSINESS'), 'message' => env('WA_MESSAGE')];
        $this->teams = [
            [ 'image' => 'pras.webp', 'name' => 'Prasetyo Aji Prakoso S.E, M.M', 'posisi' => 'Advisor' ],
            [ 'image' => 'wahid.webp', 'name' => 'Nurwahid A.', 'posisi' => 'Chief Executive Officer' ],
            [ 'image' => 'dani.webp', 'name' => 'Fabrizio D.K', 'posisi' => 'Chief Operating Officer' ],
            [ 'image' => 'bima.webp', 'name' => 'Bima Gani S, A.Md.T', 'posisi' => 'Chief Operating Officer' ],
            [ 'image' => 'adit.webp', 'name' => 'Rio Ramadhan', 'posisi' => 'Chief Operating Officer' ],
            [ 'image' => 'joko.webp', 'name' => 'Tri Joko P.', 'posisi' => 'Chief Marketing Officer' ],
            [ 'image' => 'faqeh.webp', 'name' => 'Muhammad Arsys', 'posisi' => 'Chief Marketing Officer' ],
            [ 'image' => 'rio.webp', 'name' => 'Rio Anugrah A.S, A.Md.T', 'posisi' => 'Chief Technology Officer' ],
            // [ 'image' => 'team01.png', 'name' => 'Kemal Izzuddin A.Md.T', 'posisi' => 'Chief Technology Officer' ],
            [ 'image' => 'tasya.webp', 'name' => 'Tasya Ayu S.', 'posisi' => 'Chief Financial Officer' ],
        ];
        $this->menu = [
            [ 'name' => 'Home', 'active' => true ,'link' => route('frontend') ],
            [ 'name' => 'Tour', 'active' => false ,'link' => 'javascript:void()' ],
            [ 'name' => 'Tracking Order', 'active' => false ,'link' => 'javascript:void()' ],
        ];
        $this->payment_live = env('OY_INDONESIA_LIVE');
        $this->automatics = $this->payment_live;
        $this->username = config('app.oy_username');
        // $this->app_key = config('app.oy_api_key');
        if($this->payment_live == true){
            $this->payment_production = 'https://partner.oyindonesia.com/api/';
            $this->api_key = env('OY_INDONESIA_APP_KEY_LIVE');
        }else{
            $this->payment_production = 'https://api-stg.oyindonesia.com/api/';
            $this->api_key = env('OY_INDONESIA_APP_KEY');
        }
        // protected $data['whatsapp'] = ['nomor' => '-', 'message' => 'Hello'];
    }
    public function frontend_testing()
    {
        $data['menus'] = $this->menu;
        $data['paket_privates'] = PaketList::where('kategori_paket_id',1)->get();
        $data['paket_trips'] = PaketList::where('kategori_paket_id',2)->orderBy('created_at','desc')->paginate(5);
        return view('frontend.frontend_2022.index', $data);
    }

    public function index(Request $request)
    {
        $coming_soon = true;
        $years = 2021;
        $months = 01;
        $dates = 01;
        $date_coming_soon = $years.'/'.$months.'/'.$dates;
        $date_now = date("Y/m/d");
        // dd($date);

        if($date_now > $date_coming_soon){
            $data['teams'] = $this->teams;
            $data['menus'] = $this->menu;
            // $data['wallpaper'] = [
            //     ['image' => 'frontend/assets2/images/wallpaper/bromo.png', 'arrow' => 'frontend/assets2/images/arrow-link.png', 'title' => 'Wisata Gunung Bromo'],
            //     ['image' => 'frontend/assets2/images/wallpaper/batubengkung.png', 'arrow' => 'frontend/assets2/images/arrow-link.png', 'title' => 'Wisata Pantai Batu Bengkung'],
            //     ['image' => 'frontend/assets2/images/wallpaper/museum_angkut.png', 'arrow' => 'frontend/assets2/images/arrow-link.png', 'title' => 'Wisata Museum Angkut'],
            // ];
            $data['wallpaper'] = Slider::where('status','Y')->inRandomOrder()->get();
            $data['adventure'] = [
                ['image' => 'frontend/assets4/images/bromo_vertikal.jpg', 'title' => 'Gunung Bromo'],
                ['image' => 'frontend/assets4/images/batubengkung_vertikal.jpg', 'title' => 'Pantai Batu Bengkung'],
                ['image' => 'frontend/assets4/images/jatimpark2_vertikal.jpg', 'title' => 'Jatim Park 2'],
            ];
            $data['hotels'] = Hotel::paginate(9);
            $data['informasi'] = 'info@plesiranindonesia.com';
            $data['whatsapp'] = $this->whatsapp;
            $data['jumlah_hotel'] = Hotel::count();
            $data['event'] = Events::count();
            $searchTermJawa = 'Jawa';
            // $searchTermJogja = 'Di Yogyakarta';
            // $data['provinsis'] = Provinsi::select('nama AS provinsi','id')
            //                         ->where('nama','LIKE',"%{$searchTermJawa}%")
            //                         // ->orWhere('nama','LIKE',"%{$searchTermJogja}%")
            //                         ->get();

            $data['provinsis'] = Provinsi::all();
            $data['jumlah_paket_wisata'] = PaketList::count();
            $data['pakets'] = Paket::all();
            $data['paket_privates'] = PaketList::where('kategori_paket_id',1)->get();
            $data['paket_trips'] = PaketList::where('kategori_paket_id',2)->where('status','!=',0)
                                            ->orderBy('created_at','desc')->paginate(5);
            // $request->visitor()->browser();
            // visitor()->visit();
            // visitor()->browser();
            // dd($data['whatsapp']);
            // return view('frontend.frontend_2022.index', $data);
            return view('frontend.frontend4.index', $data);
            // return view('layouts.frontend_4.app',$data);
            // return view('frontend.frontend2.index',$data);
        }else{
            $data['email'] = 'info@plesiranindonesia.com';
            $data['content'] = 'Get ready everyone at Pesona Plesiran Indonesia.';
            $data['wallpaper_c'] = [
                ['image' => 'coming_soon/images/slides/batubengkung.png'],
                ['image' => 'coming_soon/images/slides/bromo.png'],
                ['image' => 'coming_soon/images/slides/museum_angkut.png'],
            ];
            
            $data['year'] = $years;
            $data['month'] = $months;
            $data['date'] = $dates;
            return view('coming_soon.index', $data);
        }

        // if($coming_soon == true){
        //     return view('frontend.index2', $data);
        // }else{
        //     $data['email'] = 'info@plesiranindonesia.com';
        //     $data['content'] = 'Get ready everyone at Pesona Plesiran Indonesia.';
        //     $data['wallpaper_c'] = [
        //         ['image' => 'coming_soon/images/slides/batubengkung.png'],
        //         ['image' => 'coming_soon/images/slides/bromo.png'],
        //         ['image' => 'coming_soon/images/slides/museum_angkut.png'],
        //     ];
        //     $data['year'] = 2021;
        //     $data['month'] = 12;
        //     $data['date'] = 12;
        //     return view('coming_soon.index', $data);
        // }
    }

    public function search_hotel(Request $request)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['search'] = $request->all();
        
        if($request->in != null){
            $checkIn = $request->in;
        }else{
            $checkIn = null;
        }

        if($request->out != null){
            $checkOut = $request->out;
        }else{
            $checkOut = null;
        }

        $data['hotels'] = Hotel::where('nama_hotel','LIKE',"%{$request->search_hotel}%")
                                ->orWhere('alamat','LIKE',"%{$request->search_hotel}%")
                                ->get();

        // if(!$request->search_hotel){
        //     $data['hotels'] = Hotel::where('nama_hotel','LIKE',"%{$request->search_hotel}%")
        //                             ->orWhere('alamat','LIKE',"%{$request->search_hotel}%")
        //                             ->get();
        // }else{
        //     $data['hotels'] = Hotel::join('check_room','check_room.hotel_id','>=','hotel.id')
        //                             ->select([
        //                                 'hotel.id',
        //                                 'hotel.slug',
        //                                 'hotel.nama_hotel',
        //                                 'hotel.alamat',
        //                                 'hotel.deskripsi',
        //                                 'hotel.provinsi',
        //                                 'hotel.kota_kabupaten',
        //                                 'hotel.kecamatan'
        //                             ])
        //                             ->where('nama_hotel','LIKE',"%{$request->search_hotel}%")
        //                             ->orWhere('alamat','LIKE',"%{$request->search_hotel}%")
        //                             ->get();
        // }
                                // $data['hotels'] = CheckRoom::join('hotel','hotel.id','check_room.hotel_id')
                                //                         ->select('hotel.nama_hotel','hotel.alamat')
                                //                         ->where('hotel_id',$data['search_hotels']['id'])
                                //                         // where('kode_booking','H-16620220116')
                                //                         // ->orWhere('hotel_id',$data['search_hotels']['id'])
                                //                         // ->where('hotel.nama_hotel','LIKE',"%{$request->search_hotel}%")
                                //                         // ->orWhere('hotel.alamat','LIKE',"%{$request->search_hotel}%")
                                //                         ->orWhereDate('check_in','=',$checkIn)
                                //                         ->orWhereDate('check_out','=',$checkOut)
                                //                         // ->whereDate('check_in','>=',Carbon::parse($checkIn)->format('Y-m-d'))
                                //                         // ->whereDate('check_out','>=',Carbon::parse($checkOut)->format('Y-m-d'))
                                //                         ->get();

        // dd($data['hotels']);
        // dd($checkIn);
        // dd(Carbon::parse($checkIn)->format('Y-m-d'));
        return view('frontend.frontend4.hotelSearch', $data);
    }

    public function struktur()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.struktur_organisasi', $data);
    }
    public function tentang_kami()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['jumlah_hotel'] = Hotel::count();
        $data['event'] = Events::count();
        // return view('frontend.frontend2.tentang_kami', $data);
        return view('frontend.frontend4.tentang_kami', $data);
    }
    public function visimisi()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend2.visi_misi', $data);
    }
    public function tim()
    {
        $data['teams'] = $this->teams;
        $data['whatsapp'] = $this->whatsapp;
        // return view('frontend.frontend2.tim_kami', $data);
        return view('frontend.frontend4.teams', $data);
    }
    public function kontak()
    {
        $data['whatsapp'] = $this->whatsapp;
        // return view('frontend.frontend2.kontak', $data);
        return view('frontend.frontend4.kontak', $data);
    }

    public function info()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend4.informasi', $data);
    }

    public function kontak_simpan(Request $request)
    {
        $rules = [
            'name'  => 'required',
            'email'  => 'required',
            'subject'  => 'required',
            'message'  => 'required',
        ];
 
        $messages = [
            'name.required'  => 'Nama wajib diisi.',
            'email.required'  => 'Email wajib diisi.',
            'subject.required'  => 'Subyek wajib diisi.',
            'message.required'  => 'Pesan wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $contact_us = ContactUs::create($input);

            if($contact_us){
                $message_title="Berhasil !";
                $message_content="Terima Kasih ".$input['name']." Telah Mengirim Pesan ke Kami";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);
        }

        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function partnership()
    {
        $coming_soon = false;
        if($coming_soon == true){
            return view('frontend.frontend2.segera_hadir');
        }
        // $data['kabupaten_kotas'] = KabupatenKota::all();
        $data['provinsis'] = Provinsi::pluck('nama','id');
        return view('frontend.frontend2.partnership',$data);
    }

    public function hotel()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['hotels'] = Hotel::paginate(18);

        // dd($data['hotelss']);
        // return view('frontend.frontend2.hotel', $data);
        return view('frontend.frontend4.hotel', $data);

    }
    public function hotel_detail($slug)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['hotels'] = Hotel::where('slug',$slug)->first();
        $data['fasilitas_popular'] = FasilitasUmumHotel::where('hotel_id',$data['hotels']['id'])->get();
        $data['kamar_hotels'] = KamarHotel::where('hotel_id',$data['hotels']['id'])->get();
        // dd($data['kamar_hotels']);
        // return view('frontend.frontend2.hotelDetail', $data);
        return view('frontend.frontend4.hotelDetail', $data);
    }

    public function kamar_hotel_detail($slug,$slug_kamar)
    {
        $data['whatsapp'] = $this->whatsapp;
        // $data['kamar_hotels'] = KamarHotel::join('room_hotel','room_hotel.kamar_hotel_id','kamar_hotel.id')
        //                         ->select('kamar_hotel.hotel_id','kamar_hotel.slug','kamar_hotel.nama_kamar','kamar_hotel.deskripsi_kamar','kamar_hotel.price','room_hotel.jumlah_kamar')
        //                         ->where('kamar_hotel.slug',$slug_kamar)
        //                         ->first();
        $data['kamar_hotels'] = KamarHotel::where('slug',$slug_kamar)->first();
        // dd($data);
        return view('frontend.frontend2.kamar_hotel_detail',$data);
    }

    public function payment()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend2.payment',$data);
    }

    public function wistlist()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend4.wistlist',$data);
    }
    public function search_wistlist(Request $request)
    {
        $search = Transaksi::where('partner_tx_id','like',"%".$request->s."%")->get();
        return response()->json([
            'data' => $search
        ]);
    }

    public function event()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['events'] = Events::orderBy('id','desc')->paginate(10);

        return view('frontend.frontend4.events',$data);
    }

    public function eventDetail($slug)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['event'] = Events::where('slug',$slug)->first();

        $carbon = Carbon::parse($data['event']['start_event']);
        $setCarbon = Carbon::setTestNow($carbon);

        $data['pendaftaran_terakhir'] = Carbon::yesterday()->isoFormat('LLLL');
        // dd($data); 
        // dd(Carbon::parse($data['event']['start_event']));

        return view('frontend.frontend4.eventsDetail',$data);

    }

    public function eventRegister(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'kategori_asal' => 'required',
            'asal' => 'required',
            'alamat' => 'required',
        ];
 
        $messages = [
            'first_name.required' => 'Nama Depan wajib diisi.',
            'last_name.required' => 'Nama Belakang wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'kategori_asal.required' => 'Berasal Dari wajib diisi.',
            'asal.required' => 'Asal SMK/SMA, Kampus, Instansi  wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()){
            $events = Events::where('slug',$request->slug)->first();

            $carbon = Carbon::parse($events->start_event);
            $setCarbon = Carbon::setTestNow($carbon);

            $pendaftaran_terakhir = Carbon::yesterday()->isoFormat('LLLL');

            if($pendaftaran_terakhir <= Carbon::now()->isoFormat('LLLL')){
                $message_title = "Waktu Pendaftaran Habis";
                $message_content = "Mohon maaf waktu pendaftaran telah habis. Silahkan coba lagi di event selanjutnya. Terima Kasih 😊";
                $message_type = "success";
                $message_succes = true;

                $array_message = array(
                    'success' => $message_succes,
                    'title' => $message_title,
                    'text' => $message_content,
                    'icon' => $message_type,
                );
                return response()->json($array_message);
            }
            else{
                if($events->kuota == 0){
                    $message_title = "Kuota Pendaftaran Penuh";
                    $message_content = "Mohon maaf kuota event ".$events->title." sudah terpenuhi. Silahkan coba lagi di event selanjutnya. Terima Kasih 😊";
                    $message_type = "success";
                    $message_succes = true;
    
                    $array_message = array(
                        'success' => $message_succes,
                        'title' => $message_title,
                        'text' => $message_content,
                        'icon' => $message_type,
                    );
                    return response()->json($array_message);
                }
                
                $input['event_id'] = $events->id;
                $input['kode_tiket'] = 'ETIKET-'.rand(10000,99999);
                $input['first_name'] = $request->first_name;
                $input['last_name'] = $request->last_name;
                $input['email'] = $request->email;
                $input['kategori_asal'] = $request->kategori_asal;
                $input['asal'] = $request->asal;
                $input['no_telp'] = $request->no_telp;
                $input['alamat'] = $request->alamat;
                $input['is_event_register'] = 'W';
    
                $eventRegister = EventRegister::create($input);
    
                $stockEvent = (int)$events->kuota - 1;
                $events->kuota = $stockEvent;
                $events->save();
    
                if($eventRegister){
                    $details = [
                        'title' => 'Konfirmasi Pendaftaran '.$events->title,
                        'body' => 'Terima kasih Bapak/Ibu/Saudara/i '.$request->first_name.' '.$request->last_name.' telah melakukan pendaftaran event '.$events->title.'. Kode tiket anda '.$input['kode_tiket'].'. '
                    ];
                    \Mail::to($input['email'])->send(new \App\Mail\RegisterEvent($details));
    
                    $message_title = "Pendaftaran Berhasil";
                    $message_content = "Terima kasih telah melakukan pendaftaran event. Silahkan cek email kembali";
                    $message_type = "success";
                    $message_succes = true;
                }
    
                $array_message = array(
                    'success' => $message_succes,
                    'title' => $message_title,
                    'text' => $message_content,
                    'icon' => $message_type,
                );
                return response()->json($array_message);
            }
            
        }

        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function wisata()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['wisatas'] = Wisata::all();
        return view('frontend.frontend4.wisata',$data);
    }

    public function wisata_detail($slug)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['wisata'] = Wisata::where('slug',$slug)->first();
        if(empty($data['wisata'])){
            return redirect()->back();
        }
        return view('frontend.frontend4.wisata_detail',$data);
    }

    public function paket()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['pakets'] = Paket::all();
        return view('frontend.frontend4.paket',$data);
    }

    public function paket_detail($slug)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['pakets'] = Paket::where('slug',$slug)->first();
        $data['paket_lists'] = PaketList::where('paket_id',$data['pakets']['id'])->orderBy('created_at','desc')->get();
        // dd($data);
        return view('frontend.frontend4.paket_detail',$data);
    }

    public function paket_detail_list($id)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['paket'] = Paket::where('slug',$id)->first();
        $data['paket_lists'] = PaketList::where('paket_id',$data['paket']['id'])->first();
        // dd($data);
        return view('frontend.frontend4.pakets_detail_list',$data);
    }

    public function paket_cart($slug,$id)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['live'] = $this->automatics;
        $data['pakets'] = Paket::where('slug',$slug)->first();
        $data['paket_lists'] = PaketList::where('paket_id',$data['pakets']['id'])
                                        ->where('id',$id)
                                        ->first();
        // dd($data);
        return view('frontend.frontend4.paket_cart',$data);
    }

    public function paket_list_order_payment($id)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['paket'] = PaketOrder::find($id);
        $data['transaksi'] = Transaksi::where('partner_tx_id',$id)->first();
        $data['anggotas'] = PaketOrderList::select('order_paket_id','pemesan','qty')
                                    ->where('order_paket_id', $data['paket']['id'])->get();
        foreach (json_decode($data['paket']['pemesan']) as $key => $p) {
            // dd($p);
            $data['pemesan'] = $p;
            // dd($data['pemesan']);
        }
        $data['status_live'] = $this->automatics;

        if($this->automatics == true){
            //Payment
            $paymentLink = new HTTP_Request2();
            $paymentLink->setUrl($this->payment_production.'/payment-checkout/status?partner_tx_id='.$id);
            $paymentLink->setMethod(HTTP_Request2::METHOD_GET);
            $paymentLink->setConfig(array(
            'follow_redirects' => TRUE
            ));
            $paymentLink->setHeader(array(
            'x-oy-username:'.$this->username,
            'x-api-key:'.$this->api_key,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
            ));
            try {
                $response = $paymentLink->send();
                if ($response->getStatus() == 200) {
                    // $dataPayment = $response->getBody();
                    // return $dataPayment;
                    $dataPayment = json_decode($response->getBody(),true);
                    // return $dataPayment['data']['status'];
    
                    if($dataPayment['data']['status'] == 'created'){
                        $data['status_pembayaran'] = 1;
                        $data['status'] = 'Menunggu Pembayaran';
                    }
                    elseif($dataPayment['data']['status'] == 'complete'){
                        $data['status_pembayaran'] = 3;
                        $data['status'] = 'Pembayaran Berhasil';
                        $data['paket']->update([
                            'status' => $data['status_pembayaran']
                        ]);
                        $data['transaksi']->update([
                            'status' => $data['status_pembayaran']
                        ]);
                    }
    
                    return view('frontend.frontend4.payment_paket',$data);
                    
                    // if($data['paket']['status'] == 1){
                    //     $data['status'] = 'Menunggu Pembayaran';
                    // }
                    // elseif($data['paket']['status'] == 2){
                    //     $data['status'] = 'Sedang Diproses';
                    // }
                    // elseif($data['paket']['status'] == 3){
                    //     $data['status'] = 'Pembayaran Berhasil';
                    // }else{
                    //     $data['status'] = 'Pembayaran Ditolak';
                    // }
                    
                    // return view('frontend.frontend4.payment_paket',$data);
                }
                else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
                }
            } catch (\HTTP_Request2_Exception $th) {
                echo 'Error: ' . $th->getMessage();
            }
        }
        else{
            $paymentLink = new HTTP_Request2();
            $paymentLink->setUrl($this->payment_production.'/payment-checkout/status?partner_tx_id='.$id);
            $paymentLink->setMethod(HTTP_Request2::METHOD_GET);
            $paymentLink->setConfig(array(
            'follow_redirects' => TRUE
            ));
            $paymentLink->setHeader(array(
            'x-oy-username:'.$this->username,
            'x-api-key:'.$this->api_key,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
            ));
            try {
                $response = $paymentLink->send();
                if ($response->getStatus() == 200) {
                    // $dataPayment = $response->getBody();
                    // return $dataPayment;
                    $dataPayment = json_decode($response->getBody(),true);
                    // return $dataPayment['data']['status'];
    
                    if($dataPayment['data']['status'] == 'created'){
                        $data['status_pembayaran'] = 1;
                        $data['status'] = 'Menunggu Pembayaran';
                    }
                    elseif($dataPayment['data']['status'] == 'waiting_payment'){
                        $data['status_pembayaran'] = 1;
                        $data['status'] = 'Menunggu Pembayaran';
                    }
                    elseif($dataPayment['data']['status'] == 'complete'){
                        $data['status_pembayaran'] = 3;
                        $data['status'] = 'Pembayaran Berhasil';
                        $data['paket']->update([
                            'status' => $data['status_pembayaran']
                        ]);
                        $data['transaksi']->update([
                            'status' => $data['status_pembayaran']
                        ]);
                    }
    
                    return view('frontend.frontend4.payment_paket',$data);
                    
                }
                else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
                }
            } catch (\HTTP_Request2_Exception $th) {
                echo 'Error: ' . $th->getMessage();
            }
            
            return view('frontend.frontend4.payment_paket',$data);
        }
    }

    public function tracking_order()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend4.tracking_order',$data);
    }

    public function tracking_order_search(Request $request)
    {
        $input_kode_tracking = $request->kode_tracking;
        $tracking = PaketOrder::where('id',$input_kode_tracking)->get();
        if(empty($tracking)){
            return response()->json([
                'status' => false,
                'message' => 'Kode Tracking Tidak Ditemukan'
            ],201);
        }
        foreach ($tracking as $key => $value) {
            // $dataTracking = $tracking;
            foreach (json_decode($value->pemesan) as $key => $vp) {
                $pemesan = $vp;
            }
            $anggotas = PaketOrderList::select('order_paket_id','pemesan','qty')
                                    ->where('order_paket_id', $value->id)->get();
            foreach ($anggotas as $key => $a) {
                $anggota[] = [
                    'nama' => $a->pemesan
                ];
            }
            if($value->status == 1){
                $status = "NOT PAID";
            }elseif($value->status == 3){
                $status = "PAID";
            }
            $dataTracking[] = [
                'id' => $value->id,
                'nama_paket' => $value->nama_paket,
                'price' => $value->price,
                'qty' => $value->qty,
                // 'nama_pemesan' => $pemesan->first_name,
                // 'pemesan' => $pemesan,
                'nama_pemesan' => $pemesan->first_name.' '.$pemesan->last_name,
                // 'anggota' => $anggota,
                'tanggal_berangkat' => Carbon::parse($pemesan->tanggal_berangkat)->format('d-m-Y'),
                'anggota' => $anggotas,
                'tanggal_pembelian' => Carbon::parse($value->created_at)->isoFormat('dddd, D MMMM Y'),
                'status' => $status,
                // json_decode(json_encode($value->pemesan),true),
                // 'pemesan' => $dataPemesan[0]['firstname'],
                // 'pemesan' => json_decode($value->pemesan,true),
                // json_decode($value->pemesan['order']['firstname'],false),
                'barcode' => DNS1D::getBarcodeHTML($value->id, 'C39', 0.95,33)
                // 'nama_pemesan' => $dataPemesan
            ];
        }
        return response()->json([
            'status' => true,
            // 'data' => [
            //     'id' => $tracking->id,
            //     'nama_paket' => $tracking->nama_paket,
            //     'price' => $tracking->price,
            //     'qty' => $tracking->qty,
            //     'nama_pemesan' => $tracking->pemesan['order']['firstname']
            // ],
            'data' => $dataTracking
        ]);
    }

}
