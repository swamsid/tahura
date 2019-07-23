<?php

namespace App\Http\Controllers\backend\master\pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\tb_menu as menu;
use App\Model\backend\user;

use DB;
use Auth;
use File;

class pegawai_controller extends Controller
{
    protected function index(){

        if(!Auth::user()->can('read', 'data_pegawai'))
            return view('error.480');

    	$data = DB::table('user')->join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->get();

    	return view('backend.master.pegawai.index', compact('data'));
    }

    protected function create(){
        if(!Auth::user()->can('create', 'data_pegawai') && !Auth::user()->can('update', 'data_pegawai') && !Auth::user()->can('delete', 'master data pegawai'))
    	   return view('error.480');

        return view('backend.master.pegawai.create');
    }

    protected function resource(){
    	$jabatan = DB::table('jabatan')->select('id_jabatan as id', DB::raw('concat(nomor_jabatan, " - ", nama_jabatan) as text'))->get();

    	$user = user::join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->with('roles')->get();

        $role = menu::distinct('m_group')->select('m_group')->with('detail')->get();

        $password = rand(100000, 999999);

    	return json_encode([
    		'jabatan'	=> $jabatan,
    		'user'		=> $user,
            'role'      => $role,
            'password'  => $password
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
    		
            // return json_encode($request->all());

    		$id = DB::table('user')->max('user_id') + 1;

    		DB::table('user')->insert([
    			'user_id'		=> $id,
    			'id_jabatan' 	=> $request->jabatan_pegawai,
    			'nip'			=> $request->nip_pegawai,
    			'password'		=> $request->password_pegawai,
    			'nama'			=> $request->nama_pegawai,
                'posisi'        => $request->posisi_pegawai
    		]);

    		$data = DB::table('user')->where('user_id', $id);
    		$images = $request->file('images');

    		if(!is_null($images)){
                if($images != "null"){
                    $this->upload($images, $data);
                }
            }

            $menu = DB::table('tb_menu')->select('m_id')->get();
            $feeder = [];

            foreach ($menu as $key => $value) {

                array_push($feeder, [
                    "rm_user"       => $id,
                    "rm_menu"       => $value->m_id,
                    "rm_read"       => (isset($request->read[$value->m_id])) ? '1' : '0',
                    "rm_create"     => (isset($request->create[$value->m_id])) ? '1' : '0',
                    "rm_update"     => (isset($request->update[$value->m_id])) ? '1' : '0',
                    "rm_delete"     => (isset($request->delete[$value->m_id])) ? '1' : '0',
                ]);
            }

            DB::table('tb_role_menu')->insert($feeder);
    		DB::commit();

    		$user = user::join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->with('roles')->get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Pegawai Berhasil Disimpan',
    			'user'		=> $user,
                'password'  => $password = rand(100000, 999999)
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
    		
    		// $id = DB::table('user')->max('user_id') + 1;

    		$user->update([
    			'id_jabatan' 	   => $request->jabatan_pegawai,
    			'nip'			   => $request->nip_pegawai,
    			'password'		   => $request->password_pegawai,
    			'nama'			   => $request->nama_pegawai,
                'posisi'           => $request->posisi_pegawai
    		]);

    		$data = $user;
    		$images = $request->file('images');

    		if(!is_null($images)){
                if($images != "null"){
                    $this->upload($images, $data);
                }
            }

            DB::table('tb_role_menu')->where('rm_user', $request->id)->delete();

            $menu = DB::table('tb_menu')->select('m_id')->get();
            $feeder = [];

            foreach ($menu as $key => $value) {

                array_push($feeder, [
                    "rm_user"       => $request->id,
                    "rm_menu"       => $value->m_id,
                    "rm_read"       => (isset($request->read[$value->m_id])) ? '1' : '0',
                    "rm_create"     => (isset($request->create[$value->m_id])) ? '1' : '0',
                    "rm_update"     => (isset($request->update[$value->m_id])) ? '1' : '0',
                    "rm_delete"     => (isset($request->delete[$value->m_id])) ? '1' : '0',
                ]);
            }

            DB::table('tb_role_menu')->insert($feeder);

    		DB::commit();

    		$user = user::join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->with('roles')->get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Pegawai Berhasil DIperbarui',
    			'user'		=> $user,
                'password'  => $password = rand(100000, 999999)
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

    		$user = user::join('jabatan', 'jabatan.id_jabatan', '=', 'user.id_jabatan')->select('user.*', 'jabatan.nama_jabatan')->with('roles')->get();

    		return json_encode([
    			'status'	=> 'success',
    			'message'	=> 'Data Pegawai Berhasil Dihapus',
    			'user'		=> $user,
                'password'  => $password = rand(100000, 999999)
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
