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
    public function edit(Account $account)
    {
        return view('account_edit', compact('account'));
    }
    public function update(Account $account)
    {
        $this->validate(request(),[
            'account_type' => 'required',
            'code' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'start_balance' => 'required|string',
        ]);

        $account->code = request('code');
        $account->date = request('date');
        $account->description = request('description');
        $account->start_balance = request('start_balance');

        $account_type_id = Account_types::where('name', request('account_type'))->first(); 

        $account->account_type_id= $account_type_id->id;

        $account->save();

        return back();
    }

    public function accounts_user (User $user)
    {
        $accounts = $user->accounts;
        return view('accounts',compact("user","accounts"));
    }

    public function accounts_user_closed (User $user)
    {
        $accounts = $user->accounts;
        $accounts_user_closed = null;
        foreach ($accounts as $account) {
            if($account->deleted_at != null)
                $accounts_user_closed[] = $account;
        }
        //return $accounts_user_closed;
        return view('accounts_closed',compact("user","accounts_user_closed"));
    }



    public function account_user_delete (Account $account)
    {
        return $account->id;
        $account->delete();
        return back();
    }

    public function account_user_close (Account $account)
    {
        $account->deleted_at = date('Y-m-d H:i:s');
        $account->save();
        return redirect()->route('accounts/{user}/closed', ['user' => Auth::id()]);
    }

    public function account_user_reopen (Account $account)
    {
        $account->deleted_at = null;
        $account->save();
        return redirect()->route('accounts/{user}/opened', ['user' => Auth::id()]);
    }

    public function accounts_user_open (User $user)
    {
        $accounts = $user->accounts;
        $accounts_user_open = null;
        foreach ($accounts as $account) {
            if($account->deleted_at == null)
                $accounts_user_open[] = $account;
        }
        //return $accounts_user_open;
        return view('accounts_opened',compact("user","accounts_user_open"));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $credentials = $this->validate(request(),[
            'account_type' => 'required',
            'code' => 'required|string',
            'date' => 'required|string',
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
            'current_balance' => $request->start_balance,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('accounts/{user}', ['user' => $user->id]);
    }

    asdfxcv
    xcvxcvxcv
}



