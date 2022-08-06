<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Hotel;
use App\User;
use HTTP_Request2;

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
        $this->username = config('app.oy_username');
        $this->app_key = config('app.oy_api_key');
        $this->payment_production = 'https://partner.oyindonesia.com/api/';
        $this->payment_testing = 'https://api-stg.oyindonesia.com/api/';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function balance()
    {
        $request = new HTTP_Request2();
        $request->setUrl($this->payment_testing.'/balance');
        $request->setMethod(HTTP_Request2::METHOD_GET);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        'x-oy-username:'.$this->username,
        'x-api-key:'.$this->app_key,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
        ));
        try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
            return $response->getBody();
            // echo $response->getBody();
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(HTTP_Request2_Exception $e) {
        echo 'Error: ' . $e->getMessage();
        }
    }
    public function index()
    {
        if(auth()->user()->role == '4'){
            return redirect('/');
        }else{
            $data['total_users'] = User::count();
            // $data['wisata'] = Wisata::count();
            $data['hotel'] = Hotel::count();
            try {
                $data['balances'] = json_decode((new HomeController)->balance(),true);
                // dd($data['balances']['balance']);
            } catch (\Throwable $th) {
                // dd($data['balances']['balance']=0);
                $data['balances']['balance']=0;
            }
            // dd(json_decode($data['balances'],true));
            // return view('layouts.backend_3.app', $data);
            // return view('backend.home.home3', $data);
            return view('backend.home.index_new', $data);
        }
        // return view('backend.home.home2');
    }
}
