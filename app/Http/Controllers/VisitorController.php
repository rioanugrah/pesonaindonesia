<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use DB;
use File;
use \Carbon\Carbon;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('shetabit_visits')->orderBy('created_at','DESC')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('method', function($row){
                        if ($row->method == 'GET') {
                            return '<span class="badge bg-success">'.$row->method.'</span>';
                        }elseif($row->method == 'POST'){
                            return '<span class="badge bg-primary">'.$row->method.'</span>';
                        }
                    })
                    // ->addColumn('price', function($row){
                    //     return 'Rp. '.number_format($row->price,2,",",".");
                    // })
                    // ->addColumn('diskon', function($row){
                    //     return $row->diskon.'%';
                    // })
                    // ->addColumn('total_harga', function($row){
                    //     return 'Rp. '.number_format($row->price-($row->diskon/100)*$row->price,2,",",".");
                    // })
                    // ->addColumn('kategori_paket_id', function($row){
                    //     return $row->kategoriPaket->kategori_paket;
                    // })
                    // ->addColumn('status', function($row){
                    //     if($row->status == 'Y'){
                    //         return 'Aktif';
                    //     }else{
                    //         return 'Tidak Aktif';
                    //     }
                    // })
                    // ->addColumn('action', function($row){
                    //     $btn = '<a href='.route('paket.list',['id' => $row->id]).' class="btn btn-secondary btn-sm" title="Paket List">
                    //                 <i class="fas fa-list"></i> Paket List
                    //             </a>
                    //             <button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                    //                 <i class="fas fa-pencil-alt"></i>
                    //             </button>
                    //             <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                    //                 <i class="fas fa-trash"></i>
                    //             </button>';
                    //     return $btn;
                    // })
                    ->rawColumns(['action','method'])
                    ->make(true);
        }
        return view('backend.visitor.index');
    }
}