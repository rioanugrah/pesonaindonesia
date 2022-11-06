<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketOrder;
class PaketController extends Controller
{
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
