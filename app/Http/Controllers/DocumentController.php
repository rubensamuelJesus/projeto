<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index(Account $account)
    {
		$movements = $account->movements;
        return view('movements', compact('movements','account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Movement $movement)
    {
    	return $movement;
        return view('movement', compact('account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Movement $movement)
    {
    	return $movement;
        $user = null;
        $user = Auth::user();
        $start_balance_antes_de_criar_movimento = $account->current_balance;
        $credentials = $this->validate(request(),[
            'type' => 'required',
            'date' => 'required',
            'category' => 'required',/*'required|string|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|confirmed',*/
            'description' => 'required|string',
            'value' => 'string',
        ]);
        $account_type_id = Account_types::where('name', request('account_type'))->first(); 
        if ( strcasecmp( $request->type, 'Revenue') == 0 ){
            $end_balance = $account->current_balance + $request->value;
            $account->current_balance =  $account->current_balance + $request->value;
        }
        else{
            $end_balance = $account->current_balance - $request->value;
            $account->current_balance =  $account->current_balance - $request->value;
        }


        $movement_id = Movement_categories::where('name', request('category'))->first();

        //$account->save();
        $movement = Movement::create([
            'account_id' => $account->id,
            'type' => $request->type,
            'date' => $request->date,
            'start_balance' => $start_balance_antes_de_criar_movimento,
            'end_balance' => $end_balance,
            'movement_category_id' => $movement_id->id,
            'description' => $request->description,
            'value' => $request->value,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Movement $movement)
    {
        $account = $movement->account;
        $movements = $account->movements; 
    }
}
