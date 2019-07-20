<?php

namespace App\Http\Controllers\Backend\laporan\pendaki_masuk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\tb_pendakian as pendakian;

use DB;
use Auth;
use PDF;

class pendaki_masuk_controller extends Controller
{
    protected function index(){
        if(!Auth::user()->can('read', 'laporan'))
            return view('error.480');

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

        // return json_encode($request-all())

    	$jalur = DB::table('tb_pos_pendakian')->where('pp_id', '=', $request->jalur)->first();
    	$tgl1 = $this->tgl_generator($request->tgl_1);
    	$tgl2 = $this->tgl_generator($request->tgl_2);

    	$data = pendakian::where('pd_tgl_naik', '>=', $tgl1)
                    ->leftJoin('tb_pos_pendakian as b', 'b.pp_id', '=', 'tb_pendakian.pd_pos_turun')
                    ->join('regencies', 'regencies.id', '=', 'tb_pendakian.pd_kabupaten')
    				->where('pd_tgl_naik', '<=', $tgl2)
                    ->where('pd_pos_pendakian', $request->jalur)
    				->with('anggota')
    				->get();

    	$pdf = PDF::loadView('backend.pdf.laporan', compact('jalur', 'data'))->setPaper('a4', 'landscape');

        // return json_encode($data);

    	return $pdf->stream();
    }

    private function tgl_generator(String $tgl){
    	return explode('/', $tgl)[2].'-'.explode('/', $tgl)[1].'-'.explode('/', $tgl)[0];
    }
}
