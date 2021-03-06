<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Https\Requests;
use App\TheLoai;
use App\Slide;
use App\User;
use App\TinTuc;
use App\LoaiTin;
use Illuminate\Support\Facades\Auth;
use App\DanhGia;
use App\Comment;
/**
* 
*/
class PagesController extends Controller
{
	//mỗi khi khởi tạo sẽ đưa biến theloai đến các page
	function __construct(){
		$theloai = TheLoai::all();
		$slide = Slide::orderBy('created_at', 'desc')->take(3)->get();	
		$tinmoi = TinTuc::orderBy('created_at', 'desc')->take(5)->get();
		$tinnoibat = TinTuc::where('NoiBat',1)->orderBy('created_at', 'desc')->take(5)->get();	
		view()->share('slide',$slide);
		view()->share('theloai',$theloai);
		view()->share('tinnoibat',$tinnoibat);
		view()->share('tinmoi',$tinmoi);

		if(Auth::check())
		{
			view()->share('nguoidung',Auth::user());
		}

	}

	function dashboard()
	{				
		$tl = TheLoai::count();
		$lt = LoaiTin::count();
		$tt = TinTuc::count();
		$us = User::count();
		$tincapnhat = TinTuc::orderBy('updated_at', 'desc')->take(5)->get();
		$comment = Comment::orderBy('created_at', 'desc')->take(5)->get();
		return view('admin.dashboard',['tincapnhat'=>$tincapnhat, 'comment'=>$comment, 'tl'=>$tl, 'lt'=>$lt, 'tt'=>$tt, 'us'=>$us]);
	}

	function trangchu()
	{				
		return view('pages.trangchu');
	}

	function lienhe()
	{		
		return view('pages.lienhe');
	}

	function gioithieu()
	{		
		return view('pages.gioithieu');
	}

	function getDangky(){
		return view('pages.dangky');
	}

	function postDangky(Request $request){
		$this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'Mật khẩu tối đa là 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại không đúng', 
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->ViTri = $request->vitri;
        $user->CoQuan = $request->coquan;
        $user->save();
        return redirect('dangky')->with('thongbao','Đăng ký thành công');
	}

	function loaitin($id)
	{		
		$loaitin = LoaiTin::find($id);
		$tintuc = TinTuc::where('idLoaiTin', $id)->paginate(6);
		return view('pages.loaitin',['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
	}

	function tintuc($id)
	{
		$tintuc = TinTuc::find($id);
		$tintuc->increment('SoLuotXem');
		$tinnoibat = TinTuc::where('NoiBat',1)->orderBy('created_at', 'desc')->take(4)->get();
		$tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(4)->get();

		if(Auth::User() != null)
		{
			$idUser = Auth::User()->id;
			$rate = DanhGia::Where([
                                ['idUser', $idUser],
                                ['idTinTuc', $id],
                            ])->first();
			return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan,'rate'=>$rate]);
		}
		else
		{
			return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
		}	
	}

	function getDangnhap()
	{
		return view('pages.dangnhap');
	}

	function postDangnhap(Request $request)
	{
		$this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32',
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập password',
            'password.min' => 'Password phải có ít nhất 3 ký tự',
            'password.max' => 'Password tối đa là 32 ký tự',
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('trangchu');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
	}

	function getDangXuat()
	{
		Auth::logout();
		return redirect('trangchu');
	}

	function getNguoidung()
	{
		// $user = Auth::user();
		// return view('pages.nguoidung',['nguoidung=>$user']);
		if(Auth::check())
	      	return view('pages.nguoidung',['user' => Auth::user()]);
	    else
	      	return redirect('dangnhap')->with('message','Bạn chưa Đăng Nhập!');
	}

	function postNguoidung(Request $request)
	{
    	$this->validate($request,[
            'name' => 'required|min:3',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->ViTri = $request->vitri;
        $user->CoQuan = $request->coquan;
        if($request->changePassword == "on"){
            $this->validate($request,[
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'Mật khẩu tối đa là 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại không đúng', 
        ]);
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('nguoidung')->with('thongbao','Bạn đã sửa thành công');
	}

	function timkiem(Request $request){
		$tukhoa = $request ->tukhoa;
		//tìm theo tiêu đề, tóm tắt, nội dung. giới hạn tin tìm được bằng take
		$tintuc = TinTuc::where('TieuDe', 'like', "%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung', 'like', "%$tukhoa%")->take(18)->paginate(6);
		return view('pages.timkiem', ['tintuc'=>$tintuc, 'tukhoa'=>$tukhoa]);
	}
	
}