<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\v2\Promosi;
use \Carbon\Carbon;
use DataTables;
use File;
use Validator;

class PromosiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Promosi::all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('images', function($row){
                                return '<img src='.asset('frontend/assets5/promosi/'.$row->images).' width="150">';
                            })
                            ->addColumn('action', function($row){
                                
                            })
                            ->rawColumns(['action','images'])
                            ->make(true);
        }
        return view('backend_new_2023.promosi.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_promosi'  => 'required',
            'deskripsi'  => 'required',
            'images'  => 'required',
        ];
        $messages = [
            'nama_promosi.required'  => 'Title wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'images.required'   => 'Upload Gambar wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $path = public_path('frontend/assets5/promosi');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }   
            $input['id_generate'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->nama_promosi);
            $input['nama_promosi'] = $request->nama_promosi;
            $input['deskripsi'] = $request->deskripsi;

            $image = $request->file('images');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['images'] = 'promo-'.time().'.webp';
            $img->save(public_path('frontend/assets5/promosi/').$input['images']);

            $promosi = Promosi::create($input);
            if($promosi){
                $message_title="Berhasil !";
                $message_content= $request->nama_promosi." Berhasil Disimpan";
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
