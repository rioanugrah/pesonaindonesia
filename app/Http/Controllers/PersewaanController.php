<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Persewaan;
use App\Models\PersewaanArmada;
use App\Models\PersewaanSpesifikasi;
use App\Models\PersewaanHarga;

use App\Models\KategoriPersewaan;
use App\Models\KabupatenKota;
use App\Models\Provinsi;
use DataTables;
use Validator;

class PersewaanController extends Controller
{
    public function bus(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->role == 1 || auth()->user()->role == 2){
                $data = Persewaan::where('kategori_persewaan_id',1)->get();
            }else{
                $data = Persewaan::where('user_id',auth()->user()->id)
                                ->where('kategori_persewaan_id',1)
                                ->get();
            }
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('kode_persewaan', function($row){
                        return '<span class="badge bg-success">'.$row->kode_persewaan.'</span>';
                    })
                    ->addColumn('action', function($row){
                        // $slug = Str::slug($row->role,'-');
                        $btn = '<button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action','kode_persewaan'])
                    ->make(true);
        }
        return view('backend.persewaan.bus.bus');
    }

    public function bus_create()
    {
        // $data['kategori_persewaans'] = KategoriPersewaan::where('id',1)->get();
        // $data['kab_kotas'] = KabupatenKota::all();
        $data['provinsis'] = Provinsi::pluck('nama','id');
        return view('backend.persewaan.bus.buat',$data);
    }

    public function bus_simpan(Request $request)
    {
        $rules = [
            'nama_barang'  => 'required',
            'provinsi'  => 'required',
            'kab_kota'  => 'required',
            'images'  => 'required|file|max:2048',
            // 'email'  => 'required|unique:cooperation',
        ];
 
        $messages = [
            'nama_barang.required'  => 'Nama Persewaan wajib diisi.',
            'provinsi.required'  => 'Inputan Provinsi wajib diisi.',
            'kab_kota.required'  => 'Inputan Kabupaten Kota wajib diisi.',
            'images.required'  => 'Upload Gambar wajib diisi.',
            'images.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $kategori_persewaan = KategoriPersewaan::where('id',1)->first();
            $norut = Persewaan::max('kode_persewaan');
            if(empty($norut)){
                $nomor_urut = 0;
            }else{
                $explode_norut = explode("-",$norut);
                $nomor_urut = $explode_norut[1];
            }
            //Kategori Sewa
            $kode_sewa = 'SW';
            $input['kode_persewaan'] = $kode_sewa.'-'.sprintf("%03s",$nomor_urut+1).'-'.date('mY');
            $input['kategori_persewaan_id'] = $kategori_persewaan->id;
            $input['user_id'] = auth()->user()->id;
    
            if ($request->file('images')) {
                $image = $request->file('images');
                $img = \Image::make($image->path());
                $img = $img->encode('webp', 75);
                $input['images'] = $input['kode_persewaan'].'.webp';
                $img->save(public_path('backend/persewaan/').$input['images']);
            }
    
            $persewaan = Persewaan::create($input);
    
            foreach ($request['outer-armada'][0] as $key => $oa) {
                foreach ($oa as $key => $value_armada) {
                    PersewaanArmada::create([
                        'persewaan_id' => $persewaan->id,
                        'armada' => $value_armada['armada']
                    ]);
                }
            }
            foreach ($request['outer-spesifikasi'][0] as $key => $os) {
                foreach ($os as $key => $value_spesifikasi) {
                    PersewaanSpesifikasi::create([
                        'persewaan_id' => $persewaan->id,
                        'icon' => $value_spesifikasi['icon'],
                        'spesifikasi' => $value_spesifikasi['spesifikasi'],
                    ]);
                }
            }
            foreach ($request['outer-harga'][0] as $key => $oh) {
                foreach ($oh as $key => $value_harga) {
                    PersewaanHarga::create([
                        'persewaan_id' => $persewaan->id,
                        'deskripsi' => $value_harga['deskripsi'],
                        'harga' => $value_harga['harga'],
                        'satuan' => $value_harga['satuan'],
                    ]);
                }
            }
    
            if($persewaan){
                $message_title="Berhasil !";
                $message_content="Persewaan Berhasil Dibuat";
                $message_type="success";
                $message_succes = true;
            }
    
            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return redirect()->route('persewaan.bus')->with($array_message);
            // return response()->json($array_message);
            // dd($input);
        }
        dd($validator->errors()->all());
        // return redirect()->back()->with([
        //     'success' => false,
        //     'error' => $validator->errors()->all()
        // ]);
    }

}
