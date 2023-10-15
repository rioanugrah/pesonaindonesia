<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\v2\Tour;
use App\Models\Gallery;

use DB;
use HTTP_Request2;

class FrontendController extends Controller
{
    protected $gallery;

    public function __construct(
        Gallery $gallery
    ){
        $this->gallery = $gallery;
    }
    public function home()
    {
        $data['gallerys'] = $this->gallery->all();
        $data['travellings'] = Tour::orderBy('created_at','desc')->paginate(6);
        
        return view('frontend_2023.home',$data);
    }
}
