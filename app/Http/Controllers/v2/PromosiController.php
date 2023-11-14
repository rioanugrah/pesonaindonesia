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
                            ->addColumn('deskripsi', function($row){
                                return substr($row->deskripsi,0,100);
                            })
                            ->addColumn('action', function($row){
                                $btn = '<div class="btn-group">';
                                $btn .= '<a href='.route('b.promosi.edit',['id_generate' => $row->id_generate]).' class="btn btn-warning"><i class="mdi mdi-file-document-edit"></i> Edit</a>';
                                $btn .= '<a class="btn btn-danger"><i class="mdi mdi-trash-can"></i> Delete</a>';
                                $btn .= '</div>';
                                return $btn;
                            })
                            ->rawColumns(['action','images'])
                            ->make(true);
        }
        return view('backend_new_2023.promosi.index');
    }

    public function create()
    {
        return view('backend_new_2023.promosi.create');
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
                // $message_title="Berhasil !";
                // $message_content= $request->nama_promosi." Berhasil Disimpan";
                // $message_type="success";
                // $message_succes = true;
                return redirect()->route('b.promosi');
            }

            // $array_message = array(
            //     'success' => $message_succes,
            //     'message_title' => $message_title,
            //     'message_content' => $message_content,
            //     'message_type' => $message_type,
            // );

            // return response()->json($array_message);
        }
        return redirect()->back();
        // return response()->json(
        //     [
        //         'success' => false,
        //         'error' => $validator->errors()->all()
        //     ]
        // );
    }

    public function edit($id_generate)
    {
        $data['promosi'] = Promosi::where('id_generate',$id_generate)->first();
        if (empty($data['promosi'])) {
            return redirect()->back();
        }
        return view('backend_new_2023.promosi.edit',$data);
    }

    public function update(Request $request, $id_generate)
    {
        $rules = [
            'nama_promosi'  => 'required',
            'deskripsi'  => 'required',
            // 'images'  => 'required',
        ];
        $messages = [
            'nama_promosi.required'  => 'Title wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            // 'images.required'   => 'Upload Gambar wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $path = public_path('frontend/assets5/promosi');
            
            $promosi = Promosi::where('id_generate',$id_generate)->first();
            
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }   
            $input['id_generate'] = Str::uuid()->toString();
            $input['slug'] = Str::slug($request->nama_promosi);
            $input['nama_promosi'] = $request->nama_promosi;
            $input['deskripsi'] = $request->deskripsi;

            if ($request->file('images')) {
                $image = $request->file('images');
                $img = \Image::make($image->path());
                $img = $img->encode('webp', 75);
                $input['images'] = 'promo-'.time().'.webp';
    
                if (File::exists(public_path('frontend/assets5/promosi/'.$promosi->images))) {
                    File::delete(public_path('frontend/assets5/promosi/'.$promosi->images));
                }
                $img->save(public_path('frontend/assets5/promosi/').$input['images']);
            }

            $promosi->update($input);
            // $promosi = Promosi::create($input);
            if($promosi){
                return redirect()->route('b.promosi');
            }
        }
        return redirect()->back();
    }
}
