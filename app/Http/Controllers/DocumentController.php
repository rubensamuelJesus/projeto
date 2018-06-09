<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movement;
use App\Document;
use File;
use Storage;
use Session;

class DocumentController extends Controller
{
    public function index(Account $account)
    {
		$movements = $account->movements;
        return view('movements', compact('movements','account'));
        //return response()->download(storage_path('app/public/logos/' . $filename));
        ////return response()->download($pathToFile, $name, $headers);
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
            $filename = $document_file->getClientOriginalName();
            $extensao = $document_file->getClientOriginalExtension();
        }
        if(strcmp($extensao, 'png') != 0 && strcmp($extensao, 'pdf') != 0 && strcmp($extensao, 'jpeg') != 0){
            Session::flash('message', 'O Ficheiro introduzido é incorreto');
            return back();
        }
        $movement->document_id = NULL;
        

        Document::where('id', $movement->document_id)->first()->delete();

        //$account->save();
        $document = Document::create([
            'description' => $request->document_description,
            'original_name' => $filename,
            'type' => $extensao,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $account_do_movemnt = $movement->account;
        $movement->document_id = $document->id;
        $movement->save();

        //if(!is_dir(storage_path('app/documents/'. $account_do_movemnt->id)))
         //   File::makeDirectory(storage_path('app/documents/'. $account_do_movemnt->id));
        $filename = $movement->id.'.'.$document_file->getClientOriginalExtension();
        $filename_sem_ext = $movement->id;
        $path = 'documents/'.$account_do_movemnt->id;

        //return $path;
        //Storage::disk(storage_path('app/documents/10'))->put($document_file, 'teste.png');
        //$request->file('document_file')->storeAs(storage_path('app/documents/'. $account_do_movemnt->id),$filename);

        //Storage::put(storage_path('app/documents/'. $account_do_movemnt->id.'/'.$filename), $document_file);
        
        if($document->original_name != null){
            unlink(storage_path('app/documents/'.$account_do_movemnt->id.'/'.$filename_sem_ext.'.'.$document->type));
        }
        
        $path = Storage::putFileAs(
            $path, $request->file('document_file'), $filename
        );
        return $account_do_movemnt->id;
        

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
