<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use \Carbon\CarbonPeriod;

use App\Models\Bromo;

class BromoController extends Controller
{
    function __construct(
        Bromo $bromo
    ){
        $this->bromo = $bromo;
    }
    public function index()
    {
        $today = Carbon::today();
        $week_start = $today->startOfWeek()->format('Y-m-d');
        $week_end= $today->endOfWeek()->format('Y-m-d');
        $schedule_bromos = CarbonPeriod::create($week_start,$week_end);
        foreach ($schedule_bromos as $schedule_bromo) {
            $jadwal_bromos = $this->bromo->whereDate('tanggal',$schedule_bromo->format('Y-m-d'))->get();
            foreach ($jadwal_bromos as $jadwal_bromo) {
                $data['data'][] = [
                    'id' => $jadwal_bromo->id,
                    'date' => Carbon::create($jadwal_bromo->tanggal)->isoFormat('LL'),
                    'time' => Carbon::create($jadwal_bromo->tanggal)->format('H:i'),
                    'slug' => $jadwal_bromo->slug,
                    'title' => $jadwal_bromo->title,
                    'meeting_point' => $jadwal_bromo->meeting_point,
                    'category_trip' => $jadwal_bromo->category_trip,
                    'quota' => $jadwal_bromo->quota,
                    'max_quota' => $jadwal_bromo->max_quota,
                    'price' => 'Rp. '.number_format($jadwal_bromo->price,0,',','.'),
                    'discount' => $jadwal_bromo->discount,
                ];
            }
        }
        // for ($i=$week_start; $i <= $week_end; $i++) { 
        //     $schedule_bromos = $this->bromo->whereDate('tanggal',$i)->get();
        //     foreach ($schedule_bromos as $key => $schedule_bromo) {
        //         $data['data'][] = [
        //             'id' => $schedule_bromo->id,
        //             'date' => Carbon::create($schedule_bromo->tanggal)->isoFormat('LL'),
        //             'time' => Carbon::create($schedule_bromo->tanggal)->format('H:i'),
        //             'slug' => $schedule_bromo->slug,
        //             'title' => $schedule_bromo->title,
        //             'meeting_point' => $schedule_bromo->meeting_point,
        //             'category_trip' => $schedule_bromo->category_trip,
        //             'quota' => $schedule_bromo->quota,
        //             'max_quota' => $schedule_bromo->max_quota,
        //             'price' => 'Rp. '.number_format($schedule_bromo->price,0,',','.'),
        //             'discount' => $schedule_bromo->discount,
        //         ];
        //     }
        // }
        return $data;
        // $brommo = $this->bromo->
        // $events = Events::orderBy('created_at','desc')->get();

        // foreach ($events as $key => $event) {
        //     $data[] = [
        //         'id' => $event->id,
        //         'slug' => $event->slug,
        //         'title' => $event->title,
        //         'deskripsi' => strip_tags($event->deskripsi),
        //         'location' => $event->location,
        //         'start' => $event->start_event,
        //         'finish' => $event->finish_event,
        //         'quota' => $event->kuota,
        //         'images' => asset('frontend/assets4/img/events/'.$event->image),
        //         'created_at' => Carbon::create($event->created_at)->format('d M Y')
        //     ];
        // }
        // return response()->json([
        //     'success' => true,
        //     'data' => $data
        // ],200);
    }
}
