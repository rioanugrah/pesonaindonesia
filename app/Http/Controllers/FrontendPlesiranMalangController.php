<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\KamarHotel;
use App\Models\FasilitasUmumHotel;
use App\Models\ContactUs;
use App\Models\Transaksi;

class FrontendPlesiranMalangController extends Controller
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
        $data['whatsapp'] = $this->whatsapp;
        $data['hotels'] = Hotel::where('provinsi',35)->paginate(9);

        return view('frontend.plesiran_malang.index',$data);
    }

    public function hotel()
    {
        $data['whatsapp'] = $this->whatsapp;
        $data['hotels'] = Hotel::where('provinsi',35)->paginate(18);

        // dd($data['hotelss']);
        // return view('frontend.frontend2.hotel', $data);
        return view('frontend.plesiran_malang.hotel', $data);

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
}
