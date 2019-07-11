<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';

    public function roles(){
    	return $this->hasMany('App\Model\backend\tb_role_menu', 'rm_jabatan', 'id_jabatan');
    }
}
