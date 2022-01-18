<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriKota;
use DataTables;
use Validator;

class KategoriKotaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KategoriKota::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="" class="btn btn-success btn-sm" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        //    $btn = '<button onclick="show('.$row->id.')" class="btn btn-warning dim"><i class="fa fa-edit"></i></button>';
                        //    $btn = $btn.'<button class="btn btn-danger dim" onclick="hapus('.$row->id.')"><i class="fa fa-trash"></i></button>';
         
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.kategori_kota.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'kota'  => 'required',
            'image'  => 'required',
        ];
 
        $messages = [
            'kota.required'  => 'Kota wajib diisi.',
            'image.required'  => 'Image wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['kota'] = $request->kota;
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('frontend/assets4/img/kota'), $input['image']);
            // $request->foto->move(storage_path('app/public/image'), $input['image']);
    
           $cooperation = Cooperation::create($input);

           if($cooperation){
                $message_title="Berhasil !";
                $message_content="Kategori Kota Berhasil Dibuat";
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
