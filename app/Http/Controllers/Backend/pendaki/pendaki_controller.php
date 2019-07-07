<?php

namespace App\Http\Controllers\backend\pendaki;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pendaki_controller extends Controller
{
    public function index(){
    	return view('backend.pendaki.index');
    }
}
