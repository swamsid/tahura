<?php

namespace App\Http\Controllers\backend\master\jabatan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\tb_menu as menu;
use App\Model\backend\jabatan;

use DB;
use Auth;

class jabatan_controller extends Controller
{
    protected function index(){

        if(!Auth::user()->can('read', 'master data jabatan'))
            return view('error.480');

    	$data = DB::table('jabatan')->get();
    	return view('backend.master.jabatan.index', compact('data'));
    }

    protected function create(){
        if(!Auth::user()->can('create', 'master data jabatan') && !Auth::user()->can('update', 'master data jabatan') && !Auth::user()->can('delete', 'master data jabatan'))
           return view('error.480');

    	return view('backend.master.jabatan.create');
    }

    protected function resource(){
    	$role = menu::distinct('m_group')->select('m_group')->with('detail')->get();
    	$jabatan = jabatan::get();

    	return json_encode([
    		'role'		=> $role,
    		'jabatan' 	=> $jabatan,
    	]);
    }

    protected function save(Request $request){
    	// return json_encode($request->all());

    	try {
    		
    		DB::beginTransaction();

    		$id = DB::table('jabatan')->max('id_jabatan') + 1;
    		$nomor = 'JB-'.str_pad($id, 4, "0", STR_PAD_LEFT);

    		DB::table('jabatan')->insert([
    			'id_jabatan'		=> $id,
    			'nomor_jabatan' 	=> $nomor,
    			'nama_jabatan'		=> $request->nama_jabatan
    		]);

    		DB::commit();

    		$jabatan = jabatan::get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Jabatan Berhasil Disimpan',
    			'jabatan'	=> $jabatan
    		]);


    	} catch (Exception $e) {

    		DB::rollback();
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Ups. Terjadi kesalahan. segera hubungi developer. err => '.$e
    		]);
    	}
    }

    protected function update(Request $request){
    	// return json_encode($request->all());

    	$jabatan = DB::table('jabatan')->where('id_jabatan', $request->id);

    	if(!$jabatan->first()){
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Data jabatan yang dimaksud tidak bisa ditemukan'
    		]);
    	}

    	try {
    		
    		DB::beginTransaction();

    		$id = $jabatan->first()->id_jabatan;

    		$jabatan->update([
    			'nama_jabatan'		=> $request->nama_jabatan
    		]);

    		DB::commit();

    		$jabatan = jabatan::get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Jabatan Berhasil Disimpan',
    			'jabatan'	=> $jabatan
    		]);


    	} catch (Exception $e) {

    		DB::rollback();
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Ups. Terjadi kesalahan. segera hubungi developer. err => '.$e
    		]);
    	}
    }

    protected function delete(Request $request){
    	// return json_encode($request->all());

    	$jabatan = DB::table('jabatan')->where('id_jabatan', $request->id);

    	if(!$jabatan->first()){
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Data jabatan yang dimaksud tidak bisa ditemukan'
    		]);
    	}

    	$cek = DB::table('user')->where('id_jabatan', $request->id)->first();

    	if($cek){
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Beberapa pegawai di system menduduki jabatan ini. Data tidak bisa disimpan'
    		]);
    	}

    	try {
    		
    		DB::beginTransaction();

    		$jabatan->delete();

    		DB::commit();

    		$jabatan = jabatan::get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Jabatan Berhasil Dihapus',
    			'jabatan'	=> $jabatan
    		]);


    	} catch (Exception $e) {

    		DB::rollback();
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Ups. Terjadi kesalahan. segera hubungi developer. err => '.$e
    		]);
    	}
    }
}
