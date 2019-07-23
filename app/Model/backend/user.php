<?php

namespace App\Model\backend;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Session;

class user extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable,
        CanResetPassword;

    protected $table = 'user';
    protected $primaryKey = 'user_id'; 

    public $remenber_token = false;

    public function roles(){
        return $this->hasMany('App\Model\backend\tb_role_menu', 'rm_user', 'user_id');
    }

    public function can (String $role, String $menu){
    	$roles = Session::get('roles');
    	$key = array_search(strtolower($menu), array_column($roles, 'role'));
    	$grantAccess = 0;

    	if(!isset($key))
    		return 0;

    	switch (strtolower($role)) {
    		case 'read':
    			$grantAccess = ($roles[$key]->rm_read) ? 1 : 0;
    			break;

    		case 'create':
    			$grantAccess = ($roles[$key]->rm_create) ? 1 : 0;
    			break;

    		case 'update':
    			$grantAccess = ($roles[$key]->rm_update) ? 1 : 0;
    			break;

    		case 'delete':
    			$grantAccess = ($roles[$key]->rm_delete) ? 1 : 0;
    			break;
    		
    		default:
    			# code...
    			break;
    	}

    	return $grantAccess;
    }

    public function hasAccessTo(String $menu){
        $roles = Session::get('roles');
        $key = array_search(strtolower($menu), array_column($roles, 'grup'));
        $grantAccess = 1;

        if(!isset($key))
            return 0;

        if($roles[$key]->rm_read == 0 && $roles[$key]->rm_create == 0 && $roles[$key]->rm_update == 0 && $roles[$key]->rm_delete == 0)
            return 0;
        else
            return 1;
    }
}
