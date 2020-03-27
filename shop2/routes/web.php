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
//-------get
Route::get('/', function () {
    return view('mainPage');
});

Route::get('/register', function(){
	return view('register');
});

Route::get('/login', function(){
	return view('login');
});





//--------post

Route::post('/postReg', 'UserController@Register');

Route::post('/postLogin', 'UserController@Login');

