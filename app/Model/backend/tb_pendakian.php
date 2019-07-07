<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class tb_pendakian extends Model
{
    protected $table = 'tb_pendakian';
    protected $primaryKey = 'pd_id';

    public function kontak(){
    	return $this->hasMany('App\Model\backend\tb_kontak_darurat', 'kd_pendakian', 'pd_id');
    }

    public function anggota(){
    	return $this->hasMany('App\Model\backend\tb_anggota_pendakian', 'ap_pendakian', 'pd_id');
    }

    public function peralatan(){
    	return $this->hasOne('App\Model\backend\tb_peralatan', 'pr_pendakian', 'pd_id');
    }

    public function logistik(){
    	return $this->hasMany('App\Model\backend\tb_logistik', 'lg_pendakian', 'pd_id');
    }
}
