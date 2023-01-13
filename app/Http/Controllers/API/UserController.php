<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
            $success =  $user->createToken('nApp')->accessToken;
            // return response()->json(['success' => $success], $this->successStatus);
            return response()->json([
                'success' => true,
                // 'data' => $user
                'data' => [
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
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);            
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
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
