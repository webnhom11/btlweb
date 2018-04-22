@extends('layout.index')

@section('content')
	<!--/banner-->
	<div class="banner-inner">
	</div>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="trangchu">Trang chủ</a>
		</li>
		<li class="breadcrumb-item active">Đăng nhập</li>
	</ol>
	<!--//banner-->
	<!--/main-->
	<section class="main-content-w3layouts-agileits">
		<div class="container">
				<h3 class="tittle">Đăng nhập ngay</h3>
				<div class="row inner-sec">					
					<div class="login p-5 bg-light mx-auto mw-100">
						@if(count($errors)>0)
				  			<div class="alert alert-danger">
				  				@foreach($errors->all() as $err)
				  					{{$err}}<br>
				  				@endforeach
				  			</div>
				  		@endif

				  		@if(session('thongbao'))
				  			<div class="alert alert-danger">
				  			{{session('thongbao')}}
				  			</div>
				  		@endif
					<form action="dangnhap" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
						  <label for="exampleInputEmail1 mb-2">Tài khoản</label>
						  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email . . ." required="" name="email">							 
						</div>
						<div class="form-group">
						  <label for="exampleInputPassword1 mb-2">Mật khẩu</label>
						  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" required="" name="password">
						</div>
						
						<button type="submit" class="btn btn-primary submit mb-4">Đăng nhập</button>
						<p><a href="dangky"> Bạn chưa có tài khoản?</a></p>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--//main-->
@endsection

