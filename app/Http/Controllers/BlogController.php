<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->whatsapp = ['nomor' => env('WA_BUSINESS'), 'message' => env('WA_MESSAGE')];
    }
    public function index()
    {
        $data['whatsapp'] = $this->whatsapp;
        return view('frontend.frontend4.blog.blog',$data);
    }
}
