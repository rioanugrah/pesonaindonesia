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

use App\Models\KabupatenKota;
use \Carbon\Carbon;

// use App\Notifications\WisataNotification;
use App\Events\EventRegisterEvent;

use Validator;
use DB;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->whatsapp = ['nomor' => env('WA_BUSINESS'), 'message' => env('WA_MESSAGE')];
        $this->teams = [
            [ 'image' => 'pras.jpg', 'name' => 'Prasetyo Aji Prakoso S.E, M.M', 'posisi' => 'Advisor' ],
            [ 'image' => 'wahid.jpg', 'name' => 'Nurwahid A.', 'posisi' => 'Chief Executive Officer' ],
            [ 'image' => 'dani.jpg', 'name' => 'Fabrizio D.K', 'posisi' => 'Chief Operating Officer' ],
            [ 'image' => 'bima.jpg', 'name' => 'Bima Gani S, A.Md.T', 'posisi' => 'Chief Operating Officer' ],
            [ 'image' => 'adit.jpg', 'name' => 'Rio Ramadhan', 'posisi' => 'Chief Operating Officer' ],
            [ 'image' => 'joko.jpg', 'name' => 'Tri Joko P.', 'posisi' => 'Chief Marketing Officer' ],
            [ 'image' => 'faqeh.jpeg', 'name' => 'Muhammad Arsys', 'posisi' => 'Chief Marketing Officer' ],
            [ 'image' => 'rio.jpg', 'name' => 'Rio Anugrah A.S, A.Md.T', 'posisi' => 'Chief Technology Officer' ],
            // [ 'image' => 'team01.png', 'name' => 'Kemal Izzuddin A.Md.T', 'posisi' => 'Chief Technology Officer' ],
            [ 'image' => 'tasya.jpg', 'name' => 'Tasya Ayu S.', 'posisi' => 'Chief Financial Officer' ],
        ];
        // protected $data['whatsapp'] = ['nomor' => '-', 'message' => 'Hello'];
    }
    public function index()
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
            // dd($data['whatsapp']);
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
        $data['paket_lists'] = PaketList::where('paket_id',$data['pakets']['id'])->get();
        // dd($data);
        return view('frontend.frontend4.paket_detail',$data);
    }

    public function paket_cart($slug,$id)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['pakets'] = Paket::where('slug',$slug)->first();
        $data['paket_lists'] = PaketList::where('paket_id',$data['pakets']['id'])
                                        ->where('id',$id)
                                        ->first();
        // dd($data);
        return view('frontend.frontend4.paket_cart',$data);
    }

    public function tracking_order()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend4.tracking_order',$data);
    }

}
