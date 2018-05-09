@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bảng tin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sitemap fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$tl}}</div>
                                    <div>Thể loại</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/theloai/danhsach">
                            <div class="panel-footer">
                                <span class="pull-left">Xem danh sách</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cubes fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$lt}}</div>
                                    <div>Loại tin</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/loaitin/danhsach">
                            <div class="panel-footer">
                                <span class="pull-left">Xem danh sách</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$tt}}</div>
                                    <div>Bài viết</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/tintuc/danhsach">
                            <div class="panel-footer">
                                <span class="pull-left">Xem danh sách</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$us}}</div>
                                    <div>Thành viên</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/user/danhsach">
                            <div class="panel-footer">
                                <span class="pull-left">Xem danh sách</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <b>Bài viết mới</b>                           
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                @foreach($tinmoi as $tm)
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="upload/tintuc/{{$tm->Hinh}}" alt="User Avatar" style="width: 50px; height: auto;" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <a href="tintuc/{{$tm->id}}/{{$tm->TieuDeKhongDau}}.html">
                                                    <strong class="primary-font">{{$tm->TieuDe}}</strong>
                                                </a>
                                            </div>
                                            <p>
                                                Tác giả 
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i>{{$tm->created_at->diffForHumans()}}
                                                </small>
                                            </p>
                                        </div>
                                    </li>    
                                @endforeach                                                          
                            </ul>
                        </div>                
                    </div>
                <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <b>Cập nhật</b>                           
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                @foreach($tincapnhat as $cn)
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="upload/tintuc/{{$cn->Hinh}}" alt="User Avatar" style="width: 50px; height: auto;" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <a href="tintuc/{{$tm->id}}/{{$tm->TieuDeKhongDau}}.html">
                                                    <strong class="primary-font">{{$cn->TieuDe}}</strong>
                                                </a>
                                            </div>
                                            <p>
                                                Tác giả 
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i>{{$cn->created_at->diffForHumans()}}
                                                </small>
                                            </p>
                                        </div>
                                    </li>    
                                @endforeach                                                          
                            </ul>
                        </div>                
                    </div>
                <!-- /.col-lg-4 -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <b>Bình luận mới</b>                           
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                @foreach($comment as $cm)
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="images/t1.jpg" alt="User Avatar" class="img-circle" style="width: 50px; height: auto;" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <a href="admin/comment/danhsach">
                                                    <strong class="primary-font">{{$cm->NoiDung}}</strong>
                                                </a>
                                            </div>
                                            <p>
                                                {{$cm->user->name}}
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i>{{$cm->created_at->diffForHumans()}}
                                                </small>
                                            </p>
                                        </div>
                                    </li>    
                                @endforeach                                                          
                            </ul>
                        </div>                
                    </div>
                <!-- /.col-lg-4 -->
                </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection

@section('script')
@endsection
