<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
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
        $user->blocked=0;
		$user->save();
        return redirect()->route('profiles');
    }

 	public function block(User $user)
    { 
    	$me = Auth::user();
    	if ($me->id != $user->id) {
	        $user->blocked=1;
	        $user->save();
	        return redirect()->route('profiles');
		}
    	Session::flash('message', 'Cannot change you own account administrative settings!');
    	return back();
    }

 	public function promote(User $user)
    { 
        $user->admin=1;
        $user->save();
        return redirect()->route('profiles');
    } 	

    public function demote(User $user)
    {
     	$me = Auth::user();
    	if ($me->id != $user->id) {
	        $user->admin=0;
	        $user->save();
	        return redirect()->route('profiles');
    	}
    	Session::flash('message', 'Cannot change you own administrative settings!');
        return back();
    }

    public function edit()
    {   
        
    }
    
    public function update(User $user)
    { 

    }
}
