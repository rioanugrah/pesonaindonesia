<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DataTables;
use Validator;
class PostController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('title', function($row){
                        return url($row->title);
                    })
                    // ->addColumn('status', function($row){
                    //     if($row->status == 'Y'){
                    //         return 'Aktif';
                    //     }else{
                    //         return 'Tidak Aktif';
                    //     }
                    // })
                    // ->addColumn('action', function($row){
                    //     $btn = '<button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                    //                 <i class="fas fa-pencil-alt"></i>
                    //             </button>
                    //             <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                    //                 <i class="fas fa-trash"></i>
                    //             </button>';
                    //     return $btn;
                    // })
                    ->rawColumns(
                        [
                            // 'action'
                        ]
                    )
                    ->make(true);
        }
        return view('backend.seo.post.index');
    }

    public function simpan(Request $request)
    {
        $input['slug'] = '-';
        $input['body'] = '-';
        $input['title'] = $request->title;

        $posting = Post::create($input);

        if($posting){
            $message_title="Berhasil !";
            $message_content="SEO Post ".$input['title']." Berhasil Dibuat";
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
}
