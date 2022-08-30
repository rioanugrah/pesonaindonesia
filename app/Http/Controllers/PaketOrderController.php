<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PaketOrder;
use App\Models\PaketOrderList;
use App\Models\BuktiPembayaran;
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
                            return '<span class="badge bg-danger">Batal</span>';
                        }
                        elseif($row->status == 1){
                            return '<span class="badge bg-secondary">Menunggu Pembayaran</span>';
                        }
                        elseif($row->status == 2){
                            return '<span class="badge bg-warning">Sedang Diproses</span>';
                        }
                        elseif($row->status == 3){
                            return '<span class="badge bg-success">Pembayaran Berhasil</span>';
                        }
                    })
                    ->addColumn('pemesan', function($row){
                        foreach (json_decode($row->pemesan) as $key => $p) {
                            return $p->first_name.' '.$p->last_name;
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
                        $btn = '<button onclick="bukti_pembayaran(`'.$row->id.'`)" class="btn btn-primary btn-sm" title="Bukti Pembayaran">
                                    <i class="fas fa-file-alt"></i> Bukti Pembayaran
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        return view('backend.paket.order.index');
    }

    public function bukti_pembayaran($id)
    {
        $bukti_pembayaran = BuktiPembayaran::find($id);
        if(empty($bukti_pembayaran)){
            return response()->json([
                'status' => false,
                'message' => 'Bukti Pembayaran Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => [
                'images' => '<img src="'.asset('frontend/assets4/img/tf/'.$bukti_pembayaran->images).'" >'
            ]
        ]);

    }

    public function bukti_pembayaran_update(Request $request)
    {
        $bukti_pembayaran = PaketOrder::where('id',$request->bukti_id);
        if($bukti_pembayaran){
            $bukti_pembayaran->update([
                'status' => $request->bukti_status
            ]);
            $message_title="Berhasil !";
            $message_content="Bukti Pembayaran Berhasil Diterima";
            $message_type="success";
            $message_succes = true;
        }else{
            $message_title="Tolak !";
            $message_content="Bukti Pembayaran Ditolak";
            $message_type="success";
            $message_succes = false;
        }
        $array_message = array(
            'success' => $message_succes,
            'message_title' => $message_title,
            'message_content' => $message_content,
            'message_type' => $message_type,
        );
        return response()->json($array_message);
    }
}
