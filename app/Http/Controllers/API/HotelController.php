<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KamarHotel;
use App\Models\Hotel;

use HTTP_Request2;

class HotelController extends Controller
{
    public function index()
    {
        if (Hotel::exists()) {
            $hotels = Hotel::all();

            foreach ($hotels as $key => $hotel) {
                $average_kamar_hotel = KamarHotel::where('hotel_id',$hotel->id)->avg('price');
                $data[] = [
                    'nama_hotel' => $hotel->nama_hotel,
                    'alamat_hotel' => $hotel->alamat,
                    'deskripsi_hotel' => $hotel->deskripsi,
                    'layanan_hotel' => $hotel->layanan,
                    'provinsi' => $hotel->provinsis->nama,
                    'kota_kabupaten' => $hotel->kotas->nama,
                    'kecamatan' => $hotel->kecamatans->nama,
                    'ppn' => $hotel->ppn,
                    'price' => 'Rp. '.number_format($average_kamar_hotel,0,",","."),
                ];
            }
            
            return response()->json([
                'status' => true,
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'data' => 'Data Hotel Belum Tersedia'
            ], 200);
        };
    }

    public function list_hotel()
    {
        $client = new HTTP_Request2();
            
        $client->setUrl('https://booking-com.p.rapidapi.com/v1/static/hotels');
        
        $client->setMethod(HTTP_Request2::METHOD_GET);
        
        $client->setConfig(array(
        'follow_redirects' => TRUE
        ));
        
        $client->setHeader(array(
        'X-RapidAPI-Host' => env('X_RAPIDAPI_HOST'),
        'X-RapidAPI-Key' => env('X_RAPIDAPI_KEY'),
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
        ));

        try {
            $response = $client->send();
            $list_hotels = json_decode($response->getBody(), true);
            foreach ($list_hotels as $key => $list_hotel) {
                $data = $list_hotel;
            }
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
            // return $list_hotels['result'];
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'data' => 'Data belum tersedia'
            ]);
        }
    }
}
