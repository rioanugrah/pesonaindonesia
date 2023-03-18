<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Vendors;
use App\Models\VendorsProduct;
use DataTables;
use Validator;
use File;
use \Carbon\Carbon;

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

    public function detail_produk(Request $request, $kode_vendor)
    {
        // $data['vendors'] = Vendors::where('kode_vendor',$kode_vendor)->first();
        // if(empty($data['vendors'])){
        //     return redirect()->back()->with('error','Data tidak ditemukan');
        // }
        // return view('backend.vendors.detail.detail_produk',$data);
        // $vendors = Vendors::where('kode_vendor',$kode_vendor)->first();
        // $data = VendorsProduct::where('vendors_id',$vendors->id)->get();
        // dd($data);
        if ($request->ajax()) {
            $vendors = Vendors::where('kode_vendor',$kode_vendor)->first();
            $data = VendorsProduct::where('vendors_id',$vendors->id)->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('deskripsi', function($row){
                    //     return substr($row->deskripsi, 0, 50);
                    // })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,2,",",".");
                    })
                    ->addColumn('discount', function($row){
                        return $row->discount.'%';
                    })
                    ->addColumn('images', function($row){
                        return '<img src='.asset('backend_2/images/vendors/'.$row->vendors->kode_vendor.'/'.$row->images).' width="150">';
                    })
                    // ->addColumn('total_harga', function($row){
                    //     return 'Rp. '.number_format($row->price-($row->diskon/100)*$row->price,2,",",".");
                    // })
                    // ->addColumn('kategori_paket_id', function($row){
                    //     return $row->kategoriPaket->kategori_paket;
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<a href="" class="btn btn-secondary btn-sm" title="Paket List">
                                    <i class="fas fa-list"></i> Paket List
                                </a>
                                <button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action','images'])
                    ->make(true);
        }

        $data['vendors'] = Vendors::where('kode_vendor',$kode_vendor)->first();
        if(empty($data['vendors'])){
            return redirect()->back()->with('error','Data tidak ditemukan');
        }
        return view('backend.vendors.detail.detail_produk',$data);
    }

    public function detail_create($kode_vendor)
    {
        $data['kode_vendor'] = $kode_vendor;
        return view('backend.vendors.detail.create',$data);
        // return $kode_vendor;
    }

    public function detail_simpan(Request $request, $kode_vendor)
    {
        $rules = [
            'kode_produk'  => 'required',
            'nama_produk'  => 'required',
            'deskripsi'  => 'required',
            'price'  => 'required',
            // 'discount'  => 'required',
            'images'  => 'required',
        ];
 
        $messages = [
            'kode_produk.required'  => 'Kode Produk wajib diisi.',
            'nama_produk.required'  => 'Nama Produk wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'price.required'  => 'Harga wajib diisi.',
            // 'discount.required'  => 'Perusahaan wajib diisi.',
            'images.required'  => 'Upload Gambar wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $id_vendor = Vendors::where('kode_vendor',$kode_vendor)->first();
            $input['vendors_id'] = $id_vendor->id;
            
            if(!File::exists(public_path('backend_2/images/vendors/'.$kode_vendor))){
                File::makeDirectory(public_path('backend_2/images/vendors/'.$kode_vendor),0777, true, true);
            }

            $image = $request->file('images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['images'] = $request->kode_produk.'.webp';
            $img->save(public_path('backend_2/images/vendors/'.$kode_vendor.'/'.$input['images']));
            
            $vendors_detail = VendorsProduct::create($input);

            if($vendors_detail){
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
}
