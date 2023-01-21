<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Hotel;
use App\Models\Paket;
use App\Models\PaketOrder;
use App\Models\Order;
use App\User;
use \Carbon\Carbon;
use DB;
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
        $this->payment_live = env('OY_INDONESIA_LIVE');
        $this->username = config('app.oy_username');
        $this->app_key = config('app.oy_api_key');
        if($this->payment_live == true){
            $this->payment_production = 'https://partner.oyindonesia.com/api/';
        }else{
            $this->payment_production = 'https://api-stg.oyindonesia.com/api/';
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function balance()
    {
        $request = new HTTP_Request2();
        $request->setUrl($this->payment_production.'/balance');
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
            $data['total_paket'] = Paket::count();
            // $data['orders'] = PaketOrder::orderBy('created_at','desc')->paginate(10);
            $data['orders'] = Order::orderBy('created_at','desc')->paginate(10);
            $data['devices'] = [
                [
                    'ip' => visitor()->ip(),
                    'browser' => visitor()->browser(),
                    'device' => visitor()->device(),
                    'url' => visitor()->url(),
                    'referer' => visitor()->referer(),
                    'useragent' => visitor()->useragent(),
                    'platform' => visitor()->platform(),
                    'languages' => visitor()->languages(),
                ]
            ];
            $data['visitors'] = DB::table('shetabit_visits')->orderBy('created_at','DESC')->paginate(5);
            foreach ($data['visitors'] as $key => $visitor) {
                $data['visitorss'][] = [
                    'url' => $visitor->url,
                    'method' => $visitor->method,
                    'platform' => $visitor->platform,
                    'device' => $visitor->device,
                    'useragent' => $visitor->useragent,
                    'languages' => $visitor->languages,
                    'visitor' => $visitor->visitor_id == null ? ['name' => '-'] : User::select('name')->where('id',$visitor->visitor_id)->first(),
                    'created_at' => Carbon::create($visitor->created_at)->isoFormat('LLLL'),
                ];
            }
            try {
                $data['balances'] = json_decode((new HomeController)->balance(),true);
                // dd($data['balances']['balance']);
            } catch (\Throwable $th) {
                // dd($data['balances']['balance']=0);
                $data['balances']['balance']=1;
            }
            // dd(json_decode($data['balances'],true));
            // return view('layouts.backend_3.app', $data);
            // return view('backend.home.home3', $data);
            // dd($data);
            return view('backend.home.index_new', $data);
        }
        // return view('backend.home.home2');
    }

    public function servers()
    {
        //RAM usage
        $free = shell_exec('free'); 
        $free = (string) trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $usedmem = $mem[2];
        $usedmemInGB = number_format($usedmem / 1048576, 2) . ' GB';
        $memory1 = $mem[2] / $mem[1] * 100;
        $memory = round($memory1) . '%';
        $fh = fopen('/proc/meminfo', 'r');
        $mem = 0;
        while ($line = fgets($fh)) {
            $pieces = array();
            if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                $mem = $pieces[1];
                break;
            }
        }
        fclose($fh);
        $totalram = number_format($mem / 1048576, 2) . ' GB';

        //cpu usage
        $cpu_load = sys_getloadavg(); 
        $load = $cpu_load[0] . '% / 100%';

        // return view('details',compact('memory','totalram','usedmemInGB','load'));
    }
}