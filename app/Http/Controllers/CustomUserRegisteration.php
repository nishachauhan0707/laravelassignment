<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserData;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class CustomUserRegisteration extends Controller
{
    public function index(){
	
	return view('registeration');
	}
	
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'clientname' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'country' => ['required'],
            'state' => ['required'],
            'pincode' => ['required'],
        ]);
    }

 protected function create(array $data)
    {
        dd($data); exit;
        $user= User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'clientname' => $data['clientname'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'country' => $data['country'],
            'state' => $data['state'],
            'pincode' => $data['pincode'],
        ]);
        
       
    }
    
    
    
   
}
