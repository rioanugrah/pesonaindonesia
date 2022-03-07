<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KamarHotel;
use App\Models\Hotel;

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
}
