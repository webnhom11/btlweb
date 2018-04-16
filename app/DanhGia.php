<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    //
    protected $table = "DanhGia";

    public function tintuc()
    {
    	return $this->belongsTo('App\TinTuc', 'idTinTuc', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'idUser', 'id');
    }
    

}
