<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\TinTuc;

class ThuVienController extends Controller
{
	function thuvien(){
		// $files = Storage::allFiles('public');
		// return view('admin.thuvien.danhsach', ['files'=>$files]);
		//$files = scandir('upload');
		$files = array_diff(scandir('upload/tintuc', 1), array('.', '..'));
		return view('admin.thuvien.danhsach', ['files'=>$files]);
	}

	function postThemAnh(Request $request){
		if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/thuvien/danhsach')->with('loi','Ban chi duoc chon cac file co duoi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_". $name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh = str_random(4)."_".$name;
            }

            $file->move("upload/tintuc",$Hinh);
        }
        return redirect('admin/thuvien/danhsach')->with('thongbao', 'Thêm thành công');
	}
    
}
