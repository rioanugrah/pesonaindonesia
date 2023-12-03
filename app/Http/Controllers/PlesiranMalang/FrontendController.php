<?php

namespace App\Http\Controllers\PlesiranMalang;

use App\Http\Controllers\Controller;
use App\Models\PlesiranMalang\Tour;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    function __construct(
        Tour $tour
    ){
        $this->tour = $tour;
    }

    public function index()
    {
        $data['tours'] = $this->tour->all();
        return view('frontend.plesiran_malang_new.home',$data);
    }

    public function tour_detail($id, $slug)
    {
        $data['tour'] = $this->tour->where('id',$id)->where('slug',$slug)->first();
        if (empty($data['tour'])) {
            return redirect()->back();
        }

        return view('frontend.plesiran_malang_new.tour_detail',$data);
    }

    public function contact()
    {
        return view('frontend.plesiran_malang_new.contact');
    }
    
}
