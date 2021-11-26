<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;


class HomeController extends Controller
{
    public function index()
    {
        for ($i=0; $i < 5 ; $i++) { 
            $data[] = [
                'key' => $i+1,
                'name' => 'Rio'
            ];
        };

        $wisatas = Wisata::all();

        foreach ($wisatas as $key => $wisata) {
            $data1[] = [
                'nama_wisata' => $wisata['nama_wisata'],
                'image' => asset('image/'.$wisata['image'])
            ];
        };

        return response()->json([
            'data' => $data1,
            'wisata' => $data1
        ]);
    }
}
