<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return view('apps.hotel.index');
    }

    public function detail($slug)
    {
        return view('apps.hotel.detail');
    }
}
