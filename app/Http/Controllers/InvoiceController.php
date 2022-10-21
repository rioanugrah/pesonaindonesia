<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketOrder;
use App\Models\PaketOrderList;
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
}
