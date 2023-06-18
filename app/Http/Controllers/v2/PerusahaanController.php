<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
                    // ->addColumn('jabatan', function($row){
                    //     return $row->roles->role;
                    // })
                    ->addColumn('status', function($row){
                        if($row->status == 'Y'){
                            return 'Aktif';
                        }else{
                            return 'Tidak Aktif';
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data['jabatan'] = Roles::all();
        return view('backend_new_2023.perusahaan.index', $data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama_perusahaan'  => 'required',
            'alamat_perusahaan'  => 'required',
            'penanggung_jawab'  => 'required',
            // 'jabatan'  => 'required',
            'status'  => 'required',
        ];
 
        $messages = [
            'nama_perusahaan.required'  => 'Nama Perusahaan wajib diisi.',
            'alamat_perusahaan.required'   => 'Alamat Perusahaan wajib diisi.',
            'penanggung_jawab.required'   => 'Penanggung Jawab wajib diisi.',
            // 'jabatan.required'   => 'Jabatan wajib diisi.',
            'status.required'   => 'Status Perusahaan wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->passes()){
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
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

    public function edit($id)
    {
        $data['perusahaan'] = Perusahaan::find($id);
        
        if(auth()->user()->role == 4){
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
            'edit_nama_perusahaan'  => 'required',
            'edit_alamat_perusahaan'  => 'required',
            'edit_penanggung_jawab'  => 'required',
            'edit_siup'  => 'required',
            'edit_npwp'  => 'required',
            'edit_jabatan'  => 'required',
            'edit_status'  => 'required',
        ];
 
        $messages = [
            'edit_nama_perusahaan.required'  => 'Nama Perusahaan Wajib Diisi.',
            'edit_alamat_perusahaan.required'  => 'Alamat Perusahaan Wajib Diisi.',
            'edit_penanggung_jawab.required'  => 'Penanggung Jawab Wajib Diisi.',
            'edit_siup.required'  => 'SIUP Wajib Diisi.',
            'edit_npwp.required'  => 'NPWP Wajib Diisi.',
            'edit_jabatan.required'  => 'Jabatan Wajib Diisi.',
            'edit_status.required'  => 'Status Wajib Diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            // $input = $request->all();
            $input['nama_perusahaan'] = $request->edit_nama_perusahaan;
            $input['alamat_perusahaan'] = $request->edit_alamat_perusahaan;
            $input['penanggung_jawab'] = $request->edit_penanggung_jawab;
            $input['siup'] = $request->edit_siup;
            $input['npwp'] = $request->edit_npwp;
            $input['jabatan'] = $request->edit_jabatan;
            $input['status'] = $request->edit_status;
            
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
                $perusahaan = Perusahaan::find($request->edit_id)->update($input);
    
                if($perusahaan){
                    $message_title="Berhasil !";
                    $message_content="Data Perusahaan ".$request->edit_nama_perusahaan." Berhasil Update";
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
    
    public function destroy($id)
    {

        $perusahaan = Perusahaan::find($id);
        if(auth()->user()->role == 1){
            $array_message = array(
                'success' => false,
                'message_title' => 'Access Denied',
                'message_content' => 'Anda Tidak Memiliki Akses',
                'message_type' => "error",
            );
            return response()->json($array_message);
        }else{
            if(!empty($perusahaan)){
                $perusahaan->delete();
    
                $message_title="Berhasil !";
                $message_content="Data Perusahaan ".$perusahaan->nama_perusahaan." Berhasil Dihapus";
                $message_type="success";
                $message_succes = true;
    
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
}
