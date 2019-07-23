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

            // return json_encode($request->all());

	    	if($user && $user->password == $request->password){
				Auth::login($user);

                $roles = DB::table('tb_role_menu')
                        ->where('rm_user', $user->user_id)
                        ->join('tb_menu', 'tb_menu.m_id', '=', 'tb_role_menu.rm_menu')
                        ->select('tb_role_menu.*', DB::raw('lower(tb_menu.m_name) as name'), DB::raw('lower(tb_menu.m_group) as grup'), DB::raw('lower(tb_menu.m_role) as role'))
                        ->get()->toArray();

                // return json_encode($roles);

	            Session([
	                'jabatan'   => $user->nama_jabatan,
                    'roles'     => $roles
	            ]);

                if(!$request->path == '' || !is_null($request->path)){

                    $params = (!$request->params == '' || !is_null($request->params)) ? $request->params : '';

                    return redirect($request->path.'?'.$params);
                }

                // return 'aa';
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
