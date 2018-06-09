<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movement;
use App\Document;
use File;

class DocumentController extends Controller
{
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
        return view('document_create', compact('movement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Movement $movement)
    {
    	
        //$user = null;
        //$user = Auth::user();
        $credentials = $this->validate(request(),[
            'document_file' => 'required',
            'document_description' => 'required',
        ]);
        $extensao = null;
        if($request->hasFile('document_file')){
            $document_file = $request->file('document_file');
            $filename = 'invoice.' . $document_file->getClientOriginalExtension();
            $extensao = $document_file->getClientOriginalExtension();
        }
        //$account->save();
        $document = Document::create([
            'description' => $request->document_description,
            'original_name' => $filename,
            //'type' => $extensao,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $account_do_movemnt = $movement->account;
        $movement->document_id = $document->id;
        $movement->save();

        return $account_do_movemnt;
        File::makeDirectory(storage_path('app/documents/'. $account->id));
        return $account->id;
        

        return $movement;
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
