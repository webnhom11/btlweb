<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
        $theloai = TheLoai::all();  // lấy toàn bộ dữ liệu vào biến thể loại
    	return view('admin.theloai.danhsach', ['theloai'=>$theloai]);
    }

    public function getSua()
    {
    	
    }

    public function getThem()
    {
    	
    }

}
