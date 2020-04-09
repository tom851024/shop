<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
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
    		if(strcmp($account->Passwd, md5($_POST['passWd'])) == 0){
                $request->session()->put('oUserId', $account->id);
                $request->session()->put('oUserName', $account->UserName);
                $request->session()->put('oUserAuth', $account->Auth);
    			return redirect('admin/omain') -> with('oUId', $request->session()->get('oUserId')) -> with('oUName', $request->session()->get('oUserName')) -> with('oUserAuth', $request->session()->get('oUserAuth'));
                
    		}else{           
                return redirect('/admin/ologin') -> with('lerr', '2');
            }
    	}else{
            return redirect('/admin/ologin') -> with('lerr', '1');
    	}
	}



    public function logout(Request $request){
        $request -> session() -> forget('oUserId');
        $request -> session() -> forget('oUserName');
        return redirect('admin/ologin');
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


    public function orderViewSearchNum(){
        //$order = DB::table('CartBuy') -> where('id', $_POST['search']) -> first();
        if(preg_match("/^\d/", $_POST['search'])){
            $query = "select CartBuy.*, User.Name, User.id as UId from CartBuy Inner join User on User.id = CartBuy.UserId where CartBuy.id = ?";
            $param = $_POST['search'];
            $order = DB::select($query, array($param));
            return view('orderList') -> with('order', $order);
        }else{
            return redirect('/admin/ownerOrderView');
        }

    }



    public function userDetail(){
        $member = DB::table('User') -> where('id', $_GET['UId']) -> first();
        return view('memberDetail') -> with('member', $member);
    }



    public function merchandiseGo(Request $request){
        DB::update('update CartBuy set Progress = ? where id = ?', [1, $request->input('ordId')]);
        //DB::update('update CartBuy set Progress = ? where id = ?', [1, 13]);
         $order = DB::table('CartBuy')
                 -> join('User', 'User.id', '=', 'CartBuy.UserId')
                 -> select(['CartBuy.*', 'User.Name', 'User.id as UId'])
                 -> get();
 
        //return view('orderList') -> with('order', $order);
        //return $order -> toArray();
        return Response::json($order);
    }



     public function ChgCh(Request $request)
    {
        $request->session()->put('locale', 'ch');
        App::setLocale($request->session()->get('locale'));
        return redirect('admin/ologin');
    }


    public function ChgEn(Request $request)
    {
        $request->session()->put('locale', 'en');
        App::setLocale($request->session()->get('locale'));
        return redirect('admin/ologin');

    }



    public function listMerchandise(){
        $merchandise = DB::table('Merchandise') -> get();
        return view('warehouse') -> with('merchandise', $merchandise);
    }



    public function listMerchandiseDetail(){
        $merchandise = DB::table('Merchandise') -> where('id', $_POST['merId']) -> first();
        return view('warehouseDetail') -> with('mer', $merchandise);
    }



    public function updateMerchandise(){
         DB::update('update Merchandise set Name = ?, ShortDes = ?,Description = ?, Price = ?, Qty = ?, Status = ?  where id = ?', [$_POST['name'], $_POST['sdes'], $_POST['des'], $_POST['price'], $_POST['qty'], $_POST['status'], $_POST['id']]);
         return redirect('/admin/warehouse');
    }


    public function insertMerchandise(){
        DB::insert('insert into Merchandise (Name, ShortDes, Description, Price, Qty, Status) values (?, ?, ?, ?, ?, ?)', [$_POST['name'], $_POST['sdes'], $_POST['des'], $_POST['price'], $_POST['qty'], $_POST['status']]);
        return redirect('/admin/warehouse');
    }


    public function reportView(){
        $report = DB::table('Report')
                ->join('User', 'User.id', '=', 'Report.UserId')
                ->select('Report.*', 'User.Name', 'User.UserName')
                ->orderBy('id', 'desc')
                ->get();

        return view('cusReport') -> with('report', $report);
    }



    public function register(){
        if(preg_match("/^\w/", $_POST['userName']) && preg_match("/^\w/", $_POST['password'])){
            $account = DB::table('O_User')
                            ->where('UserName', $_POST['userName'])
                            ->count();

            if($account == 0){
                if(strcmp($_POST['password'], $_POST['repassword']) == 0){
                    DB::insert('insert into O_User (UserName, Passwd, Auth) values(?, ?, ?)', [$_POST['userName'], md5($_POST['password']), $_POST['auth']]);
                    return redirect('/admin/oRegister') -> with('mes', '3');
                }else{
                    return redirect('/admin/oRegister') -> with('mes', '2');
                }
            }else{
                return redirect('/admin/oRegister') -> with('mes', '4');
            }
        }else{
            return redirect('/admin/oRegister') -> with('mes', '1');
        }
    }




    public function discountView(){
        $discount = DB::table('Discount') -> get();
        return view('discountView') -> with('discount', $discount);
    }


    public function disCreate(){
        if(preg_match("/^\d{n}/", $_POST['reachMon']) && preg_match("/^\d{n}/", $_POST['discount']) && preg_match("/^\d{n}/", $_POST['level']) && $_POST['level'] < 6){

            DB::insert('insert into Discount (Level, ReachGold, Discount) values (?, ?, ?)', [$_POST['level'], $_POST['reachMon'], $_POST['discount']]);
            return redirect('/admin/discountMan');

        }else{
            return redirect('/admin/discountCre') -> with('mes', '1');
        }
    }


    public function disCountEdit(){
        $discount = DB::table('Discount') -> where('id', $_POST['id']) -> first();
        return view('discountEdit') ->with('discount', $discount);
    }


    public function disCountEditPost(){
        if(preg_match("/^\d{n}/", $_POST['reachMon']) && preg_match("/^\d{n}/", $_POST['discount']) && preg_match("/^\d{n}/", $_POST['level']) && $_POST['level'] < 6){
            DB::update('update Discount set Level = ?, ReachGold = ?, Discount = ?  where id = ?', [$_POST['level'], $_POST['reachMon'], $_POST['discount'], $_POST['id']]);
            return redirect('/admin/discountMan');
        }else{
            return redirect('/admin/discountMan') -> with('mes', '1');
        }
    }

}