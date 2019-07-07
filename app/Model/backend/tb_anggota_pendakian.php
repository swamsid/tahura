<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class tb_anggota_pendakian extends Model
{
    protected $table = 'tb_anggota_pendakian';
    protected $primaryKey = ['ap_pendakian', 'ap_nomor'];
    public $incrementing = false;
}
