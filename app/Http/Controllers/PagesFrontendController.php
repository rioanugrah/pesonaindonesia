<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketList;

class PagesFrontendController extends Controller
{
    public function __construct()
    {
        $this->whatsapp = ['nomor' => env('WA_BUSINESS'), 'message' => env('WA_MESSAGE')];
    }
    public function detail($slug,$id)
    {
        $data['paket_lists'] = PaketList::find($id);
        $data['whatsapp'] = $this->whatsapp;
        if(empty($data['paket_lists'])){
            return redirect()->back();
        }
        return view('frontend.frontend4.pakets_detail_list',$data);
        // return $id.' '.$slug;
    }
}
