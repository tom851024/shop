<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MerchandiseController extends Controller
{
    //

    public function ListMerchandise()
    {
    	$merchandise = DB::table('Merchandise') -> get();
    	return view('mainPage') -> with('merchandise', $merchandise);
    }
}
