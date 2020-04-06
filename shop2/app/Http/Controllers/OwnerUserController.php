<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class OwnerUserController extends Controller
{
	public function login(Request $request){

		$account = DB::table('O_User')
    					->where('Username', $_POST['userName'])
    					->first();

    	$ucount = DB::table('O_User')
    					->where('Username', $_POST['userName'])
    					->count();

		if($ucount != 0){
    		if(strcmp($account->Passwd, $_POST['passWd']) == 0){
                $request->session()->put('oUserId', $account->id);
                $request->session()->put('oUserName', $account->UserName);
                $request->session()->put('oUserAuth', $account->Auth);
    			return view('ownerMain') -> with('oUId', $request->session()->get('oUserId')) -> with('oUName', $request->session()->get('oUserName')) -> with('oUserAuth', $request->session()->get('oUserAuth'));
                
    		}else{
                return view('oLogin', ['lerr' => '2']);
            }
    	}else{
    		return view('oLogin', ['lerr' => '1']);
    	}
	}



    public function logout(Request $request){
        $request -> session() -> forget('oUserId');
        $request -> session() -> forget('oUserName');
        return view('oLogin');
    }



    public function memberView(){
        $member = DB::table('User')->get();
        return view('memberEdit') -> with('member', $member);
    }


    public function memberDetailView(){
        $member = DB::table('User')->where('id', $_POST['UId'])->first();
        return view('memberEditDetail') -> with('member', $member);
    }


    public function memberEdit(){
         DB::update('update User set Passwd = ?, Name = ?, Phone = ?, Address = ?, Level = ?, Gold = ? where id = ?', [$_POST['passWd'], $_POST['name'], $_POST['phone'], $_POST['address'], $_POST['level'], $_POST['gold'], $_POST['id']]);

         return view('OEditOk');
    }

}