<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class AjaxController extends Controller
{
    public function getLoaiTin($idTheLoai){
        $loaitin = LoaiTin::Where('idTheLoai', $idTheLoai)->get();
        foreach ($loaitin as $lt) {
            echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
        }
    }

    public function getTinTuc($idLoaiTin){
        $tintuc = TinTuc::Where('idLoaiTin', $idLoaiTin)->get();
        return response()->json($tintuc);
     }
}
