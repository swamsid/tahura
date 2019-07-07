<?php

namespace App\Model\backend;

use Illuminate\Database\Eloquent\Model;

class tb_logistik extends Model
{
    protected $table = 'tb_logistik';
    protected $primaryKey = ['lg_pendakian', 'lg_nomor'];
    public $incrementing = false;
}
