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

Route::get('/detail', function(Request $request){
	$merdetail = DB::table('Merchandise')
		  			->where('id', $_GET['merId'])
		  			->first();
	$user = $request->session()->get('userId');
	return view('detail') -> with('merdetail', $merdetail) -> with('user', $user);
});



Route::get('/cart', 'MerchandiseController@cartList');

Route::get('/mainCart', function(Request $request){
	$cartTmp = DB::table('tmpShop')->where('UserId', $request->session()->get('userId'))->get();
	return view('cart') -> with('cartTmp', $cartTmp);
});

Route::get('/editPage', 'UserController@EditSelect');



Route::get('/cart', 'MerchandiseController@tmpCartView');

Route::get('/commitBuy', 'MerchandiseController@commitToBuy');

Route::get('/editPasswd', function(){
	return view('editPasswd');
});

Route::get('/orderView', 'MerchandiseController@OrderList');


Route::get('/report', function(){
	return view('report');
});

Route::get('/delAll', 'MerchandiseController@deleteAll');


Route::get('/chinese', 'UserController@ChgCh');

Route::get('/english', 'UserController@ChgEn');



//--------post

Route::post('/postReg', 'UserController@Register');


Route::post('/postLogin', 'UserController@Login');

Route::post('/auth', 'UserController@Auth');

Route::post('/postEdit', 'UserController@Edit');

Route::post('/search', 'MerchandiseController@Search');

Route::post('/buy', 'MerchandiseController@TmpBuy');

Route::post('/orderOk', 'MerchandiseController@orderOk');

Route::post('/orderCancel', 'MerchandiseController@orderCancel');

Route::post('/edPassPost', 'UserController@EditPasswd');

Route::post('/reportPost', 'UserController@Report');


Route::post('/delTmp', 'MerchandiseController@DelTmp');




//------------後台

Route::prefix('admin') -> group(function(){

	Route::get('/ologin', function(){
		return view('oLogin');
	});

	Route::get('/ologout', 'OwnerUserController@logout');

	Route::get('/omain', function(Request $request){
		if(null !== $request->session()->get('oUserId')){
			$account = DB::table('O_User')
	    				->where('id', $request->session()->get('oUserId'))
	   					->first();

	   		$request->session()->put('oUserAuth', $account->Auth);
   		}

		return view('ownerMain') -> with('oUId', $request->session()->get('oUserId')) -> with('oUName', $request->session()->get('oUserName')) -> with('oUserAuth', $request->session()->get('oUserAuth'));

	});


	Route::get('/memberEdit', 'OwnerUserController@memberView');

	Route::get('/ownerOrderView', 'OwnerUserController@orderView');

	Route::get('/userDetail', 'OwnerUserController@userDetail');


	Route::get('/chinese', 'OwnerUserController@ChgCh');

	Route::get('/english', 'OwnerUserController@ChgEn');


	Route::get('/warehouse', 'OwnerUserController@listMerchandise');

	Route::get('/warehouseCreate', function(){
		return view('createMer');
	});

	Route::get('/viewReport', 'OwnerUserController@reportView');



	//--------post


	Route::post('/postOLogin', 'OwnerUserController@login');

	Route::post('/memberDetailPost', 'OwnerUserController@memberDetailView');

	Route::post('/memberEditPost', 'OwnerUserController@memberEdit');

	Route::post('/orderSearch', 'OwnerUserController@orderViewSearch');

	Route::post('/orderSearchNum', 'OwnerUserController@orderViewSearchNum');

	Route::post('/merGo', 'OwnerUserController@merchandiseGo');

	Route::post('/warehouseDetail', 'OwnerUserController@listMerchandiseDetail');

	Route::post('/warehouseUpdate', 'OwnerUserController@updateMerchandise');

	Route::post('/warehouseInsert', 'OwnerUserController@insertMerchandise');

});