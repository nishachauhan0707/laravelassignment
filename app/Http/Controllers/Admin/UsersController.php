<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Country;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $users= User:: all();
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, User $user)
    {
        $user= $user->create([
            'name' => $request->firstname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'clientname' => $request->clientname,
            'dob' => $request->dob,
            'address' => $request->address,
            'country' =>$request->country,
            'state' => $request->state,
            'pincode' => $request->pincode,        
        ]);
        
        return redirect()->route('admin.users.index');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       if(Gate::denies('edit-users')){
           return redirect(route('admin.users.index'));
       }
       
       
       $countries=Country::all();
       $roles= Role::all();
       return view('admin.users.edit')->with([
            'user'=>$user,
            'countries'=>$countries,
            'roles'=>$roles          
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
              
        $user->roles()->sync($request->roles);
        
        $user->firstname=$request->firstname;
        $user->middlename=$request->middlename;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->clientname=$request->clientname;
        $user->dob=$request->dob;
        $user->address=$request->address;
        $user->country=$request->country;
        $user->state=$request->state;
        $user->pincode=$request->pincode;
        $user->save();
        return redirect()->route('admin.users.index');
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
           return redirect(route('admin.users.index'));
       }
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');
    }
    
     
}
