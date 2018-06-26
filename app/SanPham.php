<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = 'sanpham';
    //Turn off create at and update at
    public $timestamps = false;
    public function loaisanpham() {
        return $this->belongsTo('App\LoaiSanPham','id_loaisanpham','id');  
    }
}