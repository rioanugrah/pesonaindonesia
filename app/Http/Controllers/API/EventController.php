<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
                'deskripsi' => $event->deskripsi,
                'location' => $event->location,
                'start' => $event->start_event,
                'finish' => $event->finish_event,
                'quota' => $event->kuota
            ];
        }
        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
    }
}
