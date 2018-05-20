<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\Account;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $total_users = Home::count();
        $total_accounts = Account::count();
        $total_movements = Account::count();
        return view('index',compact("total_accounts","total_users","total_movements","user"));
    }
}
