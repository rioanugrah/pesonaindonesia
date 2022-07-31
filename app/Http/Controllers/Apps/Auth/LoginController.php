<?php

namespace App\Http\Controllers\Apps\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('apps.auth.login');
    //   return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // return redirect()->intended('home');
            return redirect()->route('apps.home');
        }

        return redirect()->route('apps.login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('apps.login');
      }
}
