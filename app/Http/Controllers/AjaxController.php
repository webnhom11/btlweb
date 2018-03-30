<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai){
        $loaitin = LoaiTin::Where('idTheLoai', $idTheLoai)->get();
        foreach ($loaitin as $lt) {
            echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
        }
    }
   
}
