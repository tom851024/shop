<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use DB;

class UserController extends Controller
{
    //

    public function Register()
    {
        if(preg_match("/^\w+$/", $_POST['userName']) && preg_match("/^\w+$/", $_POST['passWord']) && preg_match("/^[0-9]*$/", $_POST['tel'])){
        	$account = DB::table('User')
        					->where('Username', $_POST['userName'])
        					->count();
        	if($account == 0){
        		if(strcmp($_POST['passWord'], $_POST['repassWord']) == 0){
        			DB::insert('insert into User (Username, Passwd, vty, Name, Phone, Address, Level, Gold) values (?, ?, ?, ?, ?, ?, ?, ?)', [$_POST['userName'], md5($_POST['passWord']), 0, $_POST['name'], $_POST['tel'], $_POST['address'], 1, 0]);
                    return view('login');
                }else   		
        			//return redirect('register', ['err' => '1']);
                    return redirect('/register')->with('err', '1');
        	}else{
        		//return redirect('register', ['err' => '2', 'account' => $account]);
                return redirect('/register')->with('err', '2');
        	}
        }else{
            return redirect('/register')->with('err', '3');
        }
    }


    public function Login(Request $request)
    {
        if(preg_match("/^\w+$/", $_POST['userName']) && preg_match("/^\w+$/", $_POST['passWord'])){
            $account = DB::table('User')
                        ->where('Username', $_POST['userName'])
                        ->first();

            $ucount = DB::table('User')
                            ->where('Username', $_POST['userName'])
                            ->count();

            if($ucount != 0){
                if(strcmp($account->Passwd, md5($_POST['passWord'])) == 0){
                    $request->session()->put('userId',  $account->id);
                    $request->session()->put('userName',  $account->UserName);
                    $request->session()->put('level', $account->Level);
                    $merchandise = DB::table('Merchandise') -> get();
                    return redirect('/')->with('merchandise', $merchandise)->with('user', $request->session()->get('userName'));
                }else{
                    //return view('login', ['lerr' => '2']);
                    return redirect('/login')->with('err', '2');
                }
            }else{
                //return view('login', ['lerr' => '1']);
                return redirect('/login')->with('err', '1');
            }



        }else{
            return redirect('/login')->with('err', '3');
        }
    	


    }

    public function Logout(Request $request)
    {
        $request -> session()->forget('user');
        $request -> session()->forget('userName');
        $merchandise = DB::table('Merchandise')->get();
        return redirect('/');
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
        return view('edit')->with('account', $account);
    }



    public function Edit(Request $request)
    {
        if(preg_match("/^[0-9]*$/", $_POST['tel'])){
            DB::update('update User set Name = ?, Phone = ?, Address = ? where id = ?', [$_POST['name'], $_POST['tel'], $_POST['address'], $request->session()->get('userId')]);
            return redirect('/');
        }else{
            return redirect('/editPage')->with('err', '1');
        }
        
    }



    public function EditPasswd(Request $request)
    {
        if(preg_match("/^\w+$/", $_POST['passwd']) && preg_match("/^\w+$/", $_POST['newPasswd'])){
            $account = DB::table('User')
                        ->where('id', $request->session()->get('userId'))
                        ->first();
            if(strcmp(md5($_POST['passwd']), $account->Passwd) == 0){
                
                if(strcmp($_POST['newPasswd'], $_POST['reNewPasswd']) == 0){

                    DB::update('update User set Passwd = ? where id = ?', [md5($_POST['newPasswd']), $request->session()->get('userId')]);
                    $request -> session()->forget('user');
                    return view('edPasOk')->with('user', 0);

                }else{
                    //return view('editPasswd') -> with('err', 2);
                    return redirect('/editPasswd')->with('err', 2);
                }

            }else{
                //return view('editPasswd') -> with('err', 1);
                return redirect('/editPasswd')->with('err', 1);
            }

        }else{
            return redirect('/editPasswd')->with('err', 3);
        }
       
    }



    public function Report(Request $request)
    {
        DB::insert('insert into Report (UserId, Report) values (?, ?)', [$request->session()->get('userId'), $_POST['report']]);
        return view('reportOk');
    }



   
    public function ChgCh(Request $request)
    {
        $request->session()->put('locale', 'ch');
        App::setLocale($request->session()->get('locale'));
        return redirect('/');
    }


    public function ChgEn(Request $request)
    {
        $request->session()->put('locale', 'en');
        App::setLocale($request->session()->get('locale'));
        return redirect('/');
    }


    
}





//$request->session()->has('user')   session has value?