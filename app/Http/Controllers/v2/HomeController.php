<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\v2\TourOrder;
use \Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // $data['start_month'] = Carbon::now()->startOfYear();
        // $data['now_month'] = Carbon::now();
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
        $data['tour_orders'] = TourOrder::paginate(10);
        $total_sales_income = TourOrder::all();
        $data['sales_income'] = $total_sales_income;
        // dd($data);
        // dd(json_encode($data['periode']));
        // dd(json_decode(json_encode($data['periode']),false));
        return view('backend_new_2023.dashboard.index',$data);
    }
}
