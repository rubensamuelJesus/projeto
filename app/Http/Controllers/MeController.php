<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Associate_members;
use Request;

class MeController extends Controller
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
        $user = Auth::user();
        return view('me.profile', compact('user'));
    }

    public function associates()
    {
        $user = Auth::user();
        //variavel de teste ----- $user_teste = User::find(28);
        $ids_associated_members = null;
        $associated_members = null;

        if($user->associate_members->count()){
            foreach ($user->associate_members as $associate)
            {
                $ids_associated_members[] = $associate->associated_user_id;
            } 
            $associated_members = User::select()
                    ->whereIn('id', $ids_associated_members)
                    ->get(); 
        }
        return view('me.associates', compact('user','associated_members'));
    }

    public function associateof()
    {
        $user = Auth::user();
        //variavel de teste ----- $user_teste = User::find(28);
        $ids_associated_belong = null;
        $associated_members_belong = null;

        $user_associated_member = Associate_members::select()
                    ->where('associated_user_id',$user->id)
                    ->get(); 

        function deleteElement($element, &$array){
            $index = array_search($element, $array);
            if($index !== false){
                unset($array[$index]);
            }
        }
                    
        if($user_associated_member->count()){
            foreach ($user_associated_member as $associate)
            {
                $ids_associated_members_belong[] = $associate->main_user_id;
            } 

            $associated_members_belong = User::select()
                    ->whereIn('id', $ids_associated_members_belong)
                    ->get();

            foreach ($associated_members_belong as $associated_member_belong)

                foreach ($associated_member_belong->associate_members as $associated_member_belong1) {
                    {
                    $ids_associated_members_belong[] = $associated_member_belong1->associated_user_id;
                }
            }
            $ids_associated_members_belong = array_unique($ids_associated_members_belong);
            deleteElement($user->id, $ids_associated_members_belong);

            $associated_members_belong = User::select()
                    ->whereIn('id', $ids_associated_members_belong)
                    ->get();
        }
        return view('me.associates-of', compact('user','associated_members_belong'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update()
    {
        $user = Auth::User();
        $name = $request->input('name');
        $email = $request->input('email');
        $profile_photo = $request->input('profile_photo');
        $phone = $request->input('phone');
        $user->save();
        return redirect()->back();

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
