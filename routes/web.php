<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






Route::get('/registeration','UserRegisteration@getcountrydata');

Route::post('/getstate','UserRegisteration@getstatedata');
//Route::resource('/getstate','UserRegisteration@getstatedata');

Route::post('/getcity','UserRegisteration@getcitydata');

//Route::resource('/registeration','CustomUserRegisteration');







Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
                  Route::resource('/users','UsersController');
});

//Route::get('/adduser','UserRegisteration@getcountrydata');




