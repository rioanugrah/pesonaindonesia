<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use \Carbon\Carbon;
class FrontendController extends Controller
{
    public function index()
    {
        $coming_soon = true;
        $years = 2021;
        $months = 11;
        $dates = 12;
        $date_coming_soon = $years.'/'.$months.'/'.$dates;
        $date_now = date("Y/m/d");
        // dd($date);

        if($date_now >= $date_coming_soon){
            $data['teams'] = [
                [ 'image' => 'team01.png', 'name' => 'Prasetyo Aji Prakoso S.E, M.M', 'posisi' => 'Advisor' ],
                [ 'image' => 'wahid.jpg', 'name' => 'Nurwahid A.', 'posisi' => 'Chief Executive Officer' ],
                [ 'image' => 'dani.jpg', 'name' => 'Fabrizio D.K', 'posisi' => 'Chief Operational Officer' ],
                [ 'image' => 'bima.jpg', 'name' => 'Bima Gani S. A.Md', 'posisi' => 'Chief Operational Officer' ],
                [ 'image' => 'adit.jpg', 'name' => 'Rio Ramadhan', 'posisi' => 'Chief Operational Officer' ],
                [ 'image' => 'team01.png', 'name' => 'Tri Joko P.', 'posisi' => 'Chief Marketing Officer' ],
                [ 'image' => 'faqeh.jpeg', 'name' => 'Muhammad Arsys', 'posisi' => 'Chief Marketing Officer' ],
                [ 'image' => 'rio.jpg', 'name' => 'Rio Anugrah A.S A.Md.T', 'posisi' => 'Chief Technology Officer' ],
                [ 'image' => 'team01.png', 'name' => 'Kemal Izzuddin A.Md.T', 'posisi' => 'Chief Technology Officer' ],
                [ 'image' => 'tasya.jpg', 'name' => 'Tasya Ayu S.', 'posisi' => 'Chief Finance Officer' ],
            ];
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
            $data['informasi'] = 'info@plesiranindonesia.com';
            $data['whatsapp'] = ['nomor' => '-', 'message' => 'Hello'];
            return view('frontend.index2', $data);
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
}
