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

	Route::get('/ownerOrderList/{orderId}', 'OwnerUserController@orderList');

	Route::get('/userDetail/{orderId}/{UserId}', 'OwnerUserController@userDetail');


	Route::get('/chinese', 'OwnerUserController@ChgCh');

	Route::get('/english', 'OwnerUserController@ChgEn');

	Route::get('/ochinese', 'OwnerUserController@OChgCh');

	Route::get('/oenglish', 'OwnerUserController@OChgEn');


	Route::get('/warehouse', 'OwnerUserController@listMerchandise');

	Route::get('/warehouseCreate', function(){
		return view('createMer');
	});

	Route::get('/viewReport', 'OwnerUserController@reportView');


	Route::get('/oRegister', function(){
		return view('oRegister');
	});

	Route::get('/discountCre', function(){
		return view('discount');
	});

	Route::get('/discountMan', 'OwnerUserController@discountView');

	Route::get('/backView', 'OwnerUserController@backView');

	//Route::get('/warehouseUpdate/{merId}', 'OwnerUserController@updateMerchandise');

	Route::get('/warehouseDetail/{merId}', 'OwnerUserController@listMerchandiseDetail');

	Route::get('/memberDetailPost/{userId}', 'OwnerUserController@memberDetailView');

	Route::get('/editPasswd/{userId}', function($userId){
		return view('memberEditPass')->with('userId', $userId);
	});


	//--------post


	Route::post('/postOLogin', 'OwnerUserController@login');

	

	Route::post('/memberEditPost', 'OwnerUserController@memberEdit');

	Route::post('/orderSearch', 'OwnerUserController@orderViewSearch');

	Route::post('/orderSearchNum', 'OwnerUserController@orderViewSearchNum');

	Route::post('/merGo', 'OwnerUserController@merchandiseGo');

	//Route::post('/warehouseDetail', 'OwnerUserController@listMerchandiseDetail');

	Route::post('/warehouseUpdate', 'OwnerUserController@updateMerchandise');

	Route::post('/warehouseInsert', 'OwnerUserController@insertMerchandise');

	Route::post('/oRegisterPost', 'OwnerUserController@register');

	Route::post('/discountPost', 'OwnerUserController@disCreate');

	Route::post('/disCountEditPost', 'OwnerUserController@disCountEditPost');

	Route::post('/discountEdit', 'OwnerUserController@disCountEdit');

	Route::post('/discountDel', 'OwnerUserController@discountDel');

	Route::post('/backDo', 'OwnerUserController@backDo');
	
	Route::post('/memberDel', 'OwnerUserController@memberDel');

	Route::post('/merDel', 'OwnerUserController@merchandiseDel');

	Route::post('/editPasswdPost', 'OwnerUserController@memberEditPasswd');

});