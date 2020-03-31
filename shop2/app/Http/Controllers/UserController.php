<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    		if(strcmp($_POST['passWord'], $_POST['repassWord']) == 0){
    			DB::insert('insert into User (Username, Passwd, vty, Name, Phone, Address) values (?, ?, ?, ?, ?, ?)', [$_POST['userName'], $_POST['passWord'], 0, $_POST['name'], $_POST['tel'], $_POST['address']]);
                return view('login');
            }else   		
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
    			$merchandise = DB::table('Merchandise') -> get();
                return view('mainPage') -> with('merchandise', $merchandise) ->with('user', $request->session()->get('userId'));
    		}else{
                return view('login', ['lerr' => '2']);
            }
    	}else{
    		return view('login', ['lerr' => '1']);
    	}


    }

    public function Logout(Request $request)
    {
        $request -> session() -> forget('user');
        $merchandise = DB::table('Merchandise') -> get();
        return view('mainPage') -> with('merchandise', $merchandise);
    }



   /* public function Auth(Request $request)
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make($request->all(), $rules);
        if($validator -> fails()){
            return view('login', ['lerr' => '3']);
        }else{
            header("location: /shop2/public/index.php/postLogin");
        }
    }*/

    public function EditSelect(Request $request)
    {
        $account = DB::table('User')
                        ->where('id', $request->session()->get('userId'))
                        ->first();
        return view('edit') -> with('account', $account);
    }



    public function Edit(Request $request)
    {
        DB::update('update User set Name = ?, Phone = ?, Address = ? where id = ?', [$_POST['name'], $_POST['tel'], $_POST['address'], $request->session()->get('userId')]);
        $merchandise = DB::table('Merchandise') -> get();
        return view('mainPage') -> with('merchandise', $merchandise) ->with('user', $request->session()->get('userId'));

    }













    
}





//$request->session()->has('user')   session has value?