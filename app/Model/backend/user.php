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

    public function can (String $role, String $menu){
    	$roles = Session::get('roles');
    	$key = array_search(strtolower($menu), array_column($roles, 'name'));
    	$grantAccess = 0;

    	if(!$key)
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
    			$grantAccess = ($roles[$key]->rm_rm_delete) ? 1 : 0;
    			break;
    		
    		default:
    			# code...
    			break;
    	}

    	return $key;


    }
}
