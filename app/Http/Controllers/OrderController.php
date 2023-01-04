<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->payment_live = env('OY_INDONESIA_LIVE');
        $this->automatics = $this->payment_live;

        $this->username = config('app.oy_username');
        // $this->app_key = config('app.oy_api_key');

        if($this->payment_live == true){
            $this->payment_production = 'https://partner.oyindonesia.com/api/';
            $this->api_key = env('OY_INDONESIA_APP_KEY_LIVE');
        }else{
            $this->payment_production = 'https://api-stg.oyindonesia.com/api/';
            $this->api_key = env('OY_INDONESIA_APP_KEY');
        }
    }

    public function order()
    {
        # code...
    }
}
