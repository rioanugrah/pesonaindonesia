<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Wisata;

class HomeController extends Controller
{
    public function index()
    {
        $data['hotels'] = Hotel::inRandomOrder()->limit(6)->get();
        $data['wisatas'] = Wisata::inRandomOrder()->limit(6)->get();
        return view('apps.home.index',$data);
    }
}
