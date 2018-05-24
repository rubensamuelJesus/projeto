<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Account_types;
use App\Movement;
use App\Movement_categories;
use Illuminate\Support\Facades\Auth;

class MovementController extends Controller
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
    public function create(Account $account)
    {
        return view('movement', compact('account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Account $account)
    {
        $user = null;
        $user = Auth::user();
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
            $account->current_balance =  $account->current_balance - $request->value;
            $end_balance = $account->current_balance - $request->value;
        }

        $movement_id = Movement_categories::where('name', request('category'))->first();

        $account->save();
        Movement::create([
            'account_id' => $account->id,
            'type' => $request->type,
            'date' => $request->date,
            'start_balance' => $account->current_balance,
            'end_balance' => $end_balance,
            'movement_category_id' => $movement_id->id,
            'description' => $request->description,
            'value' => $request->value,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('movements.{account}.index', ['account' => $account]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
