<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Roles;
use DataTables;
use Validator;
class RolesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Roles::all();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        // $slug = Str::slug($row->role,'-');
                        $btn = '<a href='.route('roles.detail', ['slug' => $row->slug]).' class="btn btn-primary btn-sm" title="Role Detail">
                                    <i class="fas fa-glasses"></i> Role Detail
                                </a>
                                <button onclick="edit('.$row->id.')" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.roles.index');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'role'  => 'required',
        ];
 
        $messages = [
            'role.required'  => 'Akses User wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['slug'] = Str::slug($request->role);
            $roles = Roles::create($input);

            if($roles){
                $message_title="Berhasil !";
                $message_content="Roles Berhasil Dibuat";
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

    public function detail($slug)
    {
        $data['roles'] = Roles::where('slug',$slug)->first();
        return view('backend.roles.detail', $data);
    }

    public function edit($id)
    {
        $data['roles'] = Roles::find($id);
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
            'edit_role'  => 'required',
        ];
 
        $messages = [
            'edit_role.required'  => 'Akses User wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input['role'] = $request->edit_role;
            $roles = Roles::find($request->edit_id)->update($input);

            if($roles){
                $message_title="Berhasil !";
                $message_content="Roles ".$request->edit_role." Berhasil Update";
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
