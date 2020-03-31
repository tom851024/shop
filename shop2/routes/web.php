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

Route::get('/delTmp', 'MerchandiseController@DelTmp');

Route::get('/cart', 'MerchandiseController@tmpCartView');

Route::get('/commitBuy', 'MerchandiseController@commitToBuy');



//--------post

Route::post('/postReg', 'UserController@Register');


Route::post('/postLogin', 'UserController@Login');

Route::post('/auth', 'UserController@Auth');

Route::post('/postEdit', 'UserController@Edit');

Route::post('/search', 'MerchandiseController@Search');

Route::post('/buy', 'MerchandiseController@TmpBuy');

