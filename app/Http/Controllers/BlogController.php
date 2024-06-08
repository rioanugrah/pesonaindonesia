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
        $data['kategori'] = [
            ['kategori' => 'Travel'],
            ['kategori' => 'Food']
        ];
        return view('backend.posting.index',$data);
    }

    public function create()
    {
        $data['kategori'] = [
            ['kategori' => 'Travel'],
            ['kategori' => 'Food']
        ];
        return view('backend.posting.create',$data);
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
            $input['kategori'] = $request->kategori;
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
            return redirect()->route('posting')->with($array_message['success'],$array_message['message_content']);
            // return response()->json($array_message);
        }
        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function edit($slug)
    {
        $data['blog'] = Blog::where('slug',$slug)->first();

        if(empty($data['blog'])){
            return redirect()->back()->with('error','Data Tidak Ditemukan');
        }

        $data['kategori'] = [
            ['kategori' => 'Travel'],
            ['kategori' => 'Food']
        ];
        return view('backend.posting.edit',$data);
    }

    public function update(Request $request,$slug)
    {
        $rules = [
            'title'  => 'required',
            // 'author'  => 'required',
            'description'  => 'required',
            // 'image'  => 'required',
        ];
        $messages = [
            'title.required'  => 'Judul wajib diisi.',
            // 'author.required'  => 'Penulis wajib diisi.',
            'description.required'  => 'Deskripsi wajib diisi.',
            // 'image.required'   => 'Upload Gambar wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        $blog = Blog::where('slug',$slug)->first();

        if ($validator->passes()) {
            if($request->file('image')){
                $file = $request->file('image');
                $img = \Image::make($file->path());
                $img = $img->encode('webp', 75);
                $input['image'] = time().'.webp';
                $img->save(public_path('frontend/assets4/img/blog/').$input['edit_image']);

                $image_path = public_path('frontend/assets4/img/blog/'.$input['image']);
                File::delete($image_path);
                $input['image'] = $input['image'];
            }

            $input['slug'] = Str::slug($request->title);
            $input['title'] = $request->title;
            $input['kategori'] = $request->kategori;
            $perusahaan = Perusahaan::select('nama_perusahaan')->first();
            $input['author'] = $perusahaan->nama_perusahaan;
            $input['description'] = $request->description;
            $input['keyword'] = $request->keyword;

            $blog->update($input);

            if($blog){
                $message_title="Berhasil !";
                $message_content= $request->title." Berhasil Diupdate";
                $message_type="success";
                $message_succes = true;
            }

            $array_message = array(
                'success' => $message_succes,
                'message_title' => $message_title,
                'message_content' => $message_content,
                'message_type' => $message_type,
            );

            return redirect()->route('posting')->with($message_type,$message_content);
        }

        return redirect()->back()->with('error',$validator->errors()->all());
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if(!empty($blog)){
            $message_title="Berhasil !";
            $message_content="Data ".$blog->title." Berhasil Dihapus";
            $message_type="success";
            $message_succes = true;
            $image_path = public_path('frontend/assets4/img/blog/'.$blog->image);
            File::delete($image_path);
            $blog->delete();

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
