<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class tb_kontak_darurat extends Model
{
    protected $table = 'tb_kontak_darurat';
    protected $primaryKey = ['kd_pendakian', 'kd_nomor'];
    public $incrementing = false;
}
