<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Honeymoon;
use \Carbon\Carbon;
use DataTables;
use Validator;
use File;
class HoneymoonController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Honeymoon::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<button type="button" onclick="edit('.$row->id.')" class="btn btn-warning btn-icon">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" onclick="hapus('.$row->id.')" class="btn btn-danger btn-icon">
                                    <i class="fa fa-trash"></i>
                                </button>';
                        //    $btn = '<button onclick="show('.$row->id.')" class="btn btn-warning dim"><i class="fa fa-edit"></i></button>';
                        //    $btn = $btn.'<button class="btn btn-danger dim" onclick="hapus('.$row->id.')"><i class="fa fa-trash"></i></button>';
         
                        return $btn;
                    })
                    ->addColumn('price', function($row){
                        return 'Rp. '.number_format($row->price,0,',','.');
                    })
                    ->addColumn('deskripsi', function($row){
                        return $row->deskripsi;
                    })
                    ->addColumn('images', function($row){
                        return "<img src='".url('frontend/assets4/img/img/'.$row->images)."' width='250' />";
                    })
                    ->rawColumns(['action','images','deskripsi'])
                    ->make(true);
        }
        return view('backend.honeymoon.index');
    }

    public function create()
    {
        return view('backend.honeymoon.create');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_paket'  => 'required',
            'deskripsi'  => 'required',
            'price'  => 'required',
            'qty'  => 'required',
            'images'  => 'required',
        ];
        $messages = [
            'nama_paket.required'  => 'Nama Paket wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'price.required'  => 'Harga wajib diisi.',
            'qty.required'  => 'Jumlah Paket wajib diisi.',
            'images.required'   => 'Upload Gambar wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($request->all());
        if ($validator->passes()) {
            $input['id'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->nama_paket);
            $input['nama_paket'] = $request->nama_paket;
            $input['deskripsi'] = $request->deskripsi;
            $input['price'] = $request->price;
            $input['qty'] = $request->qty;

            $norut = Honeymoon::max('kode_paket');
            if($norut == null){
                $norut = 0;
            }
            $input['kode_paket'] = 'HN-'.sprintf("%03s",$norut+1).'-'.date('m-Y');

            if($request->file('images')){
                $image = $request->file('images');
                $img = \Image::make($image->path());
                $img = $img->encode('webp', 75);
                $input['images'] = time().'.webp';
                $img->save(public_path('frontend/assets4/img/honeymoon/').$input['images']);
            }

            $honeymoon = Honeymoon::create($input);

            if($honeymoon){
                $message_title="Berhasil !";
                $message_content= $request->nama_paket." Berhasil Disimpan";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );
            return redirect()->route('honeymoon')->with($array_message['success'],$array_message['message_content']);
        }
        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }
}
