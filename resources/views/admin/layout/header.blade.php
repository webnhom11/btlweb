<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; position: fixed; top: 0; width: 100%;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin/dashboard" >Admin Area</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-home fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-home">                    
                        <li><a href="trangchu"><i class="fa fa-home fa-fw"></i>Xem trang</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-plus fa-fw"></i> Mới <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-new">                    
                        <li><a href="admin/theloai/them"><i class="fa fa-bar-chart-o fa-fw"></i>Thể loại</a>
                        </li>
                        <li><a href="admin/loaitin/them"><i class="fa fa-cube fa-fw"></i>Loại tin</a>
                        </li>
                        <li><a href="admin/tintuc/them"><i class="fa fa-file fa-fw"></i>Tin tức</a>
                        </li>
                        <li><a href="admin/slide/them"><i class="fa fa-sliders fa-fw"></i>Slide</a>
                        </li>
                        <li><a href="admin/user/them"><i class="fa fa-user fa-fw"></i>User</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">                                      
                         @if(Auth::user())
                            <li>                              
                                <a href="admin/user/sua/{{ Auth::user()->id }}"><i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }}</a>
                            </li>
                            <li><a href="admin/user/sua/{{ Auth::user()->id }}"><i class="fa fa-gear fa-fw"></i>Thiết Lập Tài Khoản</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng Xuất</a>
                            </li>                         
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            @include('admin.layout.menu')
            <!-- /.navbar-static-side -->
        </nav>