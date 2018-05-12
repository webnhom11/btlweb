@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận</h1>
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
                                <th>Người dùng</th>
                                <th>Trả lời cho</th>
                                <th>Nội dung </th>
                                <th>Ngày đăng</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($binhluan as $bl)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$bl->user->name}}</td>
                                    <td>
                                    	<a href="tintuc/{{$bl->tintuc->id}}/{{$bl->tintuc->TieuDeKhongDau}}.html">
                                    		{{$bl->tintuc->TieuDe}}
                                    	</a>
                                    </td>
                                    <td>{{$bl->NoiDung}}</td>
                                    <td>{{$bl->created_at}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$bl->id}}"> Xóa</a></td>
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
</script>
@endsection
