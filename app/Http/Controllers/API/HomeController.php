<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;


class HomeController extends Controller
{
    public function index()
    {
        // for ($i=0; $i < 5 ; $i++) { 
        //     $data[] = [
        //         'key' => $i+1,
        //         'name' => 'Rio'
        //     ];
        // };

        if(Wisata::exists()){
            $wisatas = Wisata::all();

            // $data1 = array();
    
            foreach ($wisatas as $key => $wisata) {
                $data1[] = [
                    'nama_wisata' => $wisata['nama_wisata'],
                    'image' => asset('image/'.$wisata['image'])
                ];
            };
    
            return response()->json([
                'data' => $data1,
                // 'wisata' => $wisatas
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'data' => 'Data Wisata Belum Tersedia'
            ], 200);
        }

    }
}
