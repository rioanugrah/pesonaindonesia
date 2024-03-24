<?php

namespace App\Http\Controllers\Frontend\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\v2\TransaksiPaketWisata;

class TourController extends Controller
{
    function __construct(
        TransaksiPaketWisata $transaksi_paket_wisata
    ){
        $this->transaksi_paket_wisata = $transaksi_paket_wisata;
    }
    public function index()
    {
        $data['paket_wisatas'] = $this->transaksi_paket_wisata->orderBy('created_at','desc')->get();
        return view('frontend.frontend5.tour.index',$data);
    }
}
