<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Hotel;
use App\Models\KamarHotel;
use App\Models\ContactUs;
use \Carbon\Carbon;
use Validator;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->whatsapp = ['nomor' => '-', 'message' => 'Hello'];
        $this->teams = [
            [ 'image' => 'pras.jpg', 'name' => 'Prasetyo Aji Prakoso S.E, M.M', 'posisi' => 'Advisor' ],
            [ 'image' => 'wahid.jpg', 'name' => 'Nurwahid A.', 'posisi' => 'Chief Executive Officer' ],
            [ 'image' => 'dani.jpg', 'name' => 'Fabrizio D.K', 'posisi' => 'Chief Operational Officer' ],
            [ 'image' => 'bima.jpg', 'name' => 'Bima Gani S, A.Md', 'posisi' => 'Chief Operational Officer' ],
            [ 'image' => 'adit.jpg', 'name' => 'Rio Ramadhan', 'posisi' => 'Chief Operational Officer' ],
            [ 'image' => 'joko.jpg', 'name' => 'Tri Joko P.', 'posisi' => 'Chief Marketing Officer' ],
            [ 'image' => 'faqeh.jpeg', 'name' => 'Muhammad Arsys', 'posisi' => 'Chief Marketing Officer' ],
            [ 'image' => 'rio.jpg', 'name' => 'Rio Anugrah A.S, A.Md.T', 'posisi' => 'Chief Technology Officer' ],
            // [ 'image' => 'team01.png', 'name' => 'Kemal Izzuddin A.Md.T', 'posisi' => 'Chief Technology Officer' ],
            [ 'image' => 'tasya.jpg', 'name' => 'Tasya Ayu S.', 'posisi' => 'Chief Finance Officer' ],
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
            $data['wallpaper'] = Slider::where('status','Y')->get();
            $data['adventure'] = [
                ['image' => 'frontend/assets2/images/bromo_vertikal.jpg', 'title' => 'Gunung Bromo'],
                ['image' => 'frontend/assets2/images/batubengkung_vertikal.jpg', 'title' => 'Pantai Batu Bengkung'],
                ['image' => 'frontend/assets2/images/jatimpark2_vertikal.jpg', 'title' => 'Jatim Park 2'],
            ];
            $data['hotels'] = Hotel::paginate(9);
            $data['informasi'] = 'info@plesiranindonesia.com';
            $data['whatsapp'] = $this->whatsapp;
            $data['jumlah_hotel'] = Hotel::count();
            // return view('frontend.index2', $data);
            return view('frontend.frontend2.index',$data);
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

    public function struktur()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.struktur_organisasi', $data);
    }
    public function tentang_kami()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend2.tentang_kami', $data);
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
        return view('frontend.frontend2.tim_kami', $data);
    }
    public function kontak()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend2.kontak', $data);
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

            if($roles){
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
        return view('frontend.frontend2.partnership');
    }

    public function hotel()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['hotels'] = Hotel::paginate(18);

        // dd($data['hotelss']);
        return view('frontend.frontend2.hotel', $data);
    }
    public function hotel_detail($slug)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['hotels'] = Hotel::where('slug',$slug)->first();
        $data['kamar_hotels'] = KamarHotel::where('hotel_id',$data['hotels']['id'])->get();
        // dd($data['kamar_hotels']);
        return view('frontend.frontend2.hotelDetail', $data);
    }

    public function kamar_hotel_detail($slug,$slug_kamar)
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['kamar_hotels'] = KamarHotel::join('room_hotel','room_hotel.kamar_hotel_id','kamar_hotel.id')
                                ->select('kamar_hotel.hotel_id','kamar_hotel.slug','kamar_hotel.nama_kamar','kamar_hotel.deskripsi_kamar','kamar_hotel.price','room_hotel.jumlah_kamar')
                                ->where('kamar_hotel.slug',$slug_kamar)
                                ->first();
        // $data['kamar_hotels'] = KamarHotel::where('slug',$slug_kamar)->first();
        // dd($data);
        return view('frontend.frontend2.kamar_hotel_detail',$data);
    }

    public function payment()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend2.payment',$data);
    }
}
