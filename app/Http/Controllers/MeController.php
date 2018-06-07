<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Associate_members;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Session;
use Image;


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

    public function getUserImage($filename)
    {

        //$file = Storage::disk('local')->get($filename);
        ////return new Response($file, 200);
        return response()->file(storage_path('app/profiles/'.$filename));
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

            /*foreach ($associated_members_belong as $associated_member_belong)

                foreach ($associated_member_belong->associate_members as $associated_member_belong1) {
                    {
                    $ids_associated_members_belong[] = $associated_member_belong1->associated_user_id;
                }
            }
            $ids_associated_members_belong = array_unique($ids_associated_members_belong);
            deleteElement($user->id, $ids_associated_members_belong);

            $associated_members_belong = User::select()
                    ->whereIn('id', $ids_associated_members_belong)
                    ->get();*/
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
    public function update(Request $request)
    {
        $user = Auth::user();
        /*$user = Auth::User();
        $name = $request->input('name');
        $email = $request->input('email');
        $profile_photo = $request->input('profile_photo');
        $phone = $request->input('phone');
        $user->save();
        return redirect()->back();*/
        /*$this->validate(request(), [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|confirmed',
            'phone' => 'required',
            'profile_photo' => 'required'
        ]);

        User::save([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'profile_photo' => $request->profile_photo,
        ]);*/
        $credentials = $this->validate(request(),[
            'name' => 'required|string|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|string|unique:users,email',
            'phone' => 'string',
            'profile_photo' => 'image',
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->phone = request('phone');
        //$user->profile_photo = request('profile_photo');

        if($request->hasFile('profile_photo')){
            
            //add nova foto
            
            $profile_photo = $request->file('profile_photo');
            $filename = time() . '.' . $profile_photo->getClientOriginalExtension();
            $oldFilename = $user->profile_photo;
            $location = storage_path('app/profiles/'. $filename);
            //$location = storage_path('profiles/'. $filename);
            Image::make($profile_photo)->resize(300, 300)->save($location);
            
            //update database
            $user->profile_photo = $filename;

            //Delete foto antiga
            unlink(storage_path('app/profiles/'.$oldFilename));
        }

        

        $user->save();
        return back();
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

    public function updatePass(Request $request)
    {
        $user = Auth::user();

        $credentials = $this->validate(request(),[
            'oldpassword' => 'required|string',
            'newpassword' => 'required|string|min:6',
            'confirmpassword' => 'required|string',
        ]);

        $old_pass = $user->password;
        $old_form = request('oldpassword');
        $new_pass = request('newpassword');
        $new_conf = request('confirmpassword');
        //if($old_pass != $old_form ){
        if (Hash::check($old_pass, $old_form))
            Session::flash('message','Password is not the same!');
            return back();
        }

        if($new_pass != $new_conf ){
            Session::flash('message','New Password doesnt match!');
            return back();
        }

        if ($old_form == $new_pass ){
            Session::flash('message','Password are the same!');
            return back();
        }
        else{
            $new = Hash::make($new);
            $user->password = $new;
        }
        $user->save();
        return back();
    }
}
