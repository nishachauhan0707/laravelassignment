<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;

class getCountry extends Controller
{
    function index(){
        
        return view('auth.register');
    }
    
    function getdata(){
        
        return 11;
    }
}
