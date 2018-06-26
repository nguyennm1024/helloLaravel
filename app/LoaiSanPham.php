<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    //
    protected $table = 'loaisanpham';
    //Turn off create at and update at
    public $timestamps = false;
    public function sanpham() {
        return $this->hasMany('App\SanPham','id_loaisanpham','id');
    }

}
