<?php

namespace App\Http\Controllers\backend\pendaki;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class pendaki_controller extends Controller
{
    public function index(){
    	$data = DB::table('tb_pendakian')->get();
    	return view('backend.pendaki.index', compact('data'));
    }
}
