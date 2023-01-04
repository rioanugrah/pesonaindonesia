<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketList;
use App\Models\PaketOrder;
class PaketController extends Controller
{
    public function paket()
    {
        $paket = PaketList::all();
        foreach ($paket as $key => $pk) {
            $pakets[] = [
                'id' => $pk->id,
                'kategori_id' => $pk->kategori_id,
                'paket_id' => $pk->paket_id,
                'nama_paket' => $pk->nama_paket,
                'jumlah_paket' => $pk->jumlah_paket,
                'price' => $pk->price,
                'diskon' => $pk->diskon,
                'images' => asset('frontend/assets4/img/paket/list/'.$pk->images),
            ];
        };
        $data['jelajahins'] = [
            [
                'row' => true,
                'data' => [
                    [
                        'column' => 'col-lg-12 mb-4',
                        'country' => 'Indonesia',
                        'title' => 'Surabaya',
                        'tour' => 0,
                        'image' => asset('frontend/assets5/images/image/surabaya.webp')
                    ],
                    [
                        'column' => 'col-lg-6 col-md-6 col-sm-6 mb-4',
                        'country' => 'Indonesia',
                        'title' => 'Yogyakarta',
                        'tour' => 0,
                        'image' => asset('frontend/assets5/images/image/yogyakarta.webp')
                    ],
                    [
                        'column' => 'col-lg-6 col-md-6 col-sm-6 mb-4',
                        'country' => 'Indonesia',
                        'title' => 'Bali',
                        'tour' => 0,
                        'image' => asset('frontend/assets5/images/image/bali.webp')
                    ],
                ]
            ],
            [
                'row' => false,
                'column' => 'col-lg-5 mb-4',
                'country' => 'Indonesia',
                'title' => 'Kota Malang',
                'tour' => 0,
                'image' => asset('frontend/assets5/images/image/malang.webp')
            ],
        ];
        return response()->json([
            'status' => true,
            'data_row' => $paket->count(),
            'pakets' => $pakets,
            'jelajahins' => $data['jelajahins']
        ]);
    }

    public function paket_order()
    {
        $paket_order = PaketOrder::all();
        foreach ($paket_order as $key => $po) {
            foreach (json_decode($po['pemesan']) as $key => $p) {
                // dd($p);
                $pemesan = $p;
                // dd($data['pemesan']);
            }
            $data[] = [
                'id' => $po->id,
                'nama_paket' => $po->nama_paket,
                'nama_pemesan' => $pemesan->first_name.' '.$pemesan->last_name,
                'qty' => $po->qty,
                'price' => 'Rp. '.number_format($po->price,2,",",".")
            ];
        };
        return response()->json([
            'status' => true,
            'data_row' => $paket_order->count(),
            'data' => $data
        ]);
    }
}
