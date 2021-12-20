<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role != 2){
            return redirect('/');
        }else{
            $data['total_users'] = User::count();
            // return view('layouts.backend_3.app', $data);
            return view('backend.home.index_new', $data);
        }
        // return view('backend.home.home2');
    }
}
