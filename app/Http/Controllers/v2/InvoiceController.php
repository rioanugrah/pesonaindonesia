<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Transactions;
use App\Models\v2\Invoice;
use App\Models\v2\InvoiceKategori;
use DataTables;
use Validator;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transactions::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('transaction_price', function($row){
                                return 'Rp. '.number_format($row->transaction_price,0,',','.');
                            })
                            ->addColumn('transaction_code', function($row){
                                if($row->status == 'Unpaid'){
                                    // return '<span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>';
                                    return $row->transaction_code.' <span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                                }elseif($row->status == 'Paid'){
                                    // return '<span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>';
                                    return $row->transaction_code.' <span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                                }elseif($row->status == 'Not Paid'){
                                    // return '<span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>';
                                    return $row->transaction_code.' <span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>'.'<br>'.'<span style="font-size:9pt">'.$row->created_at->isoFormat('LLLL').'</span>';
                                }
                            })
                            ->addColumn('action', function($row){
                                $btn = '<div class="btn-group">';
                                $btn .= '<button onclick="send_invoice(`'.$row->transaction_code.'`)" class="btn btn-primary btn-xs"><i class="fas fa-envelope"></i> Send Invoice</button>';
                                // $btn .= '<a href='.route('tour.edit',['id' => $row->id]).' class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>';
                                // $btn .= '<button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>';
                                $btn .= '</div>';
                                return $btn;
                            })
                            ->rawColumns(['action','transaction_code'])
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
        $data['order'] = Transactions::where('transaction_code',$kode_order)->first();
        if(empty($data['order'])){
            return redirect()->back();
        }
        return view('invoice.travelling_new',$data);
    }

    public function print_pos($kode_order)
    {
        $data['order'] = Transactions::where('transaction_code',$kode_order)->first();
        if(empty($data['order'])){
            return redirect()->back();
        }
        return view('invoice.print_pos',$data);
    }
}
