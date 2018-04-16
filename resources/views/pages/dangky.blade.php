@extends('layout.index')

@section('content')

<!-- Page Content -->
    <div class="container">
	<br>
    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	<div class="panel-body">

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
			
				    	<form action="dangky" method="post">
				    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>							
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>

							<!--    Vị trí -->
                            <div class="form-group">
                                <label>Học hàm/Học vị/Sinh viên</label>
                                <select class="form-control" name="vitri">
                                    <option value="SV">Sinh viên</option>
                                    <option value="GS">Giáo sư</option>
                                    <option value="PGS">Phó Giáo sư</option>
                                    <option value="TS">Tiến sĩ</option>
                                    <option value="THS">Thạc sĩ</option>
                                </select>
                            </div>
                           <!--  Cơ quan -->
                            <div class="form-group">
                                <label>Cơ quan/ Trường học</label>
                                <input class="form-control" name="coquan" placeholder="Nhập tên cơ quan/ trường học đang làm việc/ học tập" />
                            </div>
                            
							<br>
							<button type="submit" class="btn btn-default">Đăng ký
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

@endsection