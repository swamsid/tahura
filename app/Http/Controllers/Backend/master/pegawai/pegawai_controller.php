<?php

namespace App\Http\Controllers\backend\master\pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use File;

class pegawai_controller extends Controller
{
    protected function index(){
    	$data = DB::table('user')->join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->get();

    	return view('backend.master.pegawai.index', compact('data'));
    }

    protected function create(){
    	return view('backend.master.pegawai.create');
    }

    protected function resource(){
    	$jabatan = DB::table('jabatan')->select('id_jabatan as id', DB::raw('concat(nomor_jabatan, " - ", nama_jabatan) as text'))->get();
    	$user = DB::table('user')->join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->get();

    	return json_encode([
    		'jabatan'	=> $jabatan,
    		'user'		=> $user
    	]);
    }

    protected function save(Request $request){

    	$cek = DB::table('user')->where('nip', $request->nip_pegawai)->first();

    	if($cek){
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Nip yang anda inputkan sudah digunakan oleh user lain'
    		]);
    	}

    	DB::beginTransaction();

    	try {
    		
    		$id = DB::table('user')->max('user_id') + 1;

    		DB::table('user')->insert([
    			'user_id'		=> $id,
    			'id_jabatan' 	=> $request->jabatan_pegawai,
    			'nip'			=> $request->nip_pegawai,
    			'password'		=> $request->password_pegawai,
    			'nama'			=> $request->nama_pegawai,
    		]);

    		$data = DB::table('user')->where('user_id', $id);
    		$images = $request->file('images');

    		if(!is_null($images)){
                if($images != "null"){
                    $this->upload($images, $data);
                }
            }

    		DB::commit();

    		$user = DB::table('user')->join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Pegawai Berhasil Disimpan',
    			'user'		=> $user
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

    	$cek = DB::table('user')->where('nip', $request->nip_pegawai)->where('user_id', '!=', $request->id)->first();

    	if($cek){
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Nip yang anda inputkan sudah digunakan oleh user lain'
    		]);
    	}

    	$user = DB::table('user')->where('user_id', $request->id);

    	if(!$user){
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'User yang anda pilih tidak bisa ditemukan oleh system..'
    		]);
    	}

    	DB::beginTransaction();

    	try {
    		
    		$id = DB::table('user')->max('user_id') + 1;

    		$user->update([
    			'id_jabatan' 	=> $request->jabatan_pegawai,
    			'nip'			=> $request->nip_pegawai,
    			'password'		=> $request->password_pegawai,
    			'nama'			=> $request->nama_pegawai,
    		]);

    		$data = $user;
    		$images = $request->file('images');

    		if(!is_null($images)){
                if($images != "null"){
                    $this->upload($images, $data);
                }
            }

    		DB::commit();

    		$user = DB::table('user')->join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Pegawai Berhasil DIperbarui',
    			'user'		=> $user
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

    	$user = DB::table('user')->where('user_id', $request->id);

    	if(!$user){
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'User yang anda pilih tidak bisa ditemukan oleh system..'
    		]);
    	}

    	DB::beginTransaction();

    	try {
    		$path = public_path().'/backend/img/upload/pegawai/'.$request->id;

    		if (File::exists($path)){
	        	File::deleteDirectory($path);
	        }

    		$user->delete();

    		DB::commit();

    		$user = DB::table('user')->join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Pegawai Berhasil Dihapus',
    			'user'		=> $user
    		]);

    	} catch (Exception $e) {
    		DB::rollback();
    		return json_encode([
    			'status'	=> 'error',
    			'message'	=> 'Ups. Terjadi kesalahan. segera hubungi developer. err => '.$e
    		]);
    	}
    }

    public function upload($image, $data){
        $path = public_path().'/backend/img/upload/pegawai/'.$data->first()->user_id;

        $name = rand(1000, 1999);

        if (File::exists($path)){
        	File::deleteDirectory($path);
        }

        if(File::makeDirectory($path,0777,true)){
            $destinationPath = $path;
            $extension  = $image->getClientOriginalExtension();
            $fileName = $name.'.'.$extension;

            if($image->move($destinationPath, $fileName)){
                $data->update(['foto' => $fileName]);
            }

        }else{
            return false;
        }
    }
}
