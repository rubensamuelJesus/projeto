<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Home;
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
        return view('account', compact('user'));
    }

    public function store(Request $request)
    {
        $credentials = $this->validate(request(),[
            'account_type' => 'required',
            'data' => 'required|string',
            'account_code' => 'required|string|unique:accounts,code|confirmed',
            'description' => 'required|string',
            'start_balance' => 'required|string',
        ]);

        $id_account_type = Account_types::select()
                    ->where('name', '=',$request->account_type)
                    ->get(); 

                    return $id_account_type;

        Account::create([
            'account_type' => $request->account_type,
            'owner_id' => $user->id,
            'data' => $request->data,
            'account_code' => ($request->account_code),
            'description' => $request->description,
            'start_balance' => $request->start_balance,
        ]);
    }
}
