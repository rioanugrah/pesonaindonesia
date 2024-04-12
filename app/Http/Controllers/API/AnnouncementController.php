<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    function __construct(
        Announcement $announcement
    ){
        $this->announcement = $announcement;
    }

    public function index()
    {
        $announcements = $this->announcement->where('status','O')->orderBy('created_at','asc')->get();
        if ($announcements->isEmpty()) {
            return response()->json([
                'success' => false
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $announcements
        ],200);
    }
}
