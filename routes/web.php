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

Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'theloai'], function(){
		// admin/theloai/danhsach
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua','TheLoaiController@getSua');

		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');
	});

	Route::group(['prefix'=>'loaitin'], function(){
		// admin/loaitin/danhsach
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua','TheLoaiController@getSua');

		Route::get('them','TheLoaiController@getThem');
	});

	Route::group(['prefix'=>'tintuc'], function(){
		// admin/theloai/danhsach
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua','TheLoaiController@getSua');

		Route::get('them','TheLoaiController@getThem');
	});
});