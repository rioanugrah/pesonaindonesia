<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Perusahaan;
use App\User;
use Carbon\Carbon;
use File;
use DataTables;
use Validator;
use Auth;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('description', function($row){
                        return Str::limit(strip_tags($row->description),350);
                    })
                    ->addColumn('image', function($row){
                        return "<img src='".url('frontend/assets4/img/blog/'.$row->image)."' width='150' />";
                    })
                    ->addColumn('action', function($row){
                        $btn = '
                                <button onclick="detail(`'.$row->id.'`)" class="btn btn-success btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="javascript:void()" class="btn btn-primary btn-sm" title="Download File" target="_blank">
                                    <i class="fas fa-print"></i> Edit
                                </a>
                                ';
                        return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('backend.posting.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'title'  => 'required',
            // 'author'  => 'required',
            'description'  => 'required',
            'image'  => 'required',
        ];
        $messages = [
            'title.required'  => 'Judul wajib diisi.',
            // 'author.required'  => 'Penulis wajib diisi.',
            'description.required'  => 'Deskripsi wajib diisi.',
            'image.required'   => 'Upload Gambar wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['slug'] = Str::slug($request->title);
            $input['title'] = $request->title;
            $perusahaan = Perusahaan::select('nama_perusahaan')->first();
            $input['author'] = $perusahaan->nama_perusahaan;
            $input['description'] = $request->description;
            $input['keyword'] = $request->keyword;

            $image = $request->file('image');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['image'] = time().'.webp';
            $img->save(public_path('frontend/assets4/img/blog/').$input['image']);

            $blog = Blog::create($input);
            if($blog){
                $message_title="Berhasil !";
                $message_content= $request->title." Berhasil Disimpan";
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
