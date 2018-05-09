@extends('admin.layout.index')

@section('css')
<style type="text/css">
    #OpenImgUpload {
        background-image:url('');
        background-size:cover;
        background-position: center;
        height: 200px; width: 200px;
        border: 1px solid #bbb;
    }
</style>
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>{{$tintuc->TieuDe}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option 
                                            @if($tintuc->loaitin->theloai->id  == $tl->id){{'selected'}}
                                            @endif
                                        value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                        <option 
                                            @if($tintuc->loaitin->id  == $lt->id){{'selected'}}
                                            @endif
                                        value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề" value="{{$tintuc->TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="demo" name="TomTat" class="form-control ckeditor" rows="3">{{$tintuc->TomTat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea id="demo" name="NoiDung" class="form-control ckeditor" rows="5">{{$tintuc->NoiDung}}</textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label>Hình ảnh</label>
                                <p><img width="400px" src="upload/tintuc/{{$tintuc->Hinh}}"></p>
                                <input type="file" name="Hinh" class="form-control">
                            </div> -->
                            <div class="form-group">                            
                                <p><b>Ảnh đại diện</b></p>              
                                <input type="file" id="imgupload" style="display:none" name="Hinh" /> 
                                <button type="button" id="OpenImgUpload"><i id="plus" class="fa fa-plus" style="font-size:36px;"></i></button>
                                <p id="capnhat">Nhấn vào ảnh để thay đổi</p>
                                <a href="#" id="xoa">Xóa ảnh đại diện</a>
                            <div>
                            <br> 

                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" 
                                        @if($tintuc->NoiBat == 0){{'checked'}}
                                        @endif
                                    type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" 
                                        @if($tintuc->NoiBat == 1){{'checked'}}
                                        @endif
                                    type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận
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
                                    <th>Người dùng</th>
                                    <th>Nội dung </th>
                                    <th>Ngày đăng</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tintuc->comment as $cm)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$cm->id}}</td>
                                        <td>{{$cm->user->name}}</td>
                                        <td>{{$cm->NoiDung}}</td>
                                        <td>{{$cm->created_at}}</td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}"> Delete</a></td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end row-->

            </div>
            <!-- /.container-fluid -->
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            var str = '{{$tintuc->Hinh}}';
            if(!str.length)
            {
                $('#capnhat').hide();
                $('#xoa').hide();
                console.log("No");
            }
            else
            {
                $('#capnhat').show();
                $('#xoa').show();
                $('#OpenImgUpload').css('background-image', 'url(\'upload/tintuc/{{$tintuc->Hinh}}\')');
                $("#plus").removeClass( "fa fa-plus" );
                console.log("Yes");
            }

            $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });

            $('#imgupload').change(function() {
                var getImagePath = URL.createObjectURL(event.target.files[0]);
                $('#OpenImgUpload').css('background-image', 'url(' + getImagePath + ')');
                $("#plus").removeClass( "fa fa-plus" );
                $('#capnhat').show();
                $('#xoa').show();
                // console.log($(this).val());
            });

            $('#xoa').click(function(e){
                e.preventDefault();
                $('#OpenImgUpload').css('background-image', 'url(\'\')');
                $("#plus").addClass( "fa fa-plus" );
                $('#capnhat').hide();
                $('#xoa').hide();
                $('#imgupload').val('');
            });

            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/" + idTheLoai, function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
@endsection