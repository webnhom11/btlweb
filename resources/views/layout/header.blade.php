<!--Header-->

    <header>
        <div class="top-bar_sub_w3layouts container-fluid">
            <div class="row">
                <div class="col-md-3 logo text-left">
                    <a class="navbar-brand" href="trangchu">
                        <i class="fab fa-linode"></i> Weblog</a>
                </div>
                <div class="col-md-6 top-forms text-center mt-lg-3 mt-md-1 mt-0">                  
                    @if(Auth::User() != null)
                        <span>Welcome Back!</span>
                        <span class="mx-lg-4 mx-md-2  mx-1">
                            <a href="nguoidung">
                                <i class="far fa-user"></i>{{Auth::User()->name}}</a>
                        </span>
                        <span>
                            <a href="dangxuat">
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </span>
                    @else
                        <span>Welcome to Weblog!</span>
                        <span class="mx-lg-4 mx-md-2  mx-1">
                            <a href="dangnhap">
                                <i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                        </span>
                        <span>
                            <a href="dangky">
                                <i class="fas fa-user-plus"></i> Đăng kí</a>
                        </span>
                    @endif﻿
                </div>
                <div class="col-md-3 log-icons text-right">

                    <ul class="social_list1 mt-3">

                        <li>
                            <a href="#" class="facebook1 mx-2" >
                                <i class="fab fa-facebook-f"></i>

                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter2">
                                <i class="fab fa-twitter"></i>

                            </a>
                        </li>
                        <li>
                            <a href="#" class="dribble3 mx-2">
                                <i class="fab fa-dribbble"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="pin">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

            <div class="header_top" id="home">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler navbar-toggler-right mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                   </button>


                    @include('layout.menu')
                </nav>

            </div>
    </header>
    <!--//header-->