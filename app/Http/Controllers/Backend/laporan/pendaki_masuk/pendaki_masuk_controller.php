<?php

namespace App\Http\Controllers\Backend\laporan\pendaki_masuk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\tb_pendakian as pendakian;

use DB;
use PDF;

class pendaki_masuk_controller extends Controller
{
    protected function index(){
    	return view('backend.laporan.pendaki_masuk.index');
    } 

    protected function resource(){
    	$pos = DB::table('tb_pos_pendakian')->select('pp_id as id', 'pp_nama as text')->get();

    	return json_encode(
    		[
    			'pos'	=> $pos
    		]
    	);
    }

    protected function result(Request $request){
    	$jalur = DB::table('tb_pos_pendakian')->where('pp_id', '=', $request->jalur)->first();
    	$tgl1 = $this->tgl_generator($request->tgl_1);
    	$tgl2 = $this->tgl_generator($request->tgl_2);

    	$data = pendakian::where('pd_tgl_naik', '>=', $tgl1)
    				->where('pd_tgl_naik', '<=', $tgl2)
    				->with('anggota')
    				->get();

    	$pdf = PDF::loadView('backend.pdf.laporan', compact('jalur', 'data'));

    	return $pdf->stream();
    }

    private function tgl_generator(String $tgl){
    	return explode('/', $tgl)[2].'-'.explode('/', $tgl)[1].'-'.explode('/', $tgl)[0];
    }
}
