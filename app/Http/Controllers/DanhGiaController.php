<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhGia;
use Illuminate\Support\Facades\Auth;
use App\TinTuc;

class DanhGiaController extends Controller
{
    // public function getXoa($id, $idTinTuc){
    //     $loaitin = Comment::find($id);
    //     $loaitin->delete();

    //     return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa comment thành công');
    // }

    public function postDanhGia($id, Request $request){
    	$idTinTuc = $id;
    	$tintuc = TinTuc::find($id);
        $idUser = Auth::user()->id;
        $rate = DanhGia::Where([
                                ['idUser', $idUser],
                                ['idTinTuc', $idTinTuc],
                            ])->first();
        if($rate == null){
            $danhgia = new DanhGia;
            $danhgia->idTinTuc = $idTinTuc;
            $danhgia->idUser  = Auth::user()->id;
            $danhgia->rate = $request->star;
            $danhgia->save();
        }
    	else{
            $rate->rate = $request->star;
            $rate->save();
        }

    	return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html");
    }
}
