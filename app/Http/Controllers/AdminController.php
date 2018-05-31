<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
 	public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        //$user = User::where('id',$user->id)->first();
        //return view('users', compact('user'));;
    }

 	public function unblock(User $user)
    { 
    	$me = Auth::user();
    	if ($me->id != $user->id) {
	        $user->blocked=0;
			$user->save();
    	}

        return redirect()->route('profiles');
    }

 	public function block(User $user)
    { 
    	$me = Auth::user();
    	if ($me->id != $user->id) {
	        $user->blocked=1;
	        $user->save();
		}
        return redirect()->route('profiles');
    }

 	public function promote(User $user)
    { 
    	$me = Auth::user();
    	if ($me->id != $user->id) {
	        $user->admin=1;
	        $user->save();
            return redirect()->route('profiles');
		}
        return redirect()->route('profiles');
    } 	

    public function demote(User $user)
    {
     	$me = Auth::user();
    	if ($me->id != $user->id) {
	        $user->admin=0;
	        $user->save();
    	}

        return redirect()->route('profiles');
    }

    public function edit()
    {   
        
    }
    
    public function update(User $user)
    { 

    }
}
