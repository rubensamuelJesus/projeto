<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profiles;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users_all = Profiles::all();
        return view('profiles', compact('users_all'));
    }
}
