<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
//-------get
/*Route::get('/', function () {
    return view('mainPage');
    //return view('welcome');
});*/

Route::get('/', 'MerchandiseController@ListMerchandise');

Route::get('/register', function(){
	return view('register');
});

Route::get('/login', function(){
	return view('login');
});

Route::get('/logout', function(Request $request){
	$request -> session() -> forget('user');
	return view('mainPage') -> with ('user', null);
});





//--------post

Route::post('/postReg', 'UserController@Register');


Route::post('/postLogin', 'UserController@Login');

Route::post('/auth', 'UserController@Auth');

