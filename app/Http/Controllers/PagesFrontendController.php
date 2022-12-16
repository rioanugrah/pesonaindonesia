<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketList;
use Validator;

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
        // return view('frontend.frontend4.pakets_detail_list',$data);
        return view('frontend.frontend5.paket_wisata_detail',$data);
        // return $id.' '.$slug;
    }
    public function review_save(Request $request)
    {
        $rules = [
            'nama'  => 'required',
            'email' => 'required',
            'comment' => 'required',
            'star' => 'required',
        ];
 
        $messages = [
            'nama.required'   => 'Silahkan isi nama terlebih dahulu',
            'email.required'   => 'Silahkan isi email terlebih dahulu',
            'comment.required'   => 'Silahkan isi komentar terlebih dahulu',
            'star.required'   => 'Silahkan isi Rating terlebih dahulu',
        ];
    }
}
