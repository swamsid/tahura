<?php

namespace App\Http\Controllers\Backend\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\user;

use Auth;
use DB;
use Session;

class authenticate extends Controller
{
    protected function authenticate(Request $request){
    	try {
    		
    		$nip = str_replace(' ', '', $request->nip);
    		$user = user::where('nip', $nip)->join('jabatan', 'user.id_jabatan', '=', 'jabatan.id_jabatan')->first();

	    	if($user && $user->password == $request->password){
				Auth::login($user);

                $roles = DB::table('tb_role_menu')
                        ->where('rm_jabatan', $user->id_jabatan)
                        ->join('tb_menu', 'tb_menu.m_id', '=', 'tb_role_menu.rm_menu')
                        ->select('tb_role_menu.*', DB::raw('lower(tb_menu.m_name) as name'), 'tb_menu.m_group as group')
                        ->get()->toArray();

	            Session([
	                'jabatan'   => $user->nama_jabatan,
                    'roles'     => $roles
	            ]);

				return redirect()->route('wpadmin.dashboard');
			}

			Session::flash('message', 'Kombinasi Nip dan Password Tidak Ditemukan');

	    	return redirect()->back()->withInput($request->all());

    	} catch (Exception $e) {
    		Session::flash('message', 'Terjadi kesalahan, segera hubungi bagian IT.');
    		return redirect()->back()->withInput($request->all());
    	}
    }

    protected function logout(){
    	Auth::logout();
    	Session::flush();

    	return redirect()->Route('wpadmin.auth.login');
    }
}
