<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Gallery;
use Carbon\Carbon;
use File;
use DataTables;
use Validator;

class GalleryController extends Controller
{
    protected $gallery;

    public function __construct(
        Gallery $gallery
    )
    {
        $this->gallery = $gallery;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->gallery->all();
            return DataTables::of($data)
                            ->addIndexColumn()
                            ->addColumn('image', function($row){
                                return "<img src='".url('frontend/gallery/'.$row->image)."' width='150' />";
                            })
                            ->addColumn('action', function($row){
                                $btn = '<a href="'.route('posting.edit',['slug' => $row->slug]).'" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        ';
                                return $btn;
                            })
                            ->rawColumns(['action','image'])
                            ->make(true);
        }
        return view('backend_new_2023.gallery.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'title'  => 'required',
            'image'  => 'required',
        ];
        $messages = [
            'title.required'  => 'Judul wajib diisi.',
            'image.required'   => 'Upload Gambar wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input['slug'] = Str::slug($request->title);
            $input['title'] = $request->title;

            $image = $request->file('image');
            $img = \Image::make($image->path());
            $img = $img->encode('webp', 75);
            $input['image'] = time().'.webp';
            $img->save(public_path('frontend/gallery/').$input['image']);

            $gallery = $this->gallery->create($input);

            if($gallery){
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
