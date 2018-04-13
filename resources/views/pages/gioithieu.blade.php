@extends('layout.index')


@section('content')
<!-- Page Content -->
    <div class="container">

    	@include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
	            	</div>

	            	<div class="panel-body">
                        <h4>Nhóm 11</h4>
                        <h5>Chu Văn Cường</h5>
                        <h5>Vũ Xuân Tiến</h5>
                        <h5>Đỗ Hoàng Thanh Tuấn</h5>
	            		<!-- item -->
                        <br>
                        <h4>Chúng tôi mang đến cho bạn đọc những báo cáo mới nhất của các nhà khoa học về mội lĩnh vực trong đời sống một cách nhanh và chính xác nhất.</h4>
                        
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection