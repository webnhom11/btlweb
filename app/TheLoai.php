<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //Khai báo bảng
    protected $table = "TheLoai";

    //lấy tất cả loại tin
    public function loaitin(){
    	return $this->hasMany('App\LoaiTin', 'idTheLoai', 'id');
    }

    //lấy tất cả các tin tức
    public function tintuc(){
    	return $this->hasMantThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
    }
}
