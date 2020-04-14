<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-------get
/*Route::get('/', function () {
    return view('mainPage');
    //return view('welcome');
});*/
//-----------------------前台

Route::get('/', 'MerchandiseController@ListMerchandise');

Route::get('/register', function(){
	return view('register');
});

Route::get('/login', function(){
	return view('login');
});

Route::get('/logout', 'UserController@Logout');

/*Route::get('/detail/{merId}', function(Request $request){
	$merdetail = DB::table('Merchandise')
		  			->where('id', $_GET['merId'])
		  			->first();
	$user = $request->session()->get('userId');
	return view('detail') -> with('merdetail', $merdetail) -> with('user', $user);
});*/

Route::get('/detail/{merId}', 'MerchandiseController@merDetail');



Route::get('/cart', 'MerchandiseController@cartList');

Route::get('/mainCart', function(Request $request){
	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
	return view('cart') -> with('cartTmp', $cartTmp);
});

Route::get('/editPage', 'UserController@EditSelect');

Route::get('/commitBuy', 'MerchandiseController@commitToBuy');

Route::get('/cart', 'MerchandiseController@tmpCartView');

Route::get('/editPasswd', function(){
	return view('editPasswd');
});

Route::get('/order', 'MerchandiseController@selectOrder');

Route::get('/orderView/{orderId}', 'MerchandiseController@OrderList');


Route::get('/report', function(){
	return view('report');
});

Route::get('/delAll', 'MerchandiseController@deleteAll');


Route::get('/chinese', 'UserController@ChgCh');

Route::get('/english', 'UserController@ChgEn');


Route::get('/backView/{cartId}', 'MerchandiseController@backView');

Route::get('/commitBuyWithPlate', 'MerchandiseController@plateView');

Route::get('/buyWithPlateFirst', 'MerchandiseController@buyWithPlateFirst');

Route::get('/reply', 'UserController@Reply');

Route::get('/userView/{orderId}/{userId}', 'UserController@userView');

Route::get('/plate', 'UserController@plateLook');

Route::get('/reportView', 'UserController@reportView');

Route::get('/reportChat/{roomId}', 'UserController@reportChat');


//--------post

Route::post('/postReg', 'UserController@Register');


Route::post('/postLogin', 'UserController@Login');

Route::post('/auth', 'UserController@Auth');

Route::post('/postEdit', 'UserController@Edit');

Route::post('/search', 'MerchandiseController@Search');

Route::post('/buy', 'MerchandiseController@TmpBuy');

//Route::post('/orderOk', 'MerchandiseController@orderOk');

//Route::post('/orderCancel', 'MerchandiseController@orderCancel');

Route::post('/orderBack', 'MerchandiseController@orderBack');


Route::post('/edPassPost', 'UserController@EditPasswd');

Route::post('/reportPost', 'UserController@Report');

Route::post('/delTmp', 'MerchandiseController@DelTmp');

Route::post('/buyWithPlate', 'MerchandiseController@commitToBuyWithPlate');

Route::post('/orderCheck', 'MerchandiseController@orderCheck');

Route::post('/reportReply', 'UserController@reportReply');






