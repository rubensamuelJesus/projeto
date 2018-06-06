<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {

        return view('user.index', compact('user'));
    }

    public function edit()
    {   
        
    }
    public function update(User $user)
    { 
        $this->validate(request(), [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|confirmed',
            'phone' => 'required',
            'profile_photo' => 'required'
        ]);

        User::save([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'profile_photo' => $request->profile_photo,
        ]);

        $ver = true;
        if($ver)
            $validator->getMessageBag()->add('sim', 'so pk sim');

        return back();
    }

    /*public function block(User $user)
    { 
        $this->validate(request(), [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|confirmed',
            'phone' => 'required',
            'profile_photo' => 'required'
        ]);

        User::save([
            'blocked' => $request->name,
            'name' => $request->name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'profile_photo' => $request->profile_photo,
        ]);

        return back();
    }*/
}
