<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TheLoai;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){	

	Route::get('dashboard','PagesController@dashboard');

	Route::group(['prefix'=>'theloai'], function(){
		// admin/theloai/danhsach
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');

		Route::get('xoa/{id}','TheLoaiController@getXoa');
	});

	Route::group(['prefix'=>'loaitin'], function(){
		// admin/loaitin/danhsach
		Route::get('danhsach','LoaiTinController@getDanhSach');

		Route::get('sua/{id}','LoaiTinController@getSua');
		Route::post('sua/{id}','LoaiTinController@postSua');

		Route::get('them','LoaiTinController@getThem');
		Route::post('them','LoaiTinController@postThem');

		Route::get('xoa/{id}','LoaiTinController@getXoa');
	});

	Route::group(['prefix'=>'tintuc'], function(){
		// admin/tintuc/danh sach
		
		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('sua/{id}','TinTucController@getSua');
		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('them','TinTucController@getThem');
		Route::post('them','TinTucController@postThem');

		Route::get('xoa/{id}','TinTucController@getXoa');
		Route::get('mail/{id}','TinTucController@sendMail');
	});

	Route::group(['prefix'=>'comment'], function(){
		// admin/tintuc/comment
		Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
		Route::get('xoa/{id}','CommentController@getXoaBL');
		Route::get('danhsach','CommentController@getPhanHoi');
	});

	Route::group(['prefix'=>'thuvien'], function(){
		// admin/tintuc/thuvien
		Route::get('danhsach','ThuVienController@thuvien');
		Route::post('danhsach','ThuVienController@postThemAnh');
	});

	Route::group(['prefix'=>'slide'], function(){
		
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');
	});

	Route::group(['prefix'=>'user'], function(){
		
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});

	Route::group(['prefix'=>'ajax'], function(){
		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');

		// Chức năng so sánh
		Route::get('tintuc/{idLoaiTin}', 'AjaxController@getTinTuc');
	});
});


// Route::get('admin/dashboard','PagesController@dashboard');
// Route::get('admin/phanhoi','PagesController@getPhanHoi');
// Route::post('admin/phanhoi/{id}','PagesController@postPhanHoi');

Route::get('trangchu', 'PagesController@trangchu');
Route::get('lienhe', 'PagesController@lienhe');
Route::get('gioithieu', 'PagesController@gioithieu');
Route::get('dangky','PagesController@getDangky');
Route::post('dangky', 'PagesController@postDangky');

Route::post('timkiem', 'PagesController@timkiem');
Route::get('loaitin/{id}/{TenKhongDau}.html','PagesController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PagesController@tintuc');


Route::post('comment/{id}','CommentController@postComment');

Route::get('dangnhap','PagesController@getDangnhap');
Route::post('dangnhap','PagesController@postDangnhap');
Route::get('dangxuat','PagesController@getDangxuat');
Route::get('nguoidung','PagesController@getNguoidung');
Route::post('nguoidung','PagesController@postNguoidung');

Route::post('danhgia/{id}/{star}','DanhGiaController@postDanhGia');

// Route::get('tintuc',function(){
// 	return view('pages.tintuc');
// });

// Route::get('loaitin',function(){
// 	return view('pages.loaitin');
// });
