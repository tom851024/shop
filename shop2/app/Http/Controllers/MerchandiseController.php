<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MerchandiseController extends Controller
{
    //

    public function ListMerchandise(Request $request)
    {
    	$merchandise = DB::table('Merchandise') -> get();
    	return view('mainPage') -> with('merchandise', $merchandise) ->with('user', $request->session()->get('userId'));
    }


    public function TmpBuy(Request $request)
    {
    	
    	DB::insert('insert into tmpShop (UserId, MerId, MerName, Price, Qty) values (?, ?, ?, ?, ?)', [$request->session()->get('userId'), $_POST['merId'], $_POST['merName'], $_POST['price'], $_POST['Qty']]);
    	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
    	
    	
    	return view('cart') -> with('cartTmp', $cartTmp);
    }



     public function Search(Request $request)
    {
        $query = "select * from Merchandise where Name like ? OR ShortDes like ?";
        $param = '%'.$_POST['search'].'%';
        $merchandise = DB::select($query, array($param, $param));
        return view('mainPage') -> with('merchandise', $merchandise) ->with('user', $request->session()->get('userId'));
    }


    public function DelTmp(Request $request)
    {
    	DB::table('tmpShop') -> where('id', $_GET['merId'])->delete();
    	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
    	return view('cart') -> with('cartTmp', $cartTmp);
    }


    public function tmpCartView(Request $request)
    {
    	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
    	return view('cart') -> with('cartTmp', $cartTmp);
    }



    public function commitToBuy(Request $request)
    {
    	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
    	foreach ($cartTmp as $car) {
    		DB::insert('insert into CartBuy (UserId, MerId, MerName, Price, Qty, Progress) values (?, ?, ?, ?, ?, ?)', [$car->UserId, $car->MerId, $car->MerName, $car->Price, $car->Qty, 0]);
    	}

    	return view('Thanks');
    }



}
