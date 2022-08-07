<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Paket;
use App\Models\PaketImages;
use DataTables;
use Validator;
use DB;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Paket::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('deskripsi', function($row){
                        return substr($row->deskripsi, 0, 50);
                    })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,2,",",".");
                    })
                    // ->addColumn('status', function($row){
                    //     if($row->status == 'Y'){
                    //         return 'Aktif';
                    //     }else{
                    //         return 'Tidak Aktif';
                    //     }
                    // })
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="upload(`'.$row->id.'`)" class="btn btn-primary btn-sm" title="Upload Gambar Paket">
                                    <i class="fas fa-upload"></i> Upload Gambar Paket
                                </button>
                                <button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
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
        return view('backend.paket.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_paket'  => 'required',
            'price'  => 'required',
            // 'deskripsi'  => 'required',
            // 'images'  => 'required|file|max:2048',
        ];
 
        $messages = [
            // 'images.required'  => 'Upload Gambar wajib diisi.',
            // 'images.max'  => 'Upload Gambar Max 2MB.',
            'nama_paket.required'   => 'Nama Paket wajib diisi.',
            'price.required'   => 'Harga wajib diisi.',
            // 'deskripsi.required'   => 'Deskripsi wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($request['outer-group'][0]['images']);
        // dd($request->all());
        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->nama_paket);
            // $image = $request->file('images');
            // foreach ($request['outer-group'][0] as $imagefile) {
            //     $name=$imagefile->getClientOriginalName();
            //     $imagefile->move(public_path('frontend/assets4/img/paket/'),$name);
            //     $images[]=$name;
            //     dd($images);
            //     // $img = \Image::make($imagefile->path());
            //     // // dd($img);
            //     // $img = $img->encode('webp', 75);
            //     // $imagefile = time().'.webp';
            //     // // $input = $imagefile;
            //     // $img->save(public_path('frontend/assets4/img/paket/').$imagefile);
            // }

            $paket = Paket::create($input);

            if($paket){
                $message_title="Berhasil !";
                $message_content="Paket ".$input['nama_paket']." Berhasil Disimpan";
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

    public function detail_upload($id)
    {
        $paket = Paket::find($id);
        if(empty($paket)){
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $paket
        ]);
    }

    public function simpan_image(Request $request)
    {
        $rules = [
            'images'  => 'required|file|max:2048',
        ];
 
        $messages = [
            'images.required'  => 'Upload Gambar wajib diisi.',
            'images.max'  => 'Upload Gambar Max 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['paket_id'] = $request->upload_paket_id;
            
            $image = $request->file('images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['images'] = time().'.webp';
            $img->save(public_path('frontend/assets4/img/paket/').$input['images']);
            
            $paketImages = PaketImages::create($input);
            
            if($paketImages){
                $message_title="Berhasil !";
                $message_content="Upload Paket Berhasil Disimpan";
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
