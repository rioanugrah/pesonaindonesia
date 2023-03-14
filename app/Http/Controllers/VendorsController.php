<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Vendors;
use App\Models\VendorsProduct;
use DataTables;
use Validator;

class VendorsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Vendors::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('deskripsi', function($row){
                    //     return substr($row->deskripsi, 0, 50);
                    // })
                    // ->addColumn('total_harga', function($row){
                    //     return 'Rp. '.number_format($row->price-($row->diskon/100)*$row->price,2,",",".");
                    // })
                    // ->addColumn('kategori_paket_id', function($row){
                    //     return $row->kategoriPaket->kategori_paket;
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<a href='.route('vendors.detail_produk',['kode_vendor' => $row->kode_vendor]).' class="btn btn-secondary btn-sm" title="Paket List">
                                    <i class="fas fa-list"></i> Data Produk
                                </a>
                                <button onclick="edit(`'.$row->kode_vendor.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(``)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data['select_vendors'] = [
            [
                'kode_vendor' => 'RT',
                'nama_vendor' => 'Rental',
            ],
            [
                'kode_vendor' => 'JP',
                'nama_vendor' => 'Jeep',
            ],
            [
                'kode_vendor' => 'WD',
                'nama_vendor' => 'Wedding',
            ],
        ];
        return view('backend.vendors.index',$data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama'  => 'required',
            'alamat'  => 'required',
            'email'  => 'required|unique:vendors',
            'no_telp'  => 'required',
            'perusahaan'  => 'required',
        ];
 
        $messages = [
            'nama.required'  => 'Nama wajib diisi.',
            'alamat.required'  => 'Alamat wajib diisi.',
            'email.required'  => 'Email wajib diisi.',
            'email.unique'  => 'Email sudah ada.',
            'no_telp.required'  => 'No. Telp wajib diisi.',
            'perusahaan.required'  => 'Perusahaan wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            // $jenis_vendor = 'JP-'.date('m-Y');
            $jenis_vendor = $input['jenis_vendor'];
            $norut = Vendors::where('kode_vendor','LIKE',"%{$jenis_vendor}%")->count('kode_vendor');
            // dd($norut);
            if($norut == null){
                $norut = 0;
                // $input['kode_vendor'] = 'V-'.$jenis_vendor.'-'.sprintf("%03s",$norut).'-'.date('m-Y');
            }
            $input['kode_vendor'] = 'V-'.$jenis_vendor.'-'.sprintf("%03s",$norut+1).'-'.date('m-Y');
            $vendors = Vendors::create($input);
            // dd($input);
            if($vendors){
                $message_title="Berhasil !";
                $message_content="Data Vendor Berhasil Dibuat";
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

    public function detail($kode_vendor)
    {
        $vendors = Vendors::where('kode_vendor',$kode_vendor)->first();
        if(empty($vendors)){
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => [
                'kode_vendor' => $vendors->kode_vendor,
                'nama' => $vendors->nama,
                'alamat' => $vendors->alamat,
                'email' => $vendors->email,
                'no_telp' => $vendors->no_telp,
                'perusahaan' => $vendors->perusahaan,
            ]
        ]);
    }

    public function detail_produk($kode_vendor)
    {
        $vendors = Vendors::where('kode_vendor',$kode_vendor)->first();
        if(empty($vendors)){
            return redirect()->back()->with('error','Data tidak ditemukan');
        }
        return $vendors->kode_vendor;
    }

    public function update(Request $request)
    {
        $rules = [
            'edit_nama'  => 'required',
            'edit_alamat'  => 'required',
            'edit_email'  => 'required',
            'edit_no_telp'  => 'required',
            'edit_perusahaan'  => 'required',
        ];
 
        $messages = [
            'edit_nama.required'  => 'Nama wajib diisi.',
            'edit_alamat.required'  => 'Alamat wajib diisi.',
            'edit_email.required'  => 'Email wajib diisi.',
            'edit_no_telp.required'  => 'No. Telp wajib diisi.',
            'edit_perusahaan.required'  => 'Perusahaan wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['nama'] = $request->edit_nama;
            $input['alamat'] = $request->edit_alamat;
            $input['email'] = $request->edit_email;
            $input['no_telp'] = $request->edit_no_telp;
            $vendors = Vendors::where('kode_vendor',$request->edit_kode_vendor)->update($input);
            // dd($input);
            if($vendors){
                $message_title="Berhasil !";
                $message_content="Data Vendor Berhasil Diupdate";
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
}
