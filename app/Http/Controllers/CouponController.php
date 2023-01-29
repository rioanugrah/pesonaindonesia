<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\Coupons;
use \App\Models\CouponsDetails;
use \App\Models\CouponsUsed;
use \App\Models\Travelling;
use \Carbon\Carbon;
use DataTables;
use Validator;
use DB;
use File;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Coupons::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('coupons_amount', function($row){
                        return 'Rp. '.number_format($row->coupons_amount,0,',','.');
                    })
                    ->addColumn('coupons_discount', function($row){
                        return $row->coupons_discount.' %';
                    })
                    ->addColumn('coupons_images', function($row){
                        return '<img src="'.asset('frontend/assets5/images/kupon/'.$row->coupons_images).'" width="250">';
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href='.route('coupon.used',['id'=>$row->id]).' class="btn btn-secondary btn-sm" title="Paket List">
                                    <i class="fas fa-list"></i> Coupon Used
                                </a>
                                <button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action','coupons_images'])
                    ->make(true);
        }
        $data['akomodasis'] = DB::table('kategori_akomodasi')->where('status','Y')->get();
        // dd($data);
        return view('backend.coupons.index',$data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'coupons_code'  => 'required',
            'coupons_type'  => 'required',
            'coupons_description'  => 'required',
            'coupons_limit'  => 'required',
            'coupons_expired'  => 'required',
            'coupons_images'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'coupons_code.required'   => 'Kode Kupon wajib diisi.',
            'coupons_type.required'   => 'Jenis Kupon wajib diisi.',
            'coupons_description.required'   => 'Deskripsi wajib diisi.',
            'coupons_limit.required'   => 'Batas Kupon wajib diisi.',
            'coupons_expired.required'   => 'Kupon Kedaluarsa wajib diisi.',
            'coupons_images.required'  => 'Upload Gambar wajib diisi.',
            'coupons_images.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $image = $request->file('coupons_images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['coupons_images'] = 'Kupon '.Carbon::now()->format('d-M-Y h-i-sa').'.webp';
            $img->save(public_path('frontend/assets5/images/kupon/').$input['coupons_images']);

            $kupons = Coupons::create($input);

            if($kupons){
                $message_title="Berhasil !";
                $message_content="Kupon Berhasil Disimpan";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);
        }
        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function kupon_used(Request $request, $id)
    {
        if($request->ajax()){
            $data = CouponsUsed::where('coupons_id',$id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('coupons_id', function($row){
                        return $row->coupon->coupons_code;
                    })
                    ->addColumn('kategori_akomodasi_id', function($row){
                        return $row->kategori_akomodasi->kategori_akomodasi;
                    })
                    ->addColumn('akomodasi_id', function($row){
                        return $row->akomodasi->id;
                        // return $row->akomodasi_id;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data['coupon'] = Coupons::find($id);
        $data['kategori_akomodasis'] = DB::table('kategori_akomodasi')->where('status','Y')->get();
        $data['travellings'] = Travelling::all();
        return view('backend.coupons.used.used',$data);
    }

    public function kupon_used_simpan(Request $request, $id)
    {
        $rules = [
            'kategori_akomodasi_id'  => 'required',
            'akomodasi_id'  => 'required',
            'status'  => 'required',
        ];
 
        $messages = [
            'kategori_akomodasi_id.required'   => 'Kategori Akomodasi wajib diisi.',
            'akomodasi_id.required'   => 'Akomodasi wajib diisi.',
            'status.required'   => 'Status wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['coupons_id'] = $id;

            $coupon_used = CouponsUsed::create($input);
            if($coupon_used){
                $message_title="Berhasil !";
                $message_content="Kupon Berhasil Disimpan";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);
        }
        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function promosi($id)
    {
        $coupon = Coupons::find($id);
        if(empty($coupon)){
            return redirect()->back();
        }
        return view('frontend.frontend5.promo',compact('coupon'));
    }

    public function cek_kupon_used(Request $request, $id)
    {
        $date = Carbon::now()->format('Y-m-d');
        $kupon = Coupons::where('coupons_code',$request->kode_promo)
                        ->where('coupons_expired','>=',$date)
                        ->first();
        // dd($request->all());
        if(empty($kupon)){
            $message_title="Kode Voucher Habis / Tidak Ditemukan";
            $message_content="Kode Voucher Habis / Tidak Ditemukan";
            $message_type="danger";
            $message_succes = false;

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);

        }
        $kupon_used = CouponsUsed::where('akomodasi_id', $id)
                                ->where('coupons_id',$kupon->id)
                                ->first();
        if(empty($kupon_used)){
            $message_title="Kode Voucher Habis / Tidak Ditemukan";
            $message_content="Kode Voucher Habis / Tidak Ditemukan";
            $message_type="danger";
            $message_succes = false;

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return response()->json($array_message);

        }
        $kupon_count_used = CouponsDetails::where('coupons_id',$kupon->id)->count();
        return response()->json([
            'success' => true,
            'data' => [
                'discount' => $kupon_used->coupon->coupons_discount,
                'ammount' => $kupon_used->coupon->coupons_ammount,
                'limit' => $kupon_used->coupon->coupons_limit,
                'expired' => $kupon_used->coupon->coupons_expired,
                'used_limit' => $kupon_count_used
            ]
            // 'data' => $kupon_used
        ],200);
    }
}
