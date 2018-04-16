@extends('layout.index')

@section('content')

<!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <!-- <p class="lead">
                    by <a href="#">admin</a>
                </p> -->

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on: {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <h4>Tóm tắt</h4>
                <p>
                    {!! $tintuc->TomTat !!}
                </p>
                <hr>
                <p class="lead">
                	{!! $tintuc->NoiDung !!}
                </p>

                <hr>

                <!-- Blog Comments -->
				
				@if(Auth::User() != null)
                
                <div class="row">                  
                    <h4 class="col-md-2" style="text-align: center;">Đánh giá</h4>

                    @if($rate != null)
                        <form action="danhgia/{{$tintuc->id}}" class="col col-md-10" style="width:0px;" role="form" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="stars">
                                <input type="radio" name="star" class="star-1" id="star-1" value="1" onchange="this.form.submit()" {{ $rate->rate == '1' ? 'checked' : '' }}/>
                                <label class="star-1" for="star-1">1</label>
                                <input type="radio" name="star" class="star-2" id="star-2" value="2" onchange="this.form.submit()" {{ $rate->rate == '2' ? 'checked' : '' }}/>
                                <label class="star-2" for="star-2">2</label>
                                <input type="radio" name="star" class="star-3" id="star-3" value="3" onchange="this.form.submit()" {{ $rate->rate == '3' ? 'checked' : '' }}/>
                                <label class="star-3" for="star-3">3</label>
                                <input type="radio" name="star" class="star-4" id="star-4" value="4" onchange="this.form.submit()" {{ $rate->rate == '4' ? 'checked' : '' }}/>
                                <label class="star-4" for="star-4">4</label>
                                <input type="radio" name="star" class="star-5" id="star-5" value="5" onchange="this.form.submit()" {{ $rate->rate == '5' ? 'checked' : '' }}/>
                                <label class="star-5" for="star-5">5</label>
                                <span></span>
                            </div>
                        </form>
                    @else
                        <form action="danhgia/{{$tintuc->id}}" class="col col-md-10" style="width:0px;" role="form" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="stars">
                                <input type="radio" name="star" class="star-1" id="star-1" value="1" onchange="this.form.submit()"/>
                                <label class="star-1" for="star-1">1</label>
                                <input type="radio" name="star" class="star-2" id="star-2" value="2" onchange="this.form.submit()"/>
                                <label class="star-2" for="star-2">2</label>
                                <input type="radio" name="star" class="star-3" id="star-3" value="3" onchange="this.form.submit()"/>
                                <label class="star-3" for="star-3">3</label>
                                <input type="radio" name="star" class="star-4" id="star-4" value="4" onchange="this.form.submit()"/>
                                <label class="star-4" for="star-4">4</label>
                                <input type="radio" name="star" class="star-5" id="star-5" value="5" onchange="this.form.submit()"/>
                                <label class="star-5" for="star-5">5</label>
                                <span></span>
                            </div>
                        </form>
                    @endif

                </div>
                <!-- Comments Form -->
                <div class="well">
                	
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="comment/{{$tintuc->id}}" role="form" method="post">
                    	<input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>
                @endif

                <!-- Posted Comments -->


                <!-- Comment -->
                @foreach($tintuc->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{$cm->created_at}}</small> <br> <small>{{$cm->user->ViTri}} - {{$cm->user->CoQuan}}</small>
                        </h4>
                        {{$cm->NoiDung}}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
					@foreach($tinlienquan as $tt)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <!-- <p>{{$tt->TomTat}}</p> -->
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
					@endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
					@foreach($tinnoibat as $tt)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <!-- <p>{{$tt->TomTat}}</p> -->
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                    @endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
<!-- end Page Content -->

@endsection
