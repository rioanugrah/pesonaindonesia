<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travelling;
class TravellingController extends Controller
{
    public function index_v1()
    {
        $travellings = Travelling::all();
        foreach ($travellings as $key => $travelling) {
            $travellingss[] = [
                'id' => $travelling->id,
                'kategori_paket_id' => $travelling->kategori_paket_id,
                'nama_kategori' => $travelling->kategoriPaket->kategori_paket,
                'nama_travelling' => $travelling->nama_travelling,
                'deskripsi' => $travelling->deskripsi,
                'jumlah_paket' => $travelling->jumlah_paket,
                'meeting_point' => $travelling->meeting_point,
                'location' => $travelling->location,
                'contact_person' => $travelling->contact_person,
                'tanggal_rilis' => $travelling->tanggal_rilis,
                'diskon' => $travelling->diskon,
                'price' => $travelling->price,
                'images' => asset('frontend/assets_new/images/travelling/'.$travelling->images),
                'created_at' => $travelling->created_at,
                'updated_at' => $travelling->updated_at,
            ];
        }

        return response()->json([
            'status' => true,
            'data_row' => $travellings->count(),
            'data' => $travellingss
        ]);
    }
    // public function paket()
    // {
    //     $paket = PaketList::all();
    //     foreach ($paket as $key => $pk) {
    //         $pakets[] = [
    //             'id' => $pk->id,
    //             'kategori_id' => $pk->kategori_id,
    //             'paket_id' => $pk->paket_id,
    //             'nama_paket' => $pk->nama_paket,
    //             'jumlah_paket' => $pk->jumlah_paket,
    //             'price' => $pk->price,
    //             'diskon' => $pk->diskon,
    //             'images' => asset('frontend/assets4/img/paket/list/'.$pk->images),
    //         ];
    //     };
    //     $data['jelajahins'] = [
    //         [
    //             'row' => true,
    //             'data' => [
    //                 [
    //                     'column' => 'col-lg-12 mb-4',
    //                     'country' => 'Indonesia',
    //                     'title' => 'Surabaya',
    //                     'tour' => 0,
    //                     'image' => asset('frontend/assets5/images/image/surabaya.webp')
    //                 ],
    //                 [
    //                     'column' => 'col-lg-6 col-md-6 col-sm-6 mb-4',
    //                     'country' => 'Indonesia',
    //                     'title' => 'Yogyakarta',
    //                     'tour' => 0,
    //                     'image' => asset('frontend/assets5/images/image/yogyakarta.webp')
    //                 ],
    //                 [
    //                     'column' => 'col-lg-6 col-md-6 col-sm-6 mb-4',
    //                     'country' => 'Indonesia',
    //                     'title' => 'Bali',
    //                     'tour' => 0,
    //                     'image' => asset('frontend/assets5/images/image/bali.webp')
    //                 ],
    //             ]
    //         ],
    //         [
    //             'row' => false,
    //             'column' => 'col-lg-5 mb-4',
    //             'country' => 'Indonesia',
    //             'title' => 'Kota Malang',
    //             'tour' => 0,
    //             'image' => asset('frontend/assets5/images/image/malang.webp')
    //         ],
    //     ];
    //     return response()->json([
    //         'status' => true,
    //         'data_row' => $paket->count(),
    //         'pakets' => $pakets,
    //         'jelajahins' => $data['jelajahins']
    //     ]);
    // }
}