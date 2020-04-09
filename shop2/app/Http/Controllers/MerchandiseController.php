<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MerchandiseController extends Controller
{
    //

    public function ListMerchandise(Request $request)
    {
    	$merchandise = DB::table('Merchandise') -> where('status', '0') -> get();
    	return view('mainPage') -> with('merchandise', $merchandise) ->with('user', $request->session()->get('userName'));
    }


    public function TmpBuy(Request $request)
    {
    	if(preg_match("/^[0-9]*/", $_POST['Qty'])){
        	DB::insert('insert into tmpShop (UserId, MerId, MerName, Price, Qty) values (?, ?, ?, ?, ?)', [$request->session()->get('userId'), $_POST['merId'], $_POST['merName'], $_POST['price'], $_POST['Qty']]);
        	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        	
        	$cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
        	//return view('cart') -> with('cartTmp', $cartTmp) -> with('count', $cartTmpCou);
            return redirect('/cart');
        }else{
            return redirect('/cart');
        }
    }



     public function Search(Request $request)
    {
        $query = "select * from Merchandise where status = 0 AND Name like ? OR ShortDes like ?";
        $param = '%'.$_POST['search'].'%';
        $merchandise = DB::select($query, array($param, $param));
        return view('mainPage') -> with('merchandise', $merchandise) ->with('user', $request->session()->get('userName'));
    }


    public function DelTmp(Request $request)
    {
    	//* DB::table('tmpShop') -> where('id', $request->input('id'))->delete();
    	//$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        //$cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
    	//return view('cart') -> with('cartTmp', $cartTmp) -> with('count', $cartTmpCou);


        $del = $_POST['del'];
        for($i=0; $i < count($del); $i++){
            DB::table('tmpShop') -> where('id',$del[$i])->delete();
        }
        return redirect('/cart');

    }


    public function tmpCartView(Request $request)
    {
    	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        $cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
    	return view('cart') -> with('cartTmp', $cartTmp) -> with('count', $cartTmpCou);
    }



    public function commitToBuy(Request $request)
    {
        $cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
        
        	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        	foreach ($cartTmp as $car) {
        		DB::insert('insert into CartBuy (UserId, MerId, MerName, Price, Qty, Progress) values (?, ?, ?, ?, ?, ?)', [$car->UserId, $car->MerId, $car->MerName, $car->Price, $car->Qty, 0]);
        	}

        	DB::table('tmpShop') -> where('UserId', $request->session()->get('userId'))->delete();

        	return view('Thanks');

    }


    public function OrderList(Request $request)
    {
    	$cart = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->get();
    	$cartCou = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->count();
    	return view('orderView') -> with('cart', $cart) -> with('cartCou', $cartCou);
    }

    public function orderOk(Request $request)
    {
    	DB::update('update CartBuy set Progress = ? where id = ?', [2, $_POST['id']]);
    	$cart = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->get();
    	$cartCou = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->count();
    	return view('orderView')->with('cart', $cart)-> with('cartCou', $cartCou);
    }


    public function deleteAll(Request $request)
    {
        DB::table('tmpShop') -> where('UserId', $request->session()->get('userId'))->delete();
        $cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        return view('cart') -> with('cartTmp', $cartTmp);
    }


    public function orderCancel(Request $request){
        DB::update('update CartBuy set Progress = ? where id = ?', [4, $_POST['id']]);
        $cart = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->get();
        $cartCou = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->count();
        return view('orderView')->with('cart', $cart)-> with('cartCou', $cartCou);
    }


    public function merDetail(Request $request, $merId){
        $merdetail = DB::table('Merchandise') -> where('id', $merId) -> first();               
        $user = $request->session()->get('userId');
        return view('detail') -> with('merdetail', $merdetail) -> with('user', $user);
    }

}
