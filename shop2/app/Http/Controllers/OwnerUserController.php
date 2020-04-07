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



    public function orderView(){
        $order = DB::table('CartBuy')
                 -> join('User', 'User.id', '=', 'CartBuy.UserId')
                 -> select(['CartBuy.*', 'User.Name', 'User.id as UId'])
                 -> get();
 
        return view('orderList') -> with('order', $order);
    }


    public function orderViewSearch(){
        $query = "select CartBuy.*, User.Name, User.id as UId from CartBuy Inner join User on User.id = CartBuy.UserId where Name like ? OR MerName like ?";
        $param = '%'.$_POST['search'].'%';
        $order = DB::select($query, array($param, $param));
        return view('orderList') -> with('order', $order);
    }



    public function userDetail(){
        $member = DB::table('User') -> where('id', $_GET['UId']) -> first();
        return view('memberDetail') -> with('member', $member);
    }



    public function merchandiseGo(){
        DB::update('update CartBuy set Progress = ? where id = ?', [1, $_POST['ordId']]);
         $order = DB::table('CartBuy')
                 -> join('User', 'User.id', '=', 'CartBuy.UserId')
                 -> select(['CartBuy.*', 'User.Name', 'User.id as UId'])
                 -> get();
 
        return view('orderList') -> with('order', $order);
    }

}