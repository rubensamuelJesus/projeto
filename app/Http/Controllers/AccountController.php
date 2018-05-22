<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Account_types;
use App\Home;
use App\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$user = Auth::user();
        return view('account', compact('user'));
    }

    public function accounts_user (User $user)
    {
        $accounts = $user->accounts;
        return view('accounts',compact("user","accounts"));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $credentials = $this->validate(request(),[
            'account_type' => 'required',
            'date' => 'required',
            'code' => 'required|string',
            'description' => 'required|string',
            'start_balance' => 'required|string',
        ]);

        

        /*$account_type_id = Account_types::select()
                    ->where('name',$request->account_type)
                    ->get();*/
        $account_type_id = Account_types::where('name', $request->account_type)->first(); 

        Account::create([
            'owner_id' => $user->id,
            'account_type_id' => $account_type_id->id,
            'date' => $request->date,
            'code' => $request->code,
            'description' => $request->description,
            'start_balance' => $request->start_balance,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/');
    }
}
