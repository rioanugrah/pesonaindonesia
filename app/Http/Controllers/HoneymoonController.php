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
                        $btn = '<a href='.route('honeymoon.edit',['id'=>$row->id]).' class="btn btn-warning btn-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-icon">
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
                        // return $row->deskripsi;
                        return Str::limit(strip_tags($row->deskripsi),150);
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

    public function edit($id)
    {
        $data['honeymoon'] = Honeymoon::find($id);
        if(empty($data['honeymoon'])){
            return redirect()->back();
        }
        return view('backend.honeymoon.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'nama_paket'  => 'required',
            'deskripsi'  => 'required',
            'price'  => 'required',
            'qty'  => 'required',
            // 'images'  => 'required',
        ];
        $messages = [
            'nama_paket.required'  => 'Nama Paket wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'price.required'  => 'Harga wajib diisi.',
            'qty.required'  => 'Jumlah Paket wajib diisi.',
            // 'images.required'   => 'Upload Gambar wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->passes()) {
            $honeymoon = Honeymoon::find($id);

            $input['slug'] = Str::slug($request->nama_paket);
            $input['nama_paket'] = $request->nama_paket;
            $input['deskripsi'] = $request->deskripsi;
            $input['price'] = $request->price;
            $input['qty'] = $request->qty;

            if($request->file('images')){
                $image = $request->file('images');
                $img = \Image::make($image->path());
                $img = $img->encode('webp', 75);
                $input['images'] = time().'.webp';
                $img->save(public_path('frontend/assets4/img/honeymoon/').$input['images']);

                $image_path = public_path('frontend/assets4/img/honeymoon/'.$input->images);
                File::delete($image_path);
                $honeymoon->images = $input['images'];
            }

            $honeymoon->update($input);

            if($honeymoon){
                $message_title="Berhasil !";
                $message_content= $request->nama_paket." Berhasil Diupdate";
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

    public function delete($id)
    {
        $honeymoon = Honeymoon::find($id);
        if(!empty($honeymoon)){
            $message_title="Berhasil !";
            $message_content="Data Berhasil Dihapus";
            $message_type="success";
            $message_succes = true;
            $image_path = public_path('frontend/assets4/img/honeymoon/'.$honeymoon->images);
            File::delete($image_path);
    
            $honeymoon->delete();
    
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
                'error' => 'Data Tidak Berhasil Dihapus'
            ]
        );
    }
}
