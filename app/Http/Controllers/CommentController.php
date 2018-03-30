<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function getXoa($id, $idTinTuc){
        $loaitin = Comment::find($id);
        $loaitin->delete();

        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao', 'Xóa comment thành công');
    }
}
