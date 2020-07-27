<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Country;

use App\State;

use App\City;

class UserRegisteration extends Controller
{
   
     public function getcountrydata(){
        $countries=Country::all();
        //print_r($countries); die;
        return view('registeration',['countries'=>$countries]);
    }
    
    public function getstatedata(Request $request){
       // dd(State::all());
        $countrycode = $request->countrycode; 
        
        //$states=State::where('country_id',103)->get();
        //$states = State::select('select * from state where country_code='.$countrycode.'')->get();
        $states = State::select('*')->where('country_code', $countrycode)->get();
        $userData['data'] = $states;
        
       
        echo json_encode($userData);
        exit;
    }
    
    public function getcitydata(Request $request){
       // dd(City::all());
        $statecode=$request->statecode;
        $citis=City::where('state_code',$statecode)->get();
        print_r($citis); die;
        return json_encode(array('data'=>$citis));
        //return view('registeration',['countries'=>$countries]);
    }
}
