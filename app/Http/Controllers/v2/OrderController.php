<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use \App\Models\Order;
use \App\Models\OrderList;

use DataTables;
use Validator;
use DB;
use File;
use PDF;
use \Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('kategori_paket_id', function($row){
                    //     return $row->kategoriPaket->kategori_paket;
                    // })
                    // ->addColumn('images', function($row){
                    //     return '<img src='.asset('frontend/assets_new/images/travelling/'.$row->images).' width="150">';
                    // })
                    ->addColumn('kode_order', function($row){
                        if($row->status == 'Unpaid'){
                            // return '<span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>';
                            return $row->kode_order.' <span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                        }elseif($row->status == 'Paid'){
                            // return '<span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>';
                            return $row->kode_order.' <span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                        }elseif($row->status == 'Not Paid'){
                            // return '<span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>';
                            return $row->kode_order.' <span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                        }
                        // return $row->kode_order.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                        // return $row->created_at->isoFormat('LLLL');
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,2,",",".");
                    })
                    ->addColumn('pemesan', function($row){
                        $pemesan = json_decode($row->pemesan);
                        $card = '';
                        $card .= '<div class="d-flex align-items-start">';
                        $card .=    '<div class="flex-grow-1 align-self-center">';
                        $card .=        '<p class="mb-2">Nama</p>';
                        $card .=        '<h6 class="mb-0">'.'1. '.$pemesan->first_name.' '.$pemesan->last_name.'</h6>';
                        // $card .=        '<p class="mb-2 mt-2">Alamat</p>';
                        // $card .=        '<h6 class="mb-0">'.'2. '.$pemesan->address.'</h6>';
                        // $card .=        '<p class="mb-2 mt-3">Email</p>';
                        // $card .=        '<h6 class="mb-0">'.'2. '.$pemesan->email.'</h6>';
                        $card .=        '<p class="mb-2 mt-3">No.Telp / Whatsapp</p>';
                        $card .=        '<h6 class="mb-0">'.'2. '.$pemesan->phone.'</h6>';
                        $card .=    '</div>';
                        $card .= '</div>';

                        return $card;
                        // return 'Pemesan :'.$pemesan->first_name;
                    })
                    // ->addColumn('status', function($row){
                    //     if($row->status == 'Unpaid'){
                    //         return '<span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>';
                    //     }elseif($row->status == 'Paid'){
                    //         return '<span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>';
                    //     }elseif($row->status == 'Not Paid'){
                    //         return '<span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>';
                    //     }
                    // })
                    ->addColumn('action', function($row){
                        // $btn = '<a href="'.route('travelling.edit',['id' => $row->id]).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        //         <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                        //             <i class="fas fa-trash"></i>
                        //         </button>';
                        // return $btn;
                        $btn = '<div class="btn-group">';
                        $btn .= '<a href='.route('b.invoice.detail',['kode_order' => $row->kode_order]).' target="_blank" class="btn btn-xs btn-primary"><i class="uil-file-alt"></i> Invoice</a>';
                        $btn .= '<button class="btn btn-xs btn-success"><i class="uil-eye"></i> Detail Pembelian</button>';
                        $btn .= '</div>';
                        return $btn;
                    })
                    ->rawColumns(['action','pemesan','kode_order'])
                    ->make(true);
        }
        return view('backend_new_2023.order.index');
    }
}
