<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use DataTables;
use Validator;
class SliderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Slider::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href='.$row->created_at.' type="button" class="btn btn-success btn-icon">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href='.$row->created_at.' type="button" class="btn btn-warning btn-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-icon">
                                    <i class="fa fa-trash"></i>
                                </button>';
                        //    $btn = '<button onclick="show('.$row->id.')" class="btn btn-warning dim"><i class="fa fa-edit"></i></button>';
                        //    $btn = $btn.'<button class="btn btn-danger dim" onclick="hapus('.$row->id.')"><i class="fa fa-trash"></i></button>';
         
                        return $btn;
                    })
                    ->addColumn('image', function($row){
                        return "<img src='frontend/assets2/images/wallpaper/".$row->image."' />";
                    })
                    ->addColumn('status', function($row){
                        if($row->status == 'Y'){
                            return 'Aktif';
                        }else{
                            return 'Tidak Aktif';
                        }
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('backend.slider.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'image'  => 'required|file|max:2048',
            'status'  => 'required',
        ];
 
        $messages = [
            'image.required'  => 'Upload Gambar wajib diisi.',
            'image.max'  => 'Upload Gambar Max 2MB.',
            'status.required'   => 'Status wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('frontend/assets2/images/wallpaper'), $input['image']);
            // $request->foto->move(storage_path('app/public/image'), $input['image']);
    
           $slider = Slider::create($input);

           if($slider){
                $message_title="Berhasil !";
                $message_content="Slider Berhasil Disimpan";
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