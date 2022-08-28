<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PaketOrder;
use App\Models\PaketOrderList;
use DataTables;

class PaketOrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PaketOrder::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('price', function($row){
                    //     return 'Rp. '.number_format($row->price,2,",",".");
                    // })
                    // ->addColumn('diskon', function($row){
                    //     return $row->diskon.'%';
                    // })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,2,",",".");
                    })
                    ->addColumn('status', function($row){
                        if($row->status == 0){
                            return '<span class="btn btn-danger btn-xs">Menunggu Pembayaran</span>';
                        }
                        elseif($row->status == 1){
                            return '<span class="btn btn-warning btn-xs">Menunggu Pembayaran</span>';
                        }
                        elseif($row->status == 2){
                            return '<span class="btn btn-success btn-xs">Pembayaran Sukses</span>';
                        }
                    })
                    // ->addColumn('status', function($row){
                    //     if($row->status == 'Y'){
                    //         return 'Aktif';
                    //     }else{
                    //         return 'Tidak Aktif';
                    //     }
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('backend.paket.order.index');
    }
}
