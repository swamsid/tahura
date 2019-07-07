<?php

namespace App\Http\Controllers\Backend\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\backend\user;

use Auth;
use Session;

class authenticate extends Controller
{
    protected function authenticate(Request $request){
    	try {
    		
    		$nip = str_replace(' ', '', $request->nip);
    		$user = user::where('nip', $nip)->first();

	    	if($user && $user->password == $request->password){
				Auth::login($user);

	            Session([
	                'jabatan'   => $user->id_jabatan,
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
