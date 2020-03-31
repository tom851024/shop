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
    	
    	DB::insert('insert into tmpShop (UserId, MerId, MerName, Price) values (?, ?, ?, ?)', [$request->session()->get('userId'), $_GET['merId'], $_GET['merName'], $_GET['price']]);
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



}
