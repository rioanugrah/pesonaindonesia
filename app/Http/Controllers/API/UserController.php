<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $first_name = explode(" ",$user->name);
            $success =  $user->createToken('nApp')->accessToken;
            // return response()->json(['success' => $success], $this->successStatus);
            return response()->json([
                'success' => true,
                // 'data' => $user
                'data' => [
                    'first_name' => $first_name[0],
                    'name' => $user->name,
                    'email' => $user->email,
                    'profile' => $user->profile,
                    'email_verified_at' => $user->email_verified_at,
                    'role' => $user->role,
                    'device_token' => $user->device_token,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                    'deleted_at' => $user->deleted_at,
                    'token' => $success,
                ]
            ], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 422);
        }
    }

    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'c_password' => 'required|same:password',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['error'=>$validator->errors()], 422);            
        // }

        $rules = [
            'name'  => 'required',
            'email'  => 'required',
            'password'  => 'required',
            'c_password'  => 'required',
        ];
        $messages = [
            'name.required'  => 'Nama wajib diisi.',
            'email.required'  => 'Email wajib diisi.',
            'password.required'  => 'Password wajib diisi.',
            'c_password.required'  => 'Confirm Password wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $input = $request->all();
            $input['id'] = Str::uuid()->toString();
            $input['password'] = bcrypt($input['password']);
            $input['role'] = 4;
            $user = User::create($input);
            $success['token'] =  $user->createToken('nApp')->accessToken;
            $success['name'] =  $user->name;
    
            return response()->json(['success'=>$success], $this->successStatus);
        }
        // return response()->json(['error'=>$validator->errors()], 422);
        return response()->json($validator->errors(), 422);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['data' => $user], $this->successStatus);
    }

    public function logout()
    {
        // if (Auth::check()) {
        //     Auth::user()->AauthAcessToken()->delete();
        // }
        // return response()->json(['success' => true], $this->successStatus);
        if (Auth::user()) {
            $user = Auth::user()->token();
            $user->revoke();
    
            return response()->json([
              'success' => true,
              'message' => 'Logout successfully'
          ]);
        }else {
            return response()->json([
              'success' => false,
              'message' => 'Unable to Logout'
            ]);
        }
    }
}
