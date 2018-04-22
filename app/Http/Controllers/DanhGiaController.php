<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhGia;
use Illuminate\Support\Facades\Auth;
use App\TinTuc;
use Validator;
class DanhGiaController extends Controller
{
    // public function getXoa($id, $idTinTuc){
    //     $loaitin = Comment::find($id);
    //     $loaitin->delete();

    //     return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa comment thành công');
    // }

    public function postDanhGia($id, $star, Request $request){
    	$idTinTuc = $id;
    	$tintuc = TinTuc::find($id);
        $idUser = Auth::user()->id;
        $rate = DanhGia::Where([
                                ['idUser', $idUser],
                                ['idTinTuc', $idTinTuc],
                            ])->first();
    	// return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html");

        if($rate == null){
        $danhgia = new DanhGia;
        $danhgia->idTinTuc = $idTinTuc;
        $danhgia->idUser  = Auth::user()->id;
        $danhgia->rate = $star;
        $danhgia->save();
        }
        else{
            $rate->rate = $star;
            $rate->save();
        }

        return response()->json(['msg'=>'Updated Successfully', 'success'=>true]);
    }
}
