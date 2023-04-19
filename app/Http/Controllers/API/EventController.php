<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Carbon\Carbon;

use App\Models\Events;

class EventController extends Controller
{
    public function index()
    {
        $events = Events::orderBy('created_at','desc')->get();

        foreach ($events as $key => $event) {
            $data[] = [
                'id' => $event->id,
                'slug' => $event->slug,
                'title' => $event->title,
                'deskripsi' => strip_tags($event->deskripsi),
                'location' => $event->location,
                'start' => $event->start_event,
                'finish' => $event->finish_event,
                'quota' => $event->kuota,
                'images' => asset('frontend/assets4/img/events/'.$event->image),
                'created_at' => Carbon::create($event->created_at)->format('d M Y')
            ];
        }
        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
    }
}
