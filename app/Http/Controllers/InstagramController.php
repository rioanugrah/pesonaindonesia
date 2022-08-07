<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function index(Request $request)
    {
     $items = [];

     $input = 'pesonaplesiranid.official';

     $client = new \GuzzleHttp\Client;
     $url = sprintf('https://www.instagram.com/%s/media', $input);
    //  $request->input('pesonaplesiranid.official'));
     $response = $client->get($url);
     $items = json_decode((string) $response->getBody(), true)['items'];

    //  if($request->input('pesonaplesiranid.official')){
    //     $client = new \GuzzleHttp\Client;
    //     $url = sprintf('https://www.instagram.com/%s/media', 
    //     $request->input('pesonaplesiranid.official'));
    //     $response = $client->get($url);
    //     $items = json_decode((string) $response->getBody(), true)['items'];
    //  }

     return $items;

    //  return view('instagram',compact('items'));
    }
}