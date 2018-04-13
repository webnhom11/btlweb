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
        // foreach ($tintuc as $tt) {
        //     echo "<option value='".$tt->id."'>".$tt->TomTat."</option>";
        // }
		// echo "<pre>"; 
		//  	print_r($tintuc); 
		// echo "/<pre>"; 
        return response()->json($tintuc);
     }
   
}
