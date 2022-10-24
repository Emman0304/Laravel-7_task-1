<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tableController extends Controller
{
    public function display (){

        $data = DB::table('Products')->get();

        return view('table',['data'=>$data]);
    }
    
    
}
