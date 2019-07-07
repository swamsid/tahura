<?php

namespace App\Http\Controllers\backend\pendaki;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\tb_pendakian as pendakian;

use DB;
use Session;

class pendaki_controller extends Controller
{
    protected function index(){
    	$data = DB::table('tb_pendakian')->get();
    	return view('backend.pendaki.index', compact('data'));
    }

    protected function detail(Request $request){
    	$data = pendakian::where('pd_id', 1)
    				->leftJoin('tb_pos_pendakian as a', 'a.pp_id', '=', 'tb_pendakian.pd_pos_pendakian')
    				->leftJoin('tb_pos_pendakian as b', 'b.pp_id', '=', 'tb_pendakian.pd_pos_turun')
                    ->leftJoin('provinces', 'provinces.id', 'pd_provinsi')
                    ->leftJoin('regencies', 'regencies.id', 'pd_kabupaten')
                    ->leftJoin('districts', 'districts.id', 'pd_kecamatan')
                    ->leftJoin('villages', 'villages.id', 'pd_desa')
    				->with('kontak')
    				->with('anggota')
    				->with('peralatan')
    				->with('logistik')
    				->select(
                        'tb_pendakian.*',
                        'a.pp_nama as pos_naik',
                        'b.pp_nama as pos_turun',
                        'provinces.name as provinsi',
                        'regencies.name as kabupaten',
                        'districts.name as kecamatan',
                        'villages.name as kelurahan',
                    )->first();

    	$pos = DB::table('tb_pos_pendakian')->get();

        // return json_encode($data);
    	return view('backend.pendaki.detail.index', compact('data', 'pos'));
    }

    protected function konfirmasi(Request $request){
    	// return json_encode($request->all());

    	try {
    		
    		$context = DB::table('tb_pendakian')->where('pd_id', $request->id);

    		if(!$context->first()){
    			Session::flash('message', 'Data pendakian tidak bisa ditemukan');
    			return redirect()->route('wpadmin.pendaki.index');
    		}

    		$context->update([
    			'pd_status'		=> $request->sts
    		]);

    		if($request->sts == 'sudah naik'){
    			$context->update([
	    			'pd_pos_pendakian'	=> $request->pos,
	    			'pd_tgl_naik'		=> date('Y-m-d')
	    		]);
    		}else if($request->sts == 'sudah turun'){
    			$context->update([
	    			'pd_pos_turun'		=> $request->pos,
	    			'pd_tgl_turun'		=> date('Y-m-d')
	    		]);
    		}

    		DB::commit();
    		Session::flash('message', 'Status pendakian berhasil diubah menjadi '.$request->sts);
    		return redirect()->route('wpadmin.pendaki.index');

    	} catch (Exception $e) {
    		DB::rollback();

    		return json_encode([
    			"status"	=> 'error',
    			"message"	=> 'System mengalami masalah '.$e
    		]);
    	}
    }
}
