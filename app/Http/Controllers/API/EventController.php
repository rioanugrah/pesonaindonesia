<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Carbon\Carbon;

use App\Models\v2\Events;

class EventController extends Controller
{
    function __construct(
        Events $event
    ){
        $this->event = $event;
    }

    public function index()
    {
        $events = $this->event->orderBy('created_at','desc')->get();

        foreach ($events as $key => $event) {
            foreach (json_decode($event->schedules) as $key => $schedules) {
                $today = strtotime(Carbon::now()->format('d-m-Y H:i'));
                $endSchedule = strtotime(Carbon::create($schedules->time)->format('d-m-Y H:i'));
                $dataSchedule[] = [
                    'day' => $schedules->day,
                    'time' => Carbon::create($schedules->time)->format('d-m-Y H:i'),
                    'status' => $today.' - '.$endSchedule
                    // 'status' => $today <= $endSchedule ? 'Open' : 'Close'
                ];
            }
            $data[] = [
                'id' => $event->id,
                'slug' => $event->slug,
                'title' => $event->title,
                'description' => strip_tags($event->description),
                'team_lead' => $event->team_lead,
                'schedule' => $dataSchedule,
                'cover_image' => asset('events/cover/'.$event->cover_image),
                'location' => $event->location,
                // 'location' => $event->location,
                // 'start' => $event->start_event,
                // 'finish' => $event->finish_event,
                // 'quota' => $event->kuota,
                // 'images' => asset('frontend/assets4/img/events/'.$event->image),
                // 'created_at' => Carbon::create($event->created_at)->format('d M Y')
            ];
        }
        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
    }
}
