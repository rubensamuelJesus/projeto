<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(){
        $credentials = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials)){  
            return redirect()->route('/');
        }

        return back()->withErrors(['cred' => trans('auth.failed')]);
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

}
