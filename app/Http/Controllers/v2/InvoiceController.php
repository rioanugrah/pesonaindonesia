<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\v2\Invoice;
use App\Models\v2\InvoiceKategori;
use DataTables;
use Validator;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Invoice::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                $btn = '<div class="btn-group">';
                                // $btn .= '<a href='.route('tour.edit',['id' => $row->id]).' class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                                $btn .= '<button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>';
                                $btn .= '</div>';
                                return $btn;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }
        return view('backend_new_2023.invoice.index');
    }

    public function create()
    {
        return view('backend_new_2023.invoice.create');
    }

    public function detail($kode_order)
    {
        $data['order'] = Order::where('kode_order',$kode_order)->first();
        if(empty($data['order'])){
            return redirect()->back();
        }
        return view('invoice.travelling_new',$data);
    }
}
