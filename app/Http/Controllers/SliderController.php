<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use DataTables;
use Validator;
use File;
class SliderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Slider::all();
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
                    ->addColumn('image', function($row){
                        return "<img src='".url('frontend/assets4/img/wallpaper/'.$row->image)."' width='250' />";
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
            $request->image->move(public_path('frontend/assets4/img/wallpaper'), $input['image']);
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

    public function edit($id)
    {
        $data['slider'] = Slider::find($id);
        
        if(auth()->user()->role == 1){
            $array_message = array(
                'success' => false,
                'message_title' => 'Access Denied',
                'message_content' => 'Anda Tidak Memiliki Akses',
                'message_type' => "error",
            );
            return response()->json($array_message);
        }else{
            return response()->json($data);
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'edit_image'  => 'required|file|max:2048',
            'edit_status'  => 'required',
        ];
 
        $messages = [
            'edit_image.required'  => 'Upload Gambar wajib diisi.',
            'edit_image.max'  => 'Upload Gambar Max 2MB.',
            'edit_status.required'   => 'Status wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            // $input = $request->all();
            // $input['image'] = time().'.'.$request->edit_image->getClientOriginalExtension();
            // $request->image->move(public_path('frontend/assets4/img/wallpaper'), $input['image']);

            if(auth()->user()->role == 1){
                $array_message = array(
                    'success' => false,
                    'message_title' => 'Access Denied',
                    'message_content' => 'Anda Tidak Memiliki Akses',
                    'message_type' => "error",
                );
                return response()->json($array_message);
            }
            else{
                // dd($input);
                $slider = Slider::find($request->edit_id);
            
                $file = $request->file('edit_image');
                $fileName = time().$file->getClientOriginalName();
                $file->move(public_path('frontend/assets4/img/wallpaper'), $fileName);
                $image_path = public_path('frontend/assets4/img/wallpaper/'.$slider->image);
                File::delete($image_path);
                
                $slider->image = $fileName;
                $slider->nama_slider = $request->edit_slider;
                $slider->status = $request->edit_status;
                $slider->update();
                // $perusahaan = Perusahaan::find($request->edit_id)->update($input);
    
                if($slider){
                    $message_title="Berhasil !";
                    $message_content="Data Slider Berhasil Update";
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

        return response()->json(
            [
                'success' => false,
                'error' => $validator->errors()->all()
            ]
        );
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if(!empty($slider)){
            $message_title="Berhasil !";
            $message_content="Data Slider Berhasil Dihapus";
            $message_type="success";
            $message_succes = true;
            $image_path = public_path('frontend/assets4/img/wallpaper/'.$slider->image);
            File::delete($image_path);
            $slider->delete();
            
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