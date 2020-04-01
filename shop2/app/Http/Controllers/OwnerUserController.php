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
    			return view('ownerMain') -> with('oUId', $request->session()->get('oUserId'));
                
    		}else{
                return view('oLogin', ['lerr' => '2']);
            }
    	}else{
    		return view('oLogin', ['lerr' => '1']);
    	}
	}

}