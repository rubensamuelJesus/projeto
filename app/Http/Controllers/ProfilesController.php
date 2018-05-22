<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profiles;
use App\User;
use App\Associate_members;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Blade;


class ProfilesController extends Controller
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

    public function deleteElement($element, &$array){
        $index = array_search($element, $array);
        if($index !== false){
            unset($array[$index]);
        }
    }

    public function index()
    {
        $users_all = Profiles::all();
        $user = Auth::user();
        //variavel de teste ----- $user_teste = User::find(28);
        $ids_associated_members = null;
        $ids_associated_belong = null;
        $associated_members = null;
        $associated_members_belong = null;

        if($user->associate_members->count()){
            foreach ($user->associate_members as $associate)
            {
                $ids_associated_members[] = $associate->associated_user_id;
            } 
            $associated_members = User::select()
                    ->whereIn('id', $ids_associated_members)
                    ->get(); 
        }

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

            /*
            foreach ($ids_associated_members_belong as $id_associated_members_belong)
            {
                $ids_associated_members_belong[] = $associate->main_user_id;
            } 
             */
        }
        //return $associated_members_belong;
        //return "vazio";

        //return $user_associated_member->associated_user_id;

        return view('profiles', compact('users_all','user','associated_members','associated_members_belong'));
       
    }
}
