<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use DB;

class OwnerUserController extends Controller
{
	public function login(Request $request)
    {

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
        			return redirect('admin/omain')->with('oUId', $request->session()->get('oUserId'))->with('oUName', $request->session()->get('oUserName'))->with('oUserAuth', $request->session()->get('oUserAuth'));
                    
        		}else{           
                    return redirect('/admin/ologin')->with('lerr', '2');
                }
        	}else{
                return redirect('/admin/ologin')->with('lerr', '1');
        	}
        }else{
            return redirect('/admin/ologin')->with('lerr', '3');
        }
	}



    public function logout(Request $request)
    {
        $request->session()->forget('oUserId');
        $request->session()->forget('oUserName');
        return redirect('admin/ologin');
    }



    public function memberView()
    {
        $member = DB::table('User')->get();
        $membercou = DB::table('User')->count();
        return view('memberEdit')->with('member', $member)->with('count', $membercou);
    }


    public function memberDetailView($userId)
    {
        //$member = DB::table('User')->where('id', $_POST['UId'])->first();
        $member = DB::table('User')->where('id', $userId)->first();
        return view('memberEditDetail')->with('member', $member);
    }


    public function memberEdit()
    {
        if(preg_match("/^[0-9]*$/", $_POST['phone']) && preg_match("/^[0-9]*$/", $_POST['level']) && preg_match("/^[0-9]*$/", $_POST['gold'])  && preg_match("/^\w+$/", $_POST['name'])){
             DB::update('update User set Name = ?, Phone = ?, Address = ?, Level = ?, Gold = ? where id = ?', [$_POST['name'], $_POST['phone'], $_POST['address'], $_POST['level'], $_POST['gold'], $_POST['id']]);

             return view('OEditOk');
        }else{
            //return view('OEditOk')->with('err', '1');
            return redirect('/admin/memberDetailPost/'.$_POST['id'])->with('mes', '1');
        }
    }


    public function memberEditPasswd()
    {
        if(preg_match("/^\w+$/", $_POST['passwd'])){
            DB::update('update User set Passwd = ? where id = ?', [md5($_POST['passwd']), $_POST['id']]);
            return view('OEditOk');
        }else{
            return redirect('/admin/editPasswd/'.$_POST['id'])->with('mes', '1');
        }
    }



    public function orderView()
    {
        $order = DB::table('OrderTable')
                    //->join('User', 'User.id', '=', 'OrderTable.UserId')
                    //->select(['OrderTable.*', 'User.Name', 'User.id as UId'])
                    ->simplePaginate(10);
                    //->get();

        return view('orderViewAll')->with('order', $order);
    }



    public function orderList($orderId)
    {
        // $order = DB::table('CartBuy')
        //          -> where('OrderId', $orderId)
        //          -> join('User', 'User.id', '=', 'CartBuy.UserId')
        //          -> select(['CartBuy.*', 'User.Name', 'User.id as UId'])
        //          -> get();

         $order = DB::table('CartBuy')
                 -> where('OrderId', $orderId)
                 -> get();

        $plate = DB::table('OrderTable')->where('OrderId', $orderId)->first();
 
        return view('orderList')->with('order', $order)->with('plate', $plate);
    }



    public function orderViewSearch()
    {
        //$query = "select OrderTable.*, User.Name, User.id as UId from OrderTable Inner join User on User.id = OrderTable.UserId where Name like ? ";
        $query = "select * from OrderTable where UserName like ? ";
        $param = '%' . $_POST['search'] . '%';
        $order = DB::select($query, array($param, $param));
        return view('orderView')->with('order', $order)->with('search', '1');
    }


    public function orderViewSearchNum()
    {
        //$order = DB::table('CartBuy') -> where('id', $_POST['search']) -> first();
        if(preg_match("/^[0-9]*$/", $_POST['search'])){
            //$query = "select OrderTable.*, User.Name, User.id as UId from OrderTable Inner join User on User.id = OrderTable.UserId where OrderTable.OrderId = ?";
            $query = "select * from OrderTable where OrderId = ?";
            $param = $_POST['search'];
            $order = DB::select($query, array($param));
            return view('orderView')->with('order', $order)->with('search', '1');
        }else{
            return redirect('/admin/ownerOrderView')->with('mes', '1');
        }

    }


    public function orderViewSearchMer()
    {
        //$query = "select CartBuy.*, User.Name from CartBuy Inner join User on User.id = CartBuy.UserId where MerName like ?";
        $query = "select CartBuy.*, OrderTable.UserName as Name from CartBuy Inner join OrderTable on OrderTable.OrderId = CartBuy.OrderId where MerName like ?";
        //$query = "select CartBuy.*, User.Name from CartBuy where MerName like ?";
        $param = '%' . $_POST['search'] . '%';
        $order = DB::select($query, array($param));
        //$user = DB::table('OrderTable')->where()
        return view('orderViewMer')->with('order', $order);
    }




    public function userDetail($orderId, $userId)
    {
        $member = DB::table('User')->where('id', $userId)->first();
        $member2 = DB::table('OrderTable')->where('OrderId', $orderId)->first();
        return view('memberDetail')->with('member', $member)->with('member2', $member2);
    }



    public function merchandiseGo(Request $request)
    {

        if(isset($_POST['mergo'])){
            $mer = $_POST['mergo'];
            for($i = 0; $i < count($mer); $i++){
                //DB::update('update CartBuy set Progress = ? where id = ?', [1, $request->input('ordId')]);
                DB::update('update CartBuy set Progress = ? where id = ?', [1, $mer[$i]]);
                
                $order = DB::table('CartBuy')
                         -> join('User', 'User.id', '=', 'CartBuy.UserId')
                         -> select(['CartBuy.*', 'User.Name', 'User.id as UId'])
                         -> get();
            }
        }
            return redirect('admin/ownerOrderList/'.$_POST['orderId']);
        
       
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



    public function listMerchandise()
    {
        $merchandise = DB::table('Merchandise')->simplePaginate(5);
        $count = DB::table('Merchandise')->count();
        return view('warehouse')->with('merchandise', $merchandise)->with('count', $count);
    }



    public function listMerchandiseDetail($merId)
    {
        $merchandise = DB::table('Merchandise')->where('id', $merId)->first();
        return view('warehouseDetail')->with('mer', $merchandise);
    }



    public function updateMerchandise()
    {
        if(preg_match("/^[0-9]*$/", $_POST['price']) && preg_match("/^[0-9]*$/", $_POST['qty'])){
             DB::update('update Merchandise set Name = ?, ShortDes = ?,Description = ?, Price = ?, Qty = ?, Status = ?  where id = ?', [$_POST['name'], $_POST['sdes'], $_POST['des'], $_POST['price'], $_POST['qty'], $_POST['status'], $_POST['id']]);
             return redirect('/admin/warehouse');
        }else{
            return redirect('/admin/warehouseDetail/'.$_POST['id'])->with('mes', '1');
        }

    }


    public function insertMerchandise()
    {
        if(preg_match("/^[0-9]*$/", $_POST['price']) && preg_match("/^[0-9]*$/", $_POST['qty'])){
            DB::insert('insert into Merchandise (Name, ShortDes, Description, Price, Qty, Status) values (?, ?, ?, ?, ?, ?)', [$_POST['name'], $_POST['sdes'], $_POST['des'], $_POST['price'], $_POST['qty'], $_POST['status']]);
            return redirect('/admin/warehouse');
        }else{
            return redirect('/admin/warehouseCreate')->with('mes', '1');
        }
    }


    public function reportView()
    {
        // $report = DB::table('Report')
        //         ->join('User', 'User.id', '=', 'Report.UserId')
        //         ->select('Report.*', 'User.Name', 'User.UserName', 'User.id as UId')
        //         ->orderBy('id', 'desc')
        //         ->get();
        $report = DB::table('Report')->select('RoomId')->distinct('RoomId')->get();
        $i = 0;
        foreach($report as $rep){
           $dd = DB::table('Report')
                ->join('User', 'User.id', '=', 'Report.UserId')
                ->select('Report.*', 'User.Name', 'User.UserName', 'User.id as UId')
                ->where('RoomId', $rep->RoomId)
                ->where('User.id', '!=', '0')
                ->first();
           $date[$i] = $dd->Date;
           $user[$i] = $dd->UserId;
           $userName[$i] = $dd->UserName;
           $title[$i] = $dd->Title;
           $i++;
        }
        if(!isset($date)){
            $date = null;
            $user = null;
            $userName = null;
            $title = null;
        }

        return view('cusReport')->with('report', $report)->with('date', $date)->with('user', $user)->with('userName', $userName)->with('title', $title);
    }



    public function register()
    {
        if(preg_match("/^\w+$/", $_POST['userName']) && preg_match("/^\w+$/", $_POST['password'])){
            $account = DB::table('O_User')
                            ->where('UserName', $_POST['userName'])
                            ->count();

            if($account == 0){
                if(strcmp($_POST['password'], $_POST['repassword']) == 0){
                    DB::insert('insert into O_User (UserName, Passwd, Auth) values(?, ?, ?)', [$_POST['userName'], md5($_POST['password']), $_POST['auth']]);
                    return redirect('/admin/oRegister')->with('mes', '3');
                }else{
                    return redirect('/admin/oRegister')->with('mes', '2');
                }
            }else{
                return redirect('/admin/oRegister')->with('mes', '4');
            }
        }else{
            return redirect('/admin/oRegister')->with('mes', '1');
        }
    }




    public function discountView()
    {
        $discount = DB::table('Discount')->orderBy('Level')->get();
        return view('discountView')->with('discount', $discount);
    }


    public function disCreate()
    {
        if(preg_match("/^[0-9]*$/", $_POST['reachMon']) && preg_match("/^[0-9]*$/", $_POST['discount']) && preg_match("/^[0-9]*$/", $_POST['level']) && $_POST['level'] > 0){

            $ordCou = DB::table('Discount')->where('Level', $_POST['level'])->count();
            $lv = DB::table('Level')->where('Level', $_POST['level'] - 1)->count();

            if($ordCou == 0){

                if($lv != 0){
                    DB::insert('insert into Discount (Level, ReachGold, Discount) values (?, ?, ?)', [$_POST['level'], $_POST['reachMon'], $_POST['discount']]);
                    return redirect('/admin/discountMan');
                }else{
                    return redirect('/admin/discountCre')->with('mes', '3');
                }
            }else{
                return redirect('/admin/discountCre')->with('mes', '2');
            }

        }else{
            return redirect('/admin/discountCre')->with('mes', '1');
        }
    }


    public function allDisCreate()
    {
        if(preg_match("/^[0-9]*$/", $_POST['reachMon']) && preg_match("/^[0-9]*$/", $_POST['discount'])){
            $lv = DB::table('Discount')->where('Level', '0')->count();
            if($lv == 0){
                DB::insert('insert into Discount (Level, ReachGold, Discount) values (?, ?, ?)', [$_POST['level'], $_POST['reachMon'], $_POST['discount']]);
                return redirect('/admin/discountMan');
            }else{
                return redirect('/admin/lvNoDiscountCre')->with('mes', '2');
            }
        }else{
            return redirect('/admin/lvNoDiscountCre')->with('mes', '1');
        }
    }


    public function disCountEdit($disId)
    {
        $discount = DB::table('Discount') -> where('id', $disId) -> first();
        return view('discountEdit')->with('discount', $discount);
    }


    public function allDiscountEdit($disId)
    {
        $discount = DB::table('Discount') -> where('id', $disId) -> first();
        return view('allDiscountEdit')->with('discount', $discount);
    }


    public function disCountEditPost()
    {
        if(preg_match("/^[0-9]*$/", $_POST['reachMon']) && preg_match("/^[0-9]*$/", $_POST['discount']) && preg_match("/^[0-9]*$/", $_POST['level']) && $_POST['level'] > 0){

            $ordCou = DB::table('Discount')->where('Level', $_POST['level'])->count();
            $origin = DB::table('Discount')->where('id', $_POST['id'])->first();
            $lv = DB::table('Level')->where('Level', $_POST['level'] - 1)->count();

            if($ordCou == 0 || $_POST['level'] == $origin->Level){

                if($lv != 0){

                    DB::update('update Discount set Level = ?, ReachGold = ?, Discount = ?  where id = ?', [$_POST['level'], $_POST['reachMon'], $_POST['discount'], $_POST['id']]);
                    return redirect('/admin/discountMan');
                }else{
                    return redirect('/admin/discountEdit/' . $_POST['id'])->with('mes', '3');
                }
            }else{
                return redirect('/admin/discountEdit/' . $_POST['id'])->with('mes', '2');
            }
        }else{
            return redirect('/admin/discountEdit/' . $_POST['id'])->with('mes', '1');
        }
    }



    public function allDisCountEditPost()
    {
        if(preg_match("/^[0-9]*$/", $_POST['reachMon']) && preg_match("/^[0-9]*$/", $_POST['discount'])){
            DB::update('update Discount set ReachGold = ?, Discount = ? where id = ?', [$_POST['reachMon'], $_POST['discount'], $_POST['id']]);
            return redirect('/admin/discountMan');
        }else{
            return redirect('/admin/allDiscountEdit/' . $_POST['id'])->with('mes', '1');
        }
    }



    public function discountDel()
    {
        DB::table('Discount') -> where('id', $_POST['id'])->delete();
        return redirect('/admin/discountMan');
    }



    public function backView()
    {
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

        return view('backView')->with('back', $back)->with('count', $count);

    }


    public function backDo()
    {
        if(isset($_POST['agree'])){
            $agree = $_POST['agree'];
            for($i = 0; $i < count($agree); $i++){
                $back = DB::table('BackItem') -> where('id', $agree[$i])->first();
                $mer = DB::table('Merchandise') -> where('id', $back->MerId)->first();
                $account = DB::table('User') -> where('id', $back->UserId)->first();
                $gold = $mer->Price * $back->Qty;
                //插入虛擬幣紀錄
                date_default_timezone_set('Asia/Taipei');
                $date = date("Y-m-d H:i:s");
                DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$back->UserId, $gold, $date]);

                $gold += $account->Gold;
                DB::update('update User set Gold = ? where id = ?', [$gold, $back->UserId]);

                DB::update('update CartBuy set Progress = ? where id = ?', ['4', $back->CartId]);
                DB::table('BackItem')->where('id', $agree[$i]) -> delete();
            }
        }


        if(isset($_POST['disagree'])){
            $disagree = $_POST['disagree'];
            for($i = 0; $i < count($disagree); $i++){
                $back = DB::table('BackItem')->where('id', $disagree[$i]) -> first();
                DB::update('update CartBuy set Progress = ? where id = ?', ['6', $back->CartId]);
                DB::table('BackItem')->where('id', $disagree[$i])->delete();
                
            }
        }


        return redirect('/admin/backView');
    }


    public function memberDel()
    {
        if(isset($_POST['del'])){
            $del = $_POST['del'];
            for($i = 0; $i < count($del); $i++){
                //DB::table('User') -> where('id', $_POST['del']) -> delete();
                DB::table('User')->where('id', $del[$i])->delete();
            }
        }
        return redirect('/admin/memberEdit');
    }



    public function merchandiseDel()
    {
        $mer = $_POST['del'];
        for($i = 0; $i < count($mer); $i++){
            DB::table('Merchandise')->where('id', $mer[$i])->delete();
        }
        return redirect('/admin/warehouse');
    }



    public function replyPost()
    {
        date_default_timezone_set('Asia/Taipei');
        $date = date("Y-m-d H:i:s");
        DB::insert('insert into Report (UserId, Report, RoomId, Date) values (?, ?, ?, ?)', [0, $_POST['reply'], $_POST['roomId'], $date]);
        //return view('replyOk');
        return redirect('admin/reply/'.$_POST['roomId']);
    }


    public function reply($roomId)
    {
        $report = DB::table('Report')
                ->where('RoomId', $roomId)
                ->get();

        return view('cusReply')->with('report', $report);
    }



    public function levelManagement()
    {
        $level = DB::table('Level')->get();
        return view('levelView')->with('level', $level);
    }


    public function levelPost()
    {
        if(preg_match("/^[0-9]*$/", $_POST['reachMoney']) && preg_match("/^[0-9]*$/", $_POST['levelNow']) && preg_match("/^[0-9]*$/", $_POST['totalMoney'])){
            $lv = DB::table('Level')->where('Level', $_POST['levelNow'])->count();
            $lvDown = DB::table('Level')->where('Level', $_POST['levelNow'] - 1)->count();
            if($lv == 0){
                if($lvDown != 0){
                    DB::insert('insert into Level (ReachGold, TotalGold, RStatus, TStatus, Level) values (?, ?, ?, ?, ?)', [$_POST['reachMoney'], $_POST['totalMoney'], $_POST['rStatus'], $_POST['tStatus'], $_POST['levelNow']]);
                    return redirect('/admin/level');
                }else{
                    return redirect('/admin/levelCre')->with('mes', '3');
                }
            }else{
                return redirect('/admin/levelCre')->with('mes', '2');
            }

        }else{
            return redirect('/admin/levelCre')->with('mes', '1');
        }

    }




    public function levelDel()
    {
        if(isset($_POST['del'])){
            $del = $_POST['del'];
            for($i = 0; $i < count($del); $i++){
                DB::table('Level')->where('id', $del[$i])->delete();
            }
        }

        return redirect('/admin/level');
    }



    public function levelEditView($levelId)
    {
        $level = DB::table('Level')->where('id', $levelId)->first();
        return view('levelEditView')->with('level', $level);
    }



    public function editLevelPost()
    {
        if(preg_match("/^[0-9]*$/", $_POST['reachMoney']) && preg_match("/^[0-9]*$/", $_POST['levelNow']) && preg_match("/^[0-9]*$/", $_POST['totalMoney'])){
            $lv = DB::table('Level')->where('Level', $_POST['levelNow'])->count();
            $lvv = DB::table('Level')->where('id', $_POST['id'])->first();

            if($lv == 0 || $_POST['levelNow'] == $lvv->Level){
                $lvDown = DB::table('Level')->where('Level', $_POST['levelNow'] - 1)->count();
                if($lvDown == 0 || $_POST['levelNow'] == $lvv->Level){
                    DB::update('update Level set ReachGold = ?, TotalGold = ?, RStatus = ?, TStatus = ?, Level = ? where id = ?', [$_POST['reachMoney'], $_POST['totalMoney'], $_POST['rStatus'], $_POST['tStatus'], $_POST['levelNow'], $_POST['id']]);
                    return redirect('/admin/level');
                }else{
                    return redirect('/admin/editLevel/' . $_POST['id'])->with('mes', '3');
                }
            }else{
                return redirect('/admin/editLevel/' . $_POST['id'])->with('mes', '2');
            }

        }else{
            return redirect('/admin/editLevel/' . $_POST['id'])->with('mes', '1');
        }
    }







}