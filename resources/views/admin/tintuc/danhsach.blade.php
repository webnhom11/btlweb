@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                    @endif
                    
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu Đề</th>
                                <th>Tóm tắt</th>
                                <th>Thể loại</th>
                                <th>Loại tin</th>
                                <th>Xem</th>
                                <th>Nổi bật</th>
                                <th>Gửi mail</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $tt)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$tt->id}}</td>
                                    <td>
                                        <p>{{$tt->TieuDe}}</p>
                                        <img width="100px" src="upload/tintuc/{{$tt->Hinh}}" />
                                    </td>
                                    <td>{{$tt->TomTat}}</td>
                                    <td>{{$tt->loaitin->theloai->Ten}}</td>
                                    <td>{{$tt->loaitin->Ten}}</td>
                                    <td>{{$tt->SoLuotXem}}</td>
                                    <td>
                                        @if($tt->NoiBat == 0) {{'Không'}}
                                        @else {{'Có'}}
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-send-o  fa-fw"></i><a href="admin/tintuc/mail/{{$tt->id}}" class="send"> Gửi mail</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tt->id}}" class="delete"> Xóa</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tt->id}}">Sửa</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection
@section('script')
<script type="text/javascript">
    $(".delete").on("click", function(){
        return confirm("Bạn có muốn xóa tin này");
    });

    $(".send").on("click", function(){
        return confirm("Bạn có muốn gửi mail thông báo các chuyên gia vào đánh giá");
    });
</script>
@endsection
