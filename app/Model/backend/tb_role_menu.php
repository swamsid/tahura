<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class tb_role_menu extends Model
{
    protected $table = 'tb_role_menu';
    protected $primaryKey = ['rm_jabatan', 'rm_menu'];
    public $incrementing = false;
}
