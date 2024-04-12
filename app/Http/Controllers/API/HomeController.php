<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\Hotel;


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

        $wisatas = Wisata::all();
        $hotels = Hotel::all();

        $data = array();

        if(!$wisatas->isEmpty()){
            foreach ($wisatas as $key => $wisata) {
                $data['wisata'][] = [
                    'nama_wisata' => $wisata['nama_wisata'],
                    'image' => asset('image/'.$wisata['image'])
                ];
            };
        }else{
            return response()->json([
                'data' => 'Data Wisata Belum Tersedia'
            ]);
        }

        if(!$hotels->isEmpty()){
            foreach ($hotels as $key => $hotel) {
                $data['hotel'][] = [
                    'nama_hotel' => $hotel['nama_hotel'],
                ];
            };
        }else{
            return response()->json([
                'data' => 'Data Hotel Belum Tersedia'
            ]);
        }

        // foreach ($wisatas as $key => $wisata) {
        //     if(!$wisata->isEmpty()){
        //         return response()->json([
        //             'data' => 'Data Wisata Belum Tersedia'
        //         ]);
        //     }else{
        //         $data['wisata'][] = [
        //             'nama_wisata' => $wisata['nama_wisata'],
        //             // 'image' => asset('image/'.$wisata['image'])
        //         ];
        //     }
        // };

        // foreach ($hotels as $key => $hotel) {
        //     $data['hotel'][] = [
        //         'nama_hotel' => $hotel['nama_hotel'],
        //     ];
        // };

        return response()->json([
            'status' => true,
            // 'data' => $data
            'wisata' => $data['wisata'],
            'hotel' => $data['hotel']
        ], 200);
        // try {
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'status' => false,
        //         'data' => 'Data Wisata Belum Tersedia'
        //     ], 200);
        // }


        // if(Wisata::exists()){
        //     $wisatas = Wisata::all();

        //     // $data1 = array();

        //     foreach ($wisatas as $key => $wisata) {
        //         $data1[] = [
        //             'nama_wisata' => $wisata['nama_wisata'],
        //             'image' => asset('image/'.$wisata['image'])
        //         ];
        //     };

        //     return response()->json([
        //         'data' => $data1,
        //         // 'wisata' => $wisatas
        //     ], 200);
        // }else{
        //     return response()->json([
        //         'status' => false,
        //         'data' => 'Data Wisata Belum Tersedia'
        //     ], 200);
        // }

    }
}
