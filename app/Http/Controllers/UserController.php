<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('admin');
    }

    public function index()
    {
        $users=User::paginate('5');
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required",
            "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $data=array();
        $data=$request->all();
        $data['password']=Hash::make('1111111');
        $user=User::create($data);

        $profile=Profile::create([
            "user_id" => $user->id
        ]);

        Session::flash('success','Add user successful');

        return redirect()->back();
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
       $user=User::find($id);
       $user->delete();

       return redirect('admin/user');
    }

    public function remove_admin($id){
        $remove_admin=User::where('id',$id)->firstorfail();
        $remove_admin->admin=0;

        Session::flash('success','User remove from admin permission');
        $remove_admin->update();

        return redirect()->back();
    }

    public function add_admin($id){
        $add_admin=User::where('id',$id)->firstorfail();
        $add_admin->admin=1;

        Session::flash('success','User add to admin permission');
        $add_admin->update();

        return redirect()->back();
    }

    public function profile(){

        $user=Auth::user();
        return view('user.edit_profile',compact('user'));

    }

     public function profile_update(Request $request){

        $this->validate($request,[
            "facebook" => "url|max:225",
            "youtube" => "url|max:225",
            "about" => "max:225",
            "new_password" => "required",
            "image" => "required|image",
        ]);

       $profile_image=$request->file('image');
       $profile_image_name=time()."_".$profile_image->getClientOriginalName();
       $profile_image->move(public_path('images/avator'),$profile_image_name);
       $user_id=Auth::user()->id;
       $user=Auth::user();
       $user->name=$request->get('name');
       $user->email=$request->get('email');
       $password=Hash::make($request->get('new_password'));
       $user->password=$password;
       $user->update(); // update user data
       if(count(Profile::where('user_id',$user_id)->get()) == '0'){
           $data=array();
           $data=$request->all();
           $data['avatar']=$profile_image_name;
           $data['user_id']=$user_id;
           Profile::create($data);
       }else{
           $update_profile=Profile::where('user_id',$user_id)->firstorfail();
           $update_profile->avatar=$profile_image_name;
           $update_profile->facebook=$request->get('facebook');
           $update_profile->youtube=$request->get('youtube');
           $update_profile->about=$request->get('about');
           $update_profile->update();
       }

       Session::flash('success','User profile update successful');
       return redirect()->back();
    }
}
