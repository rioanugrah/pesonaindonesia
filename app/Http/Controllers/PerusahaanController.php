<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Roles;
use DataTables;
use Validator;
class PerusahaanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Perusahaan::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('jabatan', function($row){
                        return $row->roles->role;
                    })
                    ->addColumn('status', function($row){
                        if($row->status == 'Y'){
                            return 'Aktif';
                        }else{
                            return 'Tidak Aktif';
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="" class="btn btn-primary btn-sm" title="Download" target="_blank">
                                    <i class="fas fa-print"></i> Download File
                                </a>
                                <a href="" class="btn btn-success btn-sm" title="Detail">
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
        $data['jabatan'] = Roles::all();
        return view('backend.perusahaan.index', $data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_perusahaan'  => 'required',
            'alamat_perusahaan'  => 'required',
            'penanggung_jawab'  => 'required',
            'jabatan'  => 'required',
            'status'  => 'required',
        ];
 
        $messages = [
            'nama_perusahaan.required'  => 'Nama Perusahaan wajib diisi.',
            'alamat_perusahaan.required'   => 'Alamat Perusahaan wajib diisi.',
            'penanggung_jawab.required'   => 'Penanggung Jawab wajib diisi.',
            'jabatan.required'   => 'Jabatan wajib diisi.',
            'status.required'   => 'Status Perusahaan wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->passes()){
            $input = $request->all();
            $perusahaan = Perusahaan::create($input);

            if($perusahaan){
                $message_title="Berhasil !";
                $message_content="Perusahaan ".$input['nama_perusahaan']." Berhasil Dibuat";
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
