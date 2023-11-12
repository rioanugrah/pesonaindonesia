<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\v2\TourOrder;
use \Carbon\Carbon;
use DataTables;
use HTTP_Request2;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->payment_live = env('MIDTRANS_IS_PRODUCTION');
        // $this->username = config('app.oy_username');
        // $this->app_key = config('app.oy_api_key');
        if($this->payment_live == true){
            $this->payment_production = 'https://app.midtrans.com/api/';
            $this->server_key = env('MIDTRANS_SERVER_KEY_LIVE');
        }else{
            $this->payment_production = 'https://app.sandbox.midtrans.com/api/';
            $this->server_key = env('MIDTRANS_SERVER_KEY_DEMO');
        }
    }

    public function balance()
    {
        $request = new HTTP_Request2();
        $request->setUrl($this->payment_production.'/v1/balance');
        $request->setMethod(HTTP_Request2::METHOD_GET);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        // 'x-oy-username:'.$this->username,
        // 'x-api-key:'.$this->app_key,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => $this->server_key
        ));
        try {
        $response = $request->send();
        // dd($response->getBody());
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

    public function index(Request $request)
    {
        // $data['start_month'] = Carbon::now()->startOfYear();
        // $data['now_month'] = Carbon::now();

        // try {
        //     $data['balances'] = json_decode((new HomeController)->balance(),true);
        // } catch (\Throwable $th) {
        //     $data['balances']['balance']=0;
        // }

        // if ($request->ajax()) {
        //     $get_balance = new HTTP_Request2();
        //     $get_balance->setUrl($this->payment_production.'/v1/balance');
        //     $get_balance->setMethod(HTTP_Request2::METHOD_GET);
        //     $get_balance->setConfig(array(
        //     'follow_redirects' => TRUE
        //     ));
        //     $get_balance->setHeader(array(
        //     'Content-Type' => 'application/json',
        //     'Accept' => 'application/json',
        //     'Authorization' => env('MIDTRANS_SERVER_KEY').':'
        //     ));

        //     try {
        //         $response = $request->send();
        //         if ($response->getStatus() == 200) {
        //             return $response->getBody();
        //         }
        //     } catch (\Throwable $th) {
        //         //throw $th;
        //     }
        // }

        $data['periode'] = [];
        $data['tanggals'] = now()->subMonths(12)->monthsUntil(now());
        foreach ($data['tanggals'] as $key => $date) {
            // $data['periode'][] = [
            //     'month' => $date->shortMonthName,
            //     'year' => $date->year,
            // ];
            $data['total_sales_tour'][] = TourOrder::where(\DB::raw("DATE_FORMAT(created_at, '%Y-m')"),$date->format('Y-m'))->count();
            $data['periode'][] = $date->format('m/d/Y');
        }
        $data['label_total_sales_tour'] = json_encode($data['total_sales_tour']);
        $data['label_periode'] = json_encode($data['periode']);
        $total_sales_income = TourOrder::all();
        $data['sales_income'] = $total_sales_income;
        // dd($data);
        // dd(json_encode($data['periode']));
        // dd(json_decode(json_encode($data['periode']),false));
        return view('backend_new_2023.dashboard.index',$data);
    }

    public function ajax_booking_travelling(Request $request)
    {
        $data = TourOrder::all();
        return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<div class="btn-group">';
                        $btn .= '<a class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                        $btn .= '<a class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }
}
