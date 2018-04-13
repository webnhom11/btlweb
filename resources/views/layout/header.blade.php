    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="trangchu">Thế Giới Khoa Học</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="gioithieu">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="lienhe">Liên hệ</a>
                    </li>
                </ul>

                <form action="timkiem" method="post" class="navbar-form navbar-left" role="search">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			        <div class="form-group">
			          <input type="text" name="tukhoa" class="form-control" placeholder="Tìm kiếm">
			        </div>
			        <button type="submit" class="btn btn-default">Tìm</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    <!-- @if(!isset($nguoidung))
                        <li>
                            <a href="dangky">Đăng ký</a>
                        </li>
                        <li>
                            <a href="dangnhap">Đăng nhập</a>
                        </li>
                    @else
                        <li>
                        	<a href="nguoidung">
                        		<span class ="glyphicon glyphicon-user"></span>
                        		{{$nguoidung->name}}
                        	</a>
                        </li>

                        <li>
                        	<a href="dangxuat">Đăng xuất</a>
                        </li>
                    @endif -->
                    @if(Auth::User() != null)
                        <li>
                            <a href="nguoidung">
                                <span class="glyphicon glyphicon-user"></span>
                                {{Auth::User()->name}}
                            </a>
                        </li>

                        <li>
                            <a href="dangxuat">Đăng xuất</a>
                        </li>
                    @else
                        <li>
                            <a href="dangky">Đăng ký</a>
                        </li>
                        <li>
                            <a href="dangnhap">Đăng nhập</a>
                        </li>
                    @endif﻿
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>