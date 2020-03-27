<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    //

    public function Register()
    {
    	$account = DB::table('User')
    					->where('Username', $_POST['userName'])
    					->count();
    	if($account == 0){
    		if(strcmp($_POST['passWord'], $_POST['repassWord']) == 0)
    			DB::insert('insert into User (Username, Passwd, vty) values (?, ?, ?)', [$_POST['userName'], $_POST['passWord'], 0]);
    		else
    			return view('register', ['err' => '1']);
    	}else{
    		return view('register', ['err' => '2', 'account' => $account]);
    	}
    }


    public function Login(Request $request)
    {
    	$account = DB::table('User')
    					->where('Username', $_POST['userName'])
    					->first();

    	$ucount = DB::table('User')
    					->where('Username', $_POST['userName'])
    					->count();

    	if($ucount != 0){
    		if(strcmp($account->Passwd, $_POST['passWord']) == 0){
                $request->session()->put('userId', $account->id);
    			return view('mainPage') -> with ('user', $request->session()->get('userId'));
    		}else{
                return view('login', ['lerr' => '2']);
            }
    	}else{
    		return view('login', ['lerr' => '1']);
    	}


    }
    
}


//$request->session()->has('user')   session has value?