<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class tb_menu extends Model
{
    protected $table = 'tb_menu';
    protected $primaryKey = 'm_id';

    public function detail(){
    	return $this->hasMany('App\Model\backend\tb_menu', 'm_group', 'm_group');
    }
}
