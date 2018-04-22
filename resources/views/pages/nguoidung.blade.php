@extends('layout.index')

@section('content')
<!--/banner-->
    <div class="banner-inner">
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="trangchu">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thông tin cá nhân</li>
    </ol>
    <!--//banner-->
    <!--/main-->
    <section class="main-content-w3layouts-agileits">
        <div class="container">
            <h3 class="tittle">Thông tin cá nhân</h3>
                <div class="inner-sec">
            <div class="login p-5 bg-light mx-auto mw-100">
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
                <form action="nguoidung" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Họ và tên</label>

                            <input type="text" name="name" class="form-control" id="validationDefault01" placeholder="" required="" value="{{$user->name}}">
                        </div>
                        <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Địa chỉ Email</label>
                            <input type="text" name="email" value="{{$user->email}}" readonly class="form-control" id="validationDefault02" placeholder="" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="checkbox" id="changePassword" name="changePassword">
                                <label for="exampleInputPassword1 mb-2">Đổi mật khẩu</label>
                            <input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword2 mb-2">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
                        </div>                          
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="exampleInputPassword1 mb-2">Học hàm/ Học vị/ Sinh viên</label>
                                <select class="form-control" name="vitri">
                                    <option value="SV">Sinh viên</option>
                                    <option value="GS">Giáo sư</option>
                                    <option value="PGS">Phó Giáo sư</option>
                                    <option value="TS">Tiến sĩ</option>
                                    <option value="THS">Thạc sĩ</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputPassword2 mb-2">Cơ quan/ Trường học</label>
                            <input type="text" name="coquan" class="form-control" id="password2" placeholder="Nhập tên cơ quan/ trường học đang làm việc/ học tập" required="" value="{{$user->CoQuan}}" >
                        </div>                          
                    </div>
                        <button type="submit" class="btn btn-primary submit mb-4">Sửa</button>  
                </form>
            </div>
        </div>
    </div>
</section>
    <!--//main-->

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection