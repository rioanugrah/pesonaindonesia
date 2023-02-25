<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $posts= \App\Models\Post::orderBy('created_at','desc')->get();
	 
	  return response()->view('frontend.frontend4.sitemap', [
	      'posts' => $posts,
	  ])->header('Content-Type', 'text/xml');
    }

    // public function create()
    // {
    //     $create_sitemap = \App\Models\Post::create([
    //         'title' => url('hotel'),
    //         'slug' => '-',
    //         'body' => '-'
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'data' => $create_sitemap
    //     ]);
    // }
}
