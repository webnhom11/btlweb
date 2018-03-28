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
    	return view('admin.theloai.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
            [    // chứa lỗi
                'Ten' => 'required|min:3|max:100'
            ],
            [   // chứa thông báo
                'Ten.required' => 'Bạn chưa nhập tên thể loại',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 kí tự',
            ]); 
        $theloai = new TheLoai;
        $theloai->Ten = $request->Ten; 
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/theloai/them')->with('thongbao', 'Thêm thành công');
    }

}
