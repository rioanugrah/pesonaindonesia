<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Transactions;
use DataTables;
use \Carbon\Carbon;

class LaporanKeuanganController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:finance-list', ['only' => ['laporan_transaksi']]);
        // $this->middleware('permission:posting-create', ['only' => ['create']]);
    }
    public function laporan_transaksi(Request $request)
    {
        if ($request->ajax()) {
            $data = Transactions::all();
            return DataTables::of($data)
                            ->addColumn('kode_order', function($row){
                                return $row->transaction_code;
                            })
                            ->addColumn('created_at', function($row){
                                return $row->created_at->format('Y-m-d');
                            })
                            ->addColumn('keterangan', function($row){
                                return $row->transaction_unit;
                            })
                            ->addColumn('nominal', function($row){
                                return 'Rp.'.number_format($row->transaction_price,0,',','.');
                            })
                            ->addColumn('status', function($row){
                                if($row->status == 'Unpaid'){
                                    return '<span class="badge bg-warning"><i class="uil-postcard"></i> '.strtoupper($row->status).'</span>';
                                }elseif($row->status == 'Paid'){
                                    return '<span class="badge bg-success"><i class="uil-check-circle"></i> '.strtoupper($row->status).'</span>';
                                }elseif($row->status == 'Not Paid'){
                                    return '<span class="badge bg-danger"><i class="uil-times-circle"></i> '.strtoupper($row->status).'</span>';
                                }
                            })
                            ->rawColumns(['kode_order','status'])
                            ->make(true);
        }
        return view('backend_new_2023.finance.laporan_transaksi.index');
    }
}
