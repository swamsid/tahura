<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function wna(){
        // return $this;
        return DB::table('tb_anggota_pendakian')
                        ->where('ap_pendakian', $this->pd_id)
                        ->where('ap_kewarganegaraan', 'WNA')
                        ->select(DB::raw('coalesce(count(ap_nomor), 0) as tot'))
                        ->first();
    }

    public function wni(){
        return DB::table('tb_anggota_pendakian')
                        ->where('ap_pendakian', $this->pd_id)
                        ->where('ap_kewarganegaraan', 'WNI')
                        ->select(DB::raw('coalesce(count(ap_nomor), 0) as tot'))
                        ->first();
    }
}
