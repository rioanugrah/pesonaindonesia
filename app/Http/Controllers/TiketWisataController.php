<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TiketWisata;
use App\Models\TiketWisataDetail;
use DataTables;
use Validator;

class TiketWisataController extends Controller
{
    public function index_tiket_wisata(Request $request)
    {
        if ($request->ajax()) {
            $data = TiketWisata::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function($row){
                        return $row->user->name;
                    })
                    ->addColumn('wisata', function($row){
                        return $row->wisata->nama_wisata;
                    })
                    ->addColumn('total', function($row){
                        return 'Rp. '.number_format($row->total,2,',','.');
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href=tiket_wisata/'.$row->id.'/'.$row->created_at.' target="_black" type="button" class="btn btn-success btn-icon">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href='.$row->created_at.' type="button" class="btn btn-warning btn-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-icon">
                                    <i class="fa fa-trash"></i>
                                </button>';
                        //    $btn = '<button onclick="show('.$row->id.')" class="btn btn-warning dim"><i class="fa fa-edit"></i></button>';
                        //    $btn = $btn.'<button class="btn btn-danger dim" onclick="hapus('.$row->id.')"><i class="fa fa-trash"></i></button>';
         
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.ticket.index_tiket_wisata');
    }

    public function simpan(Request $request)
    {
        //
    }

    public function cekTiket($id)
    {
        $cek_tiket = TiketWisata::where('id', $id)
                                // ->whereYear('created_at', $created_at)
                                ->where('user_id', auth()->user()->id)
                                ->first();
        // dd($cek_tiket);
        if(empty($cek_tiket)){
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }else{
            $data['cek_tiket'] = TiketWisata::where('id',$id)->where('user_id', auth()->user()->id)->first();
            $data['cek_tiket_detail'] = TiketWisataDetail::where('tiket_wisata_id',$cek_tiket->id)->get();
            // $cek_tiket_detail = TiketWisataDetail::where('tiket_wisata_id',$cek_tiket->id)->get();
            return view('backend.ticket.tiket_wisata', $data);
        }
    }
}
