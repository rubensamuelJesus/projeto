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
        $movements = $account->movements;
        $previousMovement = null;
        if($movements->reverse()->first()->id != $movement->id)
        {    
            foreach($movements as $struct) {
                if ($movement->id == $struct->id) {
                    $new_movement = $struct;
                    break;
                }
                $previousMovement = $struct;
            }       
            if($previousMovement != null)
                $account->current_balance = $previousMovement->end_balance;
            else{
                $previousMovement=$new_movement;
                $account->current_balance = $account->start_balance;
            }
            $ver = 0;
            foreach($movements as $struct) {
                if ($new_movement->id == $struct->id || $ver == 1) {
                    $ver = 1;
                    if ( strcasecmp( $struct->type, 'Revenue') == 0 ){
                        $struct->start_balance = $account->current_balance;  
                        $struct->end_balance = $account->current_balance + $struct->value;
                        $account->current_balance =  $account->current_balance + $struct->value;
                    }
                    else{
                        $struct->start_balance = $account->current_balance;  
                        $struct->end_balance = $account->current_balance - $struct->value;
                        $account->current_balance =  $account->current_balance - $struct->value;
                    }
                    $struct->save();
                }
            }
            
        }
        $account->save();
        //return $new_movement.$previousMovement;
        return redirect()->route('movements.{account}', ['account' => $account]);
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
    public function edit(Movement $movement)
    {
        return view('movement_edit', compact('movement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Movement $movement)
    {
        $this->validate(request(),[
            'type' => 'required',
            'date' => 'required',
            'category' => 'required',/*'required|string|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|confirmed',*/
            'description' => 'required|string',
            'value' => 'string',
        ]);
        $movement_id = Movement_categories::where('name', request('category'))->first();

        $movement->type = request('type');
        $movement->date = request('date');
        $movement->value = request('value');
        $movement->description = request('description');
        $movement->movement_category_id = $movement_id->id;
        $movement->save();

        $account = $movement->account;
        
        $movements = $account->movements;
        $previousMovement = null;
        if($movements->reverse()->first()->id != $movement->id)
        {    
            foreach($movements as $struct) {
                if ($movement->id == $struct->id) {
                    $new_movement = $struct;
                    break;
                }
                $previousMovement = $struct;
            }       
            if($previousMovement != null)
                $account->current_balance = $previousMovement->end_balance;
            else{
                $previousMovement=$new_movement;
                $account->current_balance = $account->start_balance;
            }
            $ver = 0;
            foreach($movements as $struct) {
                if ($new_movement->id == $struct->id || $ver == 1) {
                    $ver = 1;
                    if ( strcasecmp( $struct->type, 'Revenue') == 0 ){
                        $struct->start_balance = $account->current_balance;  
                        $struct->end_balance = $account->current_balance + $struct->value;
                        $account->current_balance =  $account->current_balance + $struct->value;
                    }
                    else{
                        $struct->start_balance = $account->current_balance;  
                        $struct->end_balance = $account->current_balance - $struct->value;
                        $account->current_balance =  $account->current_balance - $struct->value;
                    }
                    $struct->save();
                }
            }
            
        }
        $account->save();
        //return $new_movement.$previousMovement;
        return redirect()->route('movements.{account}', ['account' => $account]);

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
        $previousMovement = null;
        foreach($movements as $struct) {
            if ($movement->id == $struct->id) {
                $new_movement = $struct;
                break;
            }
            $previousMovement = $struct;
        }


        if ( strcasecmp( $movement->type, 'revenue') == 0 ){
            $account->current_balance =  $account->current_balance - $movement->value;
        }
        else{
            $account->current_balance =  $account->current_balance + $movement->value;
        }
        $movement->delete(); 
        $movements = $account->movements;
        $movements = $movements->keyBy('id');
        $movements->forget($movement->id); 

        $nao_ha = 0;
        if($previousMovement != null)
            $account->current_balance = $previousMovement->end_balance;
        else{
            $nao_ha = -1;
            $previousMovement = $new_movement;
            $account->current_balance = $account->start_balance;
        }
        $ver = 0;
        foreach($movements as $struct) {
            if ($previousMovement->id == $struct->id || $ver == 1 || $nao_ha == -1) {
                if ( strcasecmp( $struct->type, 'revenue') == 0 ){
                    $struct->start_balance = $account->current_balance;  
                    $struct->end_balance = $struct->end_balance - $movement->value;
                    $account->current_balance = $struct->end_balance;
                }
                else{
                    $struct->start_balance = $account->current_balance;  
                    $struct->end_balance = $struct->end_balance + $movement->value;
                    $account->current_balance = $struct->end_balance;
                }
                $struct->save();
            }
        }
        $account->save();
        //return $new_movement.$previousMovement;
        return redirect()->route('movements.{account}', ['account' => $account]);
    }
}
