<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Models\Roles;
use App\Mail\UserMail;
use DataTables;
use Hash;
use Validator;
class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role','!=',1);
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('role', function($row){
                        return $row->roles->role;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button type="button" onclick="reset(`'.$row->id.'`)" class="btn btn-primary btn-icon">
                                    <i class="fas fa-undo-alt"></i> Reset Password
                                </button>
                                <button type="button" onclick="edit(`'.$row->id.'`)" class="btn btn-warning btn-icon">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" onclick="hapus(`'.$row->id.'`)" class="btn btn-danger btn-icon">
                                    <i class="fa fa-trash"></i>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data['roles'] = Roles::all();
        return view('backend.users.index', $data);
    }

    public function simpan(Request $request)
    {
        $rules = [
            'name'  => 'required',
            'email'  => 'required',
            'role'  => 'required',
        ];
 
        $messages = [
            'name.required'  => 'Nama wajib diisi.',
            'email.required'  => 'Email wajib diisi.',
            'role.required'   => 'Akses User wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['password'] = Hash::make('default123');
            $user = User::create($input);

            if($user){
                $message_title="Berhasil !";
                $message_content="Pengguna Berhasil Ditambah";
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

    public function detail($id)
    {
        $user = User::find($id);

        if(empty($user)){
            return response()->json([
                'success' => false,
                'message' => 'Pengguna Tidak Ditemukan'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'edit_name'  => 'required',
            'edit_email'  => 'required',
            'edit_role'  => 'required',
        ];
 
        $messages = [
            'edit_name.required'  => 'Nama wajib diisi.',
            'edit_email.required'  => 'Email wajib diisi.',
            'edit_role.required'   => 'Akses User wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {
            $input = $request->all();
            $input['name'] = $request->edit_name;
            $input['email'] = $request->edit_email;
            $input['role'] = $request->edit_role;
            $user = User::find($request->edit_id)->update($input);

            if($user){
                $message_title="Berhasil !";
                $message_content="Data Anda Berhasil Update";
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

    public function delete($id)
    {
        $users = User::find($id);
        
        if($users){
            $users->delete();
            return response()->json(
                [
                    'success' => true,
                    'message_title' => 'Berhasil!',
                    'message' => 'Pengguna Berhasil Dihapus'
                ]
            );
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'Data Tidak Ditemukan'
            ]
        );

    }

    public function reset($id)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $users = User::find($id);
        if($users){
            $new_password = substr(str_shuffle(str_repeat($pool, 5)), 0, 8);
            $users->password = Hash::make($new_password);
            $users->update();
    
            $details = [
                'title' => 'Reset Password',
                'nama' => $users->name,
                'body' => 'Kami menerima permintaan untuk mengatur ulang kata sandi untuk akun Anda. Password Anda : '.$new_password
            ];

            Mail::to($users->email)
                ->send(new UserMail($details));

            $array_message = array(
                'success' => true,
                'message_title' => 'Berhasil',
                'message_content' => 'Reset Password berhasil terkirim',
                'message_type' => "success",
            );
            return response()->json($array_message);
        }else{
            $array_message = array(
                'success' => false,
                'message_title' => 'Gagal',
                'message_content' => 'Reset Password tidak berhasil terkirim',
                'message_type' => "error",
            );
            return response()->json($array_message);
        }
            
        // return substr(str_shuffle(str_repeat($pool, 5)), 0, 8);
    }
}
