<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Https\Requests;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
/**
* 
*/
class PagesController extends Controller
{
	//mỗi khi khởi tạo sẽ đưa biến theloai đến các page
	function __construct(){
		$theloai = TheLoai::all();
		$slide = Slide::all();
		view()->share('slide',$slide);
		view()->share('theloai',$theloai);
	}

	function trangchu()
	{		
		return view('pages.trangchu');
	}

	function lienhe()
	{		
		return view('pages.lienhe');
	}

	function loaitin($id)
	{		
		$loaitin = LoaiTin::find($id);
		$tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
		return view('pages.loaitin',['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
	}

	function tintuc($id)
	{
		$tintuc = TinTuc::find($id);
		$tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
		$tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();
		return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
	}
}