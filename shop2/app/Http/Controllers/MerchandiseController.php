<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MerchandiseController extends Controller
{
    //

    public function ListMerchandise(Request $request)
    {
    	//$merchandise = DB::table('Merchandise')->where('status', '0') -> get();
        $merchandise = DB::table('Merchandise')->where('status', '0') -> simplePaginate(5);
        if(null !== $request->session()->get('userId')){
            $user = DB::table('User')->where('id', $request->session()->get('userId'))->first();
            
            if(isset($user)){
                $request->session()->put('level', $user->Level);
            }else{
                $request -> session()->forget('user');
                $request -> session()->forget('userName');
            }

        }
    	return view('mainPage')->with('merchandise', $merchandise)->with('user', $request->session()->get('userName'))->with('level', $request->session()->get('level'));
    }


    public function TmpBuy(Request $request)
    {
    	if(preg_match("/^[0-9]*$/", $_POST['Qty'])){

            $merchandise = DB::table('Merchandise')->where('id', $_POST['merId'])->first();

            if($_POST['Qty'] <= $merchandise->Qty){

                $merCount = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->where('MerId', $_POST['merId'])->count();
                if($merCount == 0){
                	DB::insert('insert into tmpShop (UserId, MerId, MerName, Price, Qty) values (?, ?, ?, ?, ?)', [$request->session()->get('userId'), $_POST['merId'], $_POST['merName'], $_POST['price'], $_POST['Qty']]);
                	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
                	
                	$cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
                }else{
                    $mer = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->where('MerId', $_POST['merId'])->first();
                    $qty = $mer->Qty + $_POST['Qty'];
                    DB::update('update tmpShop set Qty = ? where MerId = ?', [$qty, $_POST['merId']]);
                }
                return redirect('/cart');

            }else{
                return redirect('/detail/'.$_POST['merId']) -> with('mes', '2');
            }
        	//return view('cart') -> with('cartTmp', $cartTmp) -> with('count', $cartTmpCou);


            
        }else{
            return redirect('/detail/'.$_POST['merId']) -> with('mes', '1');
        }
    }



     public function Search(Request $request)
    {
        $query = "select * from Merchandise where status = 0 AND Name like ? OR ShortDes like ?";
        $param = '%'.$_POST['search'].'%';
        if(null !== $request->session()->get('userId')){
            $user = DB::table('User')->where('id', $request->session()->get('userId'))->first();
            
            if(isset($user)){
                $request->session()->put('level', $user->Level);
            }else{
                $request -> session()->forget('user');
                $request -> session()->forget('userName');
            }

        }
        $merchandise = DB::select($query, array($param, $param));
        return view('mainPageSearch')->with('merchandise', $merchandise)->with('user', $request->session()->get('userName'))->with('level', $request->session()->get('level'));
    }


    public function DelTmp(Request $request)
    {
    	//* DB::table('tmpShop') -> where('id', $request->input('id'))->delete();
    	//$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        //$cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
    	//return view('cart') -> with('cartTmp', $cartTmp) -> with('count', $cartTmpCou);

        if(isset($_POST['del'])){
            $del = $_POST['del'];
            for($i = 0; $i < count($del); $i++){
                DB::table('tmpShop')->where('id',$del[$i])->delete();
            }
        }
        return redirect('/cart');

    }


    public function tmpCartView(Request $request)
    {
        if(null !== $request->session()->get('userId')){
        	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
            $cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
        	return view('cart')->with('cartTmp', $cartTmp) -> with('count', $cartTmpCou);
        }else{
            return redirect('/login');
        }
    }



    public function commitToBuy(Request $request)
    {
       
        $total = 0;
        $cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
        $account = DB::table('User') -> where('id', $request->session()->get('userId')) -> first();
        $cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        $orderId = $request->session()->get('userId').date("YmdHis");
        foreach ($cartTmp as $car) {
            DB::insert('insert into CartBuy (OrderId, UserId, MerId, MerName, Price, Qty, Progress) values (?, ?, ?, ?, ?, ?, ?)', [$orderId, $car->UserId, $car->MerId, $car->MerName, $car->Price, $car->Qty, 0]);
        }


        DB::table('tmpShop') -> where('UserId', $request->session()->get('userId'))->delete();

        foreach($cartTmp as $tmp){
            $total += $tmp->Price * $tmp->Qty;
        }

        //插入訂單資料表
        DB::insert('insert into OrderTable (OrderId, Total, RealPay, Plate, UserId, UserName, Address, Phone) values (?, ?, ?, ?, ?, ?, ?, ?)', [$orderId, $total, $total, '0', $request->session()->get('userId'), $account->Name, $account->Address, $account->Phone]);

        //加入優惠

        //$discount = DB::table('Discount')->where('Level', $request->session()->get('level'))->get();
        $discount = DB::table('Discount')->where('Level', $account->Level)->get();
            
        $plate = 0;

        foreach($discount as $dis){
            if($total >= $dis->ReachGold){
                $plate += $dis->Discount;
                DB::insert('insert into OrderDiscount (OrderId, DiscountId, UserId, Status) values (?, ?, ?, ?)', [$orderId, $dis->id, $request->session()->get('userId'), 0]);     
            }  
                    
        }
        $plateUpdate = $plate + $account->Gold;
        DB::update('update User set Gold = ? where id = ?', [$plateUpdate, $request->session()->get('userId')]);

        date_default_timezone_set('Asia/Taipei');
        $date = date("Y-m-d H:i:s");
        DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), $plate, $date]);


        //加入全等級優惠

        $allDiscount = DB::table('Discount')->where('Level', '0')->first();

        if(isset($allDiscount)){
            if($total >= $allDiscount->ReachGold){
                DB::insert('insert into OrderDiscount (OrderId, DiscountId, UserId, Status) values (?, ?, ?, ?)', [$orderId, $allDiscount->id, $request->session()->get('userId'), 0]);
                DB::update('update User set Gold = ? where id = ?', [$allDiscount->Discount + $account->Gold, $request->session()->get('userId')]);
                date_default_timezone_set('Asia/Taipei');
                $date = date("Y-m-d H:i:s");
                DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), $allDiscount->Discount, $date]);
                $plate += $allDiscount->Discount;
            }
        }


        //等級提升

         $uLv = DB::table('Level')->where('Level', $account->Level)->first();
        if(isset($uLv)){
            $orderTable = DB::table('OrderTable')->where('UserId', $account->id)->get();
            $costTotal = 0;
            if(isset($orderTable)){
                foreach($orderTable as $or){
                    $costTotal += $or->Total;
                }
            }

             if($total >= $uLv->ReachGold && $uLv->RStatus == '1'){
                 $lv = $account->Level + 1;
                 DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
                 $request->session()->put('level', $lv);
             }else if($costTotal >= $uLv->TotalGold && $uLv->TStatus == '1'){
                $lv = $account->Level + 1;
                DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
                $request->session()->put('level', $lv);
             }
           
        }

            

        return view('Thanks') ->with('plate', $plate);
        


    }


    public function commitToBuyWithPlate(Request $request)
    {
        if(preg_match("/^[0-9]*$/", $_POST['plate'])){
            $account = DB::table('User')->where('id', $request->session()->get('userId'))->first();
            
            if($account->Gold >= $_POST['plate']){
                $total = 0;
                $cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
                

                $cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
                $orderId = $request->session()->get('userId').date("YmdHis");
                foreach ($cartTmp as $car) {
                    DB::insert('insert into CartBuy (OrderId, UserId, MerId, MerName, Price, Qty, Progress) values (?, ?, ?, ?, ?, ?, ?)', [$orderId, $car->UserId, $car->MerId, $car->MerName, $car->Price, $car->Qty, 0]);
                }


                DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->delete();

                foreach($cartTmp as $tmp){
                    $total += $tmp->Price * $tmp->Qty;
                }

                 //紀錄虛擬幣
                date_default_timezone_set('Asia/Taipei');
                $date = date("Y-m-d H:i:s");
                DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), 0 - $_POST['plate'], $date]);

                $realPay = $total - $_POST['plate'];
                $gold = $account->Gold - $_POST['plate'];

                //插入訂單資料表
                DB::insert('insert into OrderTable (OrderId, Total, RealPay, Plate, UserId, UserName, Address, Phone) values (?, ?, ?, ?, ?, ?, ?, ?)', [$orderId, $total, $realPay, $_POST['plate'], $request->session()->get('userId'), $account->Name, $account->Address, $account->Phone]);



                //更新使用者虛擬幣
                DB::update('update User set Gold = ? where id = ?', [$gold, $request->session()->get('userId')]);

                //等級提升                 
                // $uLv = DB::table('Level')->where('Level', $account->Level)->first();
                // if($total >= $uLv->ReachGold){
                //     $lv = $account->Level + 1;
                //     DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
                //     $request->session()->put('level', $lv);
                // }


                $uLv = DB::table('Level')->where('Level', $account->Level)->first();
                if(isset($uLv)){
                    $orderTable = DB::table('OrderTable')->where('UserId', $account->id)->get();
                    $costTotal = 0;
                    if(isset($orderTable)){
                        foreach($orderTable as $or){
                            $costTotal += $or->Total;
                        }
                    }

                     if($total >= $uLv->ReachGold && $uLv->RStatus == '1'){
                         $lv = $account->Level + 1;
                         DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
                         $request->session()->put('level', $lv);
                     }else if($costTotal >= $uLv->TotalGold && $uLv->TStatus == '1'){
                        $lv = $account->Level + 1;
                        DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
                        $request->session()->put('level', $lv);
                     }
                   
                }


                

                return view('Thanks');
            }else{
                return redirect('/commitBuyWithPlate')->with('mes', '2');
            }
        }else{
            return redirect('/commitBuyWithPlate')->with('mes', '1');
        }
    }


    public function buyWithPlateFirst(Request $request)
    {
        $account = DB::table('User')->where('id', $request->session()->get('userId'))->first();
        $total = 0;
        $cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
                

        $cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        $orderId = $request->session()->get('userId').date("YmdHis");
        foreach ($cartTmp as $car){
             DB::insert('insert into CartBuy (OrderId, UserId, MerId, MerName, Price, Qty, Progress) values (?, ?, ?, ?, ?, ?, ?)', [$orderId, $car->UserId, $car->MerId, $car->MerName, $car->Price, $car->Qty, 0]);
        }
        DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->delete();
        foreach($cartTmp as $tmp){
            $total += $tmp->Price * $tmp->Qty;
        }

        if($account->Gold >= $total){
            //紀錄虛擬幣
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), 0 - $total, $date]);

            $gold = $account->Gold - $total;
            //插入訂單資料表
            DB::insert('insert into OrderTable (OrderId, Total, RealPay, Plate, UserId, UserName, Address, Phone) values (?, ?, ?, ?, ?, ?, ?, ?)', [$orderId, $total, '0', $total, $request->session()->get('userId'), $account->Name, $account->Address, $account->Phone]);
             //更新使用者虛擬幣
            DB::update('update User set Gold = ? where id = ?', [$gold, $request->session()->get('userId')]);
        }else{
            //紀錄虛擬幣
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), 0 - $account->Gold, $date]);

            $realpay = $total - $account->Gold;
            //插入訂單資料表
            DB::insert('insert into OrderTable (OrderId, Total, RealPay, Plate, UserId, UserName, Address, Phone) values (?, ?, ?, ?, ?, ?, ?, ?)', [$orderId, $total, $realpay, $account->Gold, $request->session()->get('userId'), $account->Name, $account->Address, $account->Phone]);
             //更新使用者虛擬幣
            DB::update('update User set Gold = ? where id = ?', ['0', $request->session()->get('userId')]);
        }


        //等級提升
                
        // $uLv = DB::table('Level')->where('Level', $account->Level)->first();
        // if($total >= $uLv->ReachGold){
        //     $lv = $account->Level + 1;
        //     DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
        //     $request->session()->put('level', $lv);
        // }


        $uLv = DB::table('Level')->where('Level', $account->Level)->first();
        if(isset($uLv)){
            $orderTable = DB::table('OrderTable')->where('UserId', $account->id)->get();
            $costTotal = 0;
            if(isset($orderTable)){
                foreach($orderTable as $or){
                    $costTotal += $or->Total;
                }
            }

            if($total >= $uLv->ReachGold && $uLv->RStatus == '1'){
                $lv = $account->Level + 1;
                DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
                $request->session()->put('level', $lv);
            }else if($costTotal >= $uLv->TotalGold && $uLv->TStatus == '1'){
                $lv = $account->Level + 1;
                DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
                $request->session()->put('level', $lv);
            }
                   
        }

        return view('Thanks');

    }



    public function selectOrder(Request $request)
    {
        if(null !== $request->session()->get('userId')){
            $order = DB::table('OrderTable')->where('UserId', $request->session()->get('userId'))->get();
            $count = DB::table('OrderTable')->where('UserId', $request->session()->get('userId'))->count();
            $User = DB::table('User')->where('id', $request->session()->get('userId'))->first();
            return view('orderList')->with('order', $order)->with('count', $count)->with('user', $User);
        }else{
            return redirect('/login');
        }
    }






    public function OrderList(Request $request, $orderId)
    {
    	$cart = DB::table('CartBuy')->where('OrderId', $orderId)->get();
    	$cartCou = DB::table('CartBuy')->where('OrderId', $orderId)->count();
        $order = DB::table('OrderTable')->where('OrderId', $orderId)->first();
    	return view('orderView')->with('cart', $cart)->with('cartCou', $cartCou)->with('order', $order);
    }








    public function orderOk(Request $request)
    {
    	DB::update('update CartBuy set Progress = ? where id = ?', [2, $_POST['id']]);
    	//$cart = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->get();
    	//$cartCou = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->count();
    	//return view('orderView')->with('cart', $cart)-> with('cartCou', $cartCou);
        return redirect('/orderView/'.$_POST['orderId']);
    }


    public function deleteAll(Request $request)
    {
        DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->delete();
        $cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        //return view('cart') -> with('cartTmp', $cartTmp);
        return redirect('/cart');
    }


    public function orderCancel(Request $request)
    {
        DB::update('update CartBuy set Progress = ? where id = ?', [4, $_POST['id']]);
        //$cart = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->get();
        //$cartCou = DB::table('CartBuy')->where('UserId', $request->session()->get('userId'))->count();
        //return view('orderView')->with('cart', $cart)-> with('cartCou', $cartCou);

        



        return redirect('/orderView/'.$_POST['orderId']);
    }


    public function backView(Request $request, $cartId)
    {
        $back = DB::table('CartBuy')->where('id', $cartId) -> first();
        return view('back')->with('back', $back);
    }


    public function orderBack(Request $request)
    {   
        if(preg_match("/^[0-9]*$/", $_POST['qty'])){
            $cartBuy = DB::table('CartBuy')->where('id', $_POST['id'])->first();
            
            if($_POST['qty'] == $cartBuy->Qty){
                DB::update('update CartBuy set Progress = ? where id = ?', [5, $_POST['id']]);
                DB::insert('insert into BackItem (OrderId, CartId, MerId, UserId, Qty) values(?, ?, ?, ?, ?)', [$_POST['orderId'], $_POST['id'], $_POST['merId'], $request->session()->get('userId'), $_POST['qty']]);

                 // //扣掉優惠
                 $notBack = DB::table('CartBuy')->where('OrderId', $_POST['orderId'])->where('Progress', '!=', '5')->where('Progress', '!=', '4')->get();
                 $total = 0;
                 $subTotal = 0;
                 foreach($notBack as $nb){
                     $total += $nb->Price * $nb->Qty;
                 }
                 $disId = DB::table('OrderDiscount')->where('OrderId', $_POST['orderId'])->where('UserId', $request->session()->get('userId'))->where('Status', '0')->get();
                foreach($disId as $dis){
                  $sub = DB::table('Discount')->where('id', $dis->DiscountId)->first();
                     if($total < $sub->ReachGold){
                         $subTotal += $sub->Discount;
                         DB::update('update OrderDiscount set Status = ? where id = ?', [1, $dis->id]);
                     }
                }
                 $gold = DB::table('User')->where('id', $request->session()->get('userId'))->first();
                 $gold->Gold = $gold->Gold - $subTotal;
                 date_default_timezone_set('Asia/Taipei');
                 $date = date("Y-m-d H:i:s");

                 if($gold->Gold >= 0){
                    DB::update('update User set Gold = ? where id = ?', [$gold->Gold, $request->session()->get('userId')]);
                 }else{
                    DB::update('update User set Gold = ? where id = ?', [0, $request->session()->get('userId')]);
                 }

                 DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), 0-$subTotal, $date]);
               
             



                return redirect('/orderView/'.$_POST['orderId']);
            }else if($_POST['qty'] < $cartBuy->Qty){

                $qqty = $cartBuy->Qty - $_POST['qty'];
                DB::update('update CartBuy set Progress = ? where id = ?', [5, $_POST['id']]);
                DB::update('update CartBuy set Qty = ? where id = ?', [$_POST['qty'], $_POST['id']]);
                DB::insert('insert into CartBuy (OrderId, UserId, MerId, MerName, Price, Qty, Progress) values (?, ?, ?, ?, ?, ?, ?)', [$cartBuy->OrderId, $cartBuy->UserId, $cartBuy->MerId, $cartBuy->MerName, $cartBuy->Price, $qqty, '2']);
                DB::insert('insert into BackItem (OrderId, CartId, MerId, UserId, Qty) values(?, ?, ?, ?, ?)', [$_POST['orderId'], $_POST['id'], $_POST['merId'], $request->session()->get('userId'), $_POST['qty']]);


                 // //扣掉優惠
                 $notBack = DB::table('CartBuy')->where('OrderId', $_POST['orderId'])->where('Progress', '!=', '5')->get();
                 $total = 0;
                 $subTotal = 0;
                 foreach($notBack as $nb){
                     $total += $nb->Price * $nb->Qty;
                 }
                 $disId = DB::table('OrderDiscount')->where('OrderId', $_POST['orderId'])->where('UserId', $request->session()->get('userId'))->where('Status', '0')->get();
                foreach($disId as $dis){
                  $sub = DB::table('Discount')->where('id', $dis->DiscountId)->first();
                     if($total < $sub->ReachGold){
                         $subTotal += $sub->Discount;
                         DB::update('update OrderDiscount set Status = ? where id = ?', [1, $dis->id]);
                     }
                }
                 $gold = DB::table('User')->where('id', $request->session()->get('userId'))->first();
                 $gold->Gold = $gold->Gold - $subTotal;
                 date_default_timezone_set('Asia/Taipei');
                 $date = date("Y-m-d H:i:s");

                 if($gold->Gold >= 0){
                     DB::update('update User set Gold = ? where id = ?', [$gold->Gold, $request->session()->get('userId')]);
                }else{
                    DB::update('update User set Gold = ? where id = ?', [0, $request->session()->get('userId')]);
                }

                 DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), 0-$subTotal, $date]);
               

                return redirect('/orderView/'.$_POST['orderId']);
            }else{
                return redirect('/backView/'.$_POST['id'])->with('mes', '2');
            }


           
           
        }else{
            return redirect('/backView/'.$_POST['id'])->with('mes', '1');
        }
    }


    public function merDetail(Request $request, $merId)
    {
        $merdetail = DB::table('Merchandise')->where('id', $merId) -> first();               
        $user = $request->session()->get('userId');
        return view('detail') -> with('merdetail', $merdetail)->with('user', $user);
    }



    public function plateView(Request $request)
    {
        $cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
        $user = DB::table('User')->where('id', $request->session()->get('userId'))->first();
        $cartTmpCou = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->count();
        return view('plateBuy')->with('cartTmp', $cartTmp)->with('count', $cartTmpCou)->with('user', $user);
    }



    public function orderCheck(Request $request)
    {
        //處理已領貨
        if(isset($_POST['checkok'])){
            $chk = $_POST['checkok'];
            for($i = 0; $i < count($chk); $i++){
                DB::update('update CartBuy set Progress = ? where id = ?', [2, $chk[$i]]);
            }
        }

        //領貨前退貨
        if(isset($_POST['cancel'])){
            $chk = $_POST['cancel'];
            $backTotal = 0;
            for($i = 0; $i < count($chk); $i++){
                DB::update('update CartBuy set Progress = ? where id = ?', [4, $chk[$i]]);
                //$bk = DB::table('CartBuy')->where('id', $chk[$i])->first();
                //$backTotal += $bk->Price * $bk->Qty;
            }

            //扣掉優惠
            $notBack = DB::table('CartBuy')->where('OrderId', $_POST['orderId'])->where('Progress', '!=', '5')->where('Progress', '!=', '4')->get();
            //$subTotal = 0;
            $disId = DB::table('OrderDiscount')->where('OrderId', $_POST['orderId'])->where('Status', '0')->where('UserId', $request->session()->get('userId'))->get();
            //$total = DB::table('OrderTable')->where('OrderId', $_POST['orderId'])->first();
            //$total->Total -=  $backTotal;
            $total = 0;
            $subTotal = 0;
            foreach($notBack as $nb){
                $total += $nb->Price * $nb->Qty;
            }
            foreach($disId as $dis){
                $sub = DB::table('Discount')->where('id', $dis->DiscountId)->first();
                if($total < $sub->ReachGold){
                    $subTotal += $sub->Discount;
                    DB::update('update OrderDiscount set Status = ? where id = ?', [1, $dis->id]);
                }
            }
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), 0-$subTotal, $date]);

            $gold = DB::table('User')->where('id', $request->session()->get('userId'))->first();
            $gold->Gold = $gold->Gold - $subTotal;
           
           if($gold->Gold >= 0){
                DB::update('update User set Gold = ? where id = ?', [$gold->Gold, $request->session()->get('userId')]);
            }else{
                DB::update('update User set Gold = ? where id = ?', [0, $request->session()->get('userId')]);
            }



        }

        //領貨後退貨
        if(isset($_POST['back'])){
            $chk = $_POST['back'];
            $qty = $_POST['qty'];
            $mer = $_POST['mer'];
            $backTotal = 0;
            for($i = 0; $i < count($chk); $i++){
                DB::update('update CartBuy set Progress = ? where id = ?', [5, $chk[$i]]);
                DB::insert('insert into BackItem (OrderId, CartId, MerId, UserId, Qty) values(?, ?, ?, ?, ?)', [$_POST['orderId'], $chk[$i], $mer[$i], $request->session()->get('userId'), $qty[$i]]);
                $bk = DB::table('CartBuy')->where('id', $chk[$i])->first();
                $backTotal += $bk->Price * $bk->Qty;
            }



            //扣掉優惠
            $notBack = DB::table('CartBuy')->where('OrderId', $_POST['orderId'])->where('Progress', '!=', '5')->where('Progress', '!=', '4')->get();
            //$subTotal = 0;
            $disId = DB::table('OrderDiscount')->where('OrderId', $_POST['orderId'])->where('Status', '0')->where('UserId', $request->session()->get('userId'))->get();
            //$total = DB::table('OrderTable')->where('OrderId', $_POST['orderId'])->first();
            //$total->Total -=  $backTotal;
            $total = 0;
            $subTotal = 0;
            foreach($notBack as $nb){
                $total += $nb->Price * $nb->Qty;
            }
            foreach($disId as $dis){
                $sub = DB::table('Discount')->where('id', $dis->DiscountId)->first();
                if($total < $sub->ReachGold){
                    $subTotal += $sub->Discount;
                    DB::update('update OrderDiscount set Status = ? where id = ?', [1, $dis->id]);
                }
            }
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y-m-d H:i:s");
            DB::insert('insert into Plate (UserId, ChangeGold, Date) values (?, ?, ?)', [$request->session()->get('userId'), 0-$subTotal, $date]);

            $gold = DB::table('User')->where('id', $request->session()->get('userId'))->first();
            $gold->Gold = $gold->Gold - $subTotal;
            
            if($gold->Gold >= 0){
                DB::update('update User set Gold = ? where id = ?', [$gold->Gold, $request->session()->get('userId')]);
            }else{
                DB::update('update User set Gold = ? where id = ?', [0, $request->session()->get('userId')]);
            }





        }

        return redirect('/orderView/'.$_POST['orderId']);
    }



    function levelUp($account, $pay, $maxLevel)
    {
        //等級提升
        //if($total > $request->session()->get('level')*10000 && $request->session()->get('level') < 5){
        if($total > $account->Level * $pay && $account->Level < $maxLevel){
            //$lv = $request->session()->get('level') + 1;
            $lv = $account->Level + 1;
            DB::update('update User set Level = ? where id = ?', [$lv, $request->session()->get('userId')]);
            $request->session()->put('level', $lv);
        }
    }


}
