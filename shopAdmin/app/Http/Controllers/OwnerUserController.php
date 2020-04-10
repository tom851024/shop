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

        if(preg_match("/^\w+$/", $_POST['userName']) && preg_match("/^\w+$/", $_POST['passWd'])){

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
        }else{
            return redirect('/admin/ologin') -> with('lerr', '3');
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
        if(preg_match("/^\w+$/", $_POST['passWd']) && preg_match("/^[0-9]*$/", $_POST['phone']) && preg_match("/^[0-9]*$/", $_POST['level']) && preg_match("/^[0-9]*$/", $_POST['gold']) && $_POST['level'] < 6){
             DB::update('update User set Passwd = ?, Name = ?, Phone = ?, Address = ?, Level = ?, Gold = ? where id = ?', [md5($_POST['passWd']), $_POST['name'], $_POST['phone'], $_POST['address'], $_POST['level'], $_POST['gold'], $_POST['id']]);

             return view('OEditOk');
        }else{
            return view('OEditOk') -> with('err', '1');
        }
    }



    public function orderView(){
        $order = DB::table('OrderTable')
                    ->join('User', 'User.id', '=', 'OrderTable.UserId')
                    ->select(['OrderTable.*', 'User.Name', 'User.id as UId'])
                    ->get();

        return view('orderView') -> with('order', $order);
    }



    public function orderList($orderId){
        $order = DB::table('CartBuy')
                 -> where('OrderId', $orderId)
                 ->where('Progress', '!=', '5')
                 -> join('User', 'User.id', '=', 'CartBuy.UserId')
                 -> select(['CartBuy.*', 'User.Name', 'User.id as UId'])
                 -> get();
 
        return view('orderList') -> with('order', $order);
    }



    public function orderViewSearch(){
        $query = "select OrderTable.*, User.Name, User.id as UId from OrderTable Inner join User on User.id = OrderTable.UserId where Name like ? ";
        $param = '%'.$_POST['search'].'%';
        $order = DB::select($query, array($param, $param));
        return view('orderView') -> with('order', $order) -> with('search', '1');
    }


    public function orderViewSearchNum(){
        //$order = DB::table('CartBuy') -> where('id', $_POST['search']) -> first();
        if(preg_match("/^[0-9]*$/", $_POST['search'])){
            $query = "select OrderTable.*, User.Name, User.id as UId from OrderTable Inner join User on User.id = OrderTable.UserId where OrderTable.OrderId = ?";
            $param = $_POST['search'];
            $order = DB::select($query, array($param));
            return view('orderView') -> with('order', $order) -> with('search', '1');
        }else{
            return redirect('/admin/ownerOrderView') -> with('mes', '1');
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
        //return Response::json($order);
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


     public function OChgCh(Request $request)
    {
        $request->session()->put('locale', 'ch');
        App::setLocale($request->session()->get('locale'));
        return redirect('admin/omain');
    }


    public function OChgEn(Request $request)
    {
        $request->session()->put('locale', 'en');
        App::setLocale($request->session()->get('locale'));
        return redirect('admin/omain');

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
        if(preg_match("/^[0-9]*$/", $_POST['price']) && preg_match("/^[0-9]*$/", $_POST['qty'])){
            DB::insert('insert into Merchandise (Name, ShortDes, Description, Price, Qty, Status) values (?, ?, ?, ?, ?, ?)', [$_POST['name'], $_POST['sdes'], $_POST['des'], $_POST['price'], $_POST['qty'], $_POST['status']]);
            return redirect('/admin/warehouse');
        }else{
            return redirect('/admin/warehouseCreate') -> with('mes', '1');
        }
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
        if(preg_match("/^\w+$/", $_POST['userName']) && preg_match("/^\w+$/", $_POST['password'])){
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
        if(preg_match("/^[0-9]*$/", $_POST['reachMon']) && preg_match("/^[0-9]*$/", $_POST['discount']) && preg_match("/^[0-9]*$/", $_POST['level']) && $_POST['level'] < 6){

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
        if(preg_match("/^[0-9]*$/", $_POST['reachMon']) && preg_match("/^[0-9]*$/", $_POST['discount']) && preg_match("/^[0-9]*$/", $_POST['level']) && $_POST['level'] < 6){
            DB::update('update Discount set Level = ?, ReachGold = ?, Discount = ?  where id = ?', [$_POST['level'], $_POST['reachMon'], $_POST['discount'], $_POST['id']]);
            return redirect('/admin/discountMan');
        }else{
            return redirect('/admin/discountMan') -> with('mes', '1');
        }
    }



    public function discountDel(){
        DB::table('Discount') -> where('id', $_POST['id']) -> delete();
        return redirect('/admin/discountMan');
    }



    public function backView(){
        $back = DB::table('BackItem')
                ->join('CartBuy', 'CartBuy.id', '=', 'BackItem.CartId')
                -> join('User', 'User.id', '=', 'BackItem.UserId')
                ->select('BackItem.*', 'User.Name', 'CartBuy.MerName', 'CartBuy.Price')
                ->get();
         $count = DB::table('BackItem')
                ->join('CartBuy', 'CartBuy.id', '=', 'BackItem.CartId')
                -> join('User', 'User.id', '=', 'BackItem.UserId')
                ->select('BackItem.*', 'User.Name', 'CartBuy.MerName', 'CartBuy.Price')
                ->count();

        return view('backView') -> with('back', $back) -> with('count', $count);

    }


    public function backDo(){
        if(isset($_POST['agree'])){
            $agree = $_POST['agree'];
            for($i=0; $i<count($agree); $i++){
                $back = DB::table('BackItem') -> where('id', $agree[$i]) -> first();
                $mer = DB::table('Merchandise') -> where('id', $back->MerId) -> first();
                $account = DB::table('User') -> where('id', $back->UserId) -> first();
                $gold = $mer->Price * $back->Qty;
                $gold += $account->Gold;
                DB::update('update User set Gold = ? where id = ?', [$gold, $back->UserId]);
                DB::update('update CartBuy set Progress = ? where id = ?', ['4', $back->CartId]);
                DB::table('BackItem') -> where('id', $agree[$i]) -> delete();
            }
        }


        if(isset($_POST['disagree'])){
            $disagree = $_POST['disagree'];
            for($i=0; $i<count($disagree); $i++){
                $back = DB::table('BackItem') -> where('id', $disagree[$i]) -> first();
                DB::update('update CartBuy set Progress = ? where id = ?', ['6', $back->CartId]);
                DB::table('BackItem') -> where('id', $disagree[$i]) -> delete();
                
            }
        }


        return redirect('/admin/backView');
    }

}