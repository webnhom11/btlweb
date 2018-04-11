<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Https\Requests;
use App\TheLoai;
use App\Slide;
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

}