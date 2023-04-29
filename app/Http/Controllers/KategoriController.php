<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBidangUsaha;
use App\Models\KategoriPersewaan;

use DataTables;
use Validator;
use DB;

class KategoriController extends Controller
{
    public function bidang_usaha(Request $request)
    {
        if ($request->ajax()) {
            $data = KategoriBidangUsaha::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(
                        [
                            'action'
                        ]
                    )
                    ->make(true);
        }
        return view('backend.kategori.bidang_usaha.bidang_usaha');
    }

    public function bidang_usaha_simpan(Request $request)
    {
        $rules = [
            'nama_bidang_usaha'  => 'required|unique:kategori_bidang_usaha',
        ];
 
        $messages = [
            'nama_bidang_usaha.required'   => 'Bidang Usaha wajib diisi.',
            'nama_bidang_usaha.unique'   => 'Bidang Usaha sudah ada.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['nama_bidang_usaha'] = $request->nama_bidang_usaha;
            $kategori_bidang_usaha = KategoriBidangUsaha::create($input);

            if($kategori_bidang_usaha){
                $message_title="Berhasil !";
                $message_content="Bidang Usaha ".$input['nama_bidang_usaha']." Berhasil Disimpan";
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

    public function persewaan(Request $request)
    {
        if ($request->ajax()) {
            $data = KategoriPersewaan::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(
                        [
                            'action'
                        ]
                    )
                    ->make(true);
        }

        return view('backend.kategori.persewaan.persewaan');
    }

    public function persewaan_simpan(Request $request)
    {
        $rules = [
            'nama_kategori'  => 'required|unique:kategori_persewaan',
        ];
 
        $messages = [
            'nama_kategori.required'   => 'Nama Persewaan wajib diisi.',
            'nama_kategori.unique'   => 'Persewaan sudah ada.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['nama_kategori'] = $request->nama_kategori;
            $kategori_persewaan = KategoriPersewaan::create($input);

            if($kategori_persewaan){
                $message_title="Berhasil !";
                $message_content="Persewaan ".$input['nama_kategori']." Berhasil Disimpan";
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
