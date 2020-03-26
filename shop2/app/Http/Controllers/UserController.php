<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    //

    public function Register()
    {
    	if(strcmp($_POST['passWord'], $_POST['repassWord']) == 0)
    		DB::insert('insert into User (Username, Passwd, vty) values (?, ?, ?)', [$_POST['userName'], $_POST['passWord'], 0]);
    	else
    		return view('register', ['err' => '1']);
    }
    
}
