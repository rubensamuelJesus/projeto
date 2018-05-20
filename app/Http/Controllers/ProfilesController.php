<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profiles;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Blade;


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
        $user = Auth::user();
        /*variavel de teste */$user_teste = User::find(28);
        $ids_associated_members;
        foreach ($user_teste->associate_members as $associate)
        {
            $ids_associated_members[] = $associate->associated_user_id;
        }  
        $associated_members = User::select()
                    ->whereIn('id', $ids_associated_members)
                    ->get();
        return view('profiles', compact('users_all','user','associated_members'));
       
    }
}
