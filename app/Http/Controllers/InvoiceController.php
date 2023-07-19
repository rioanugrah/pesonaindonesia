<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketOrder;
use App\Models\PaketOrderList;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Perusahaan;

class InvoiceController extends Controller
{
    public function tiket_wisata($id)
    {
        $data['paket'] = PaketOrder::find($id);
        $data['perusahaan'] = Perusahaan::first();
        // $data['perusahaan'] = Perusahaan::first();
        $data['paketLists'] = PaketOrderList::where('order_paket_id',$id)->get();
        return view('invoice.tiket',$data);
    }

    public function invoice_travelling($kode_order)
    {
        $data['order'] = Order::where('kode_order',$kode_order)->first();
        if(empty($data['order'])){
            return redirect()->back();
        }

        $data['order_details'] = OrderList::where('order_id',$data['order']['id'])->get();

        // return view('invoice.travelling',$data);
        return view('invoice.travelling_new',$data);
    }
}
