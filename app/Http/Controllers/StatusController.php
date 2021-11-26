<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use DataTables;
use Validator;
class StatusController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Status::all();
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
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.status.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_status'  => 'required',
            'persen'  => 'required',
            'status'  => 'required',
        ];
 
        $messages = [
            'nama_status.required'  => 'Nama Status wajib diisi.',
            'persen.required'  => 'Persentase wajib diisi.',
            'status.required'   => 'Status Aktif / Tidak Aktif wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Status::max('id')+1;
           $status = Status::create($input);

           if($status){
                $message_title="Berhasil !";
                $message_content="Progress Status Berhasil Dibuat";
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
