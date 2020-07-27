<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'], 
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'username' => ['required', 'string', 'max:255', 'unique:users,username', 'alpha_dash'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
            'clientname' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'country' => ['required'],
            'state' => ['required'],
            'pincode' => ['required'],			
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
           
         
            $user= User::create([
            'name' => $data['firstname'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'clientname' => $data['clientname'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'country' =>$data['country'],
            'state' => $data['state'],
            'pincode' => $data['pincode'],
            
        ]);
        
        $role= Role::select('id')->where('name','user')->first();
        $user->roles()->attach($role);
        return $user;
    }
}
