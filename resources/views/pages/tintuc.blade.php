@extends('layout.index')

@section('css')
<style type="text/css">
    form {
        width: 100%;
    }
    form .stars {
      background: url("css/stars1.png") repeat-x 0 0;
      width: 150px;
      margin: 0 auto;
    }
     
    form .stars input[type="radio"] {
      position: absolute;
      opacity: 0;
      filter: alpha(opacity=0);
    }
    form .stars input[type="radio"].star-5:checked ~ span {
      width: 100%;
    }
    form .stars input[type="radio"].star-4:checked ~ span {
      width: 80%;
    }
    form .stars input[type="radio"].star-3:checked ~ span {
      width: 60%;
    }
    form .stars input[type="radio"].star-2:checked ~ span {
      width: 40%;
    }
    form .stars input[type="radio"].star-1:checked ~ span {
      width: 20%;
    }
    form .stars label {
      display: block;
      width: 30px;
      height: 30px;
      margin: 0!important;
      padding: 0!important;
      text-indent: -999em;
      float: left;
      position: relative;
      z-index: 10;
      background: transparent!important;
      cursor: pointer;
    }
    form .stars label:hover ~ span {
      background-position: 0 -30px;
    }
    form .stars label.star-5:hover ~ span {
      width: 100% !important;
    }
    form .stars label.star-4:hover ~ span {
      width: 80% !important;
    }
    form .stars label.star-3:hover ~ span {
      width: 60% !important;
    }
    form .stars label.star-2:hover ~ span {
      width: 40% !important;
    }
    form .stars label.star-1:hover ~ span {
      width: 20% !important;
    }
    form .stars span {
      display: block;
      width: 0;
      position: relative;
      top: 0;
      left: 0;
      height: 30px;
      background: url("css/stars1.png") repeat-x 0 -60px;
      -webkit-transition: -webkit-width 0.5s;
      -moz-transition: -moz-width 0.5s;
      -ms-transition: -ms-width 0.5s;
      -o-transition: -o-width 0.5s;
      transition: width 0.5s;
    }
</style>
@endsection
@section('content')

<div class="banner-inner">
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="trangchu">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">{{$tintuc->TieuDe}}</li>
    </ol>

    <!--//banner-->
    <section class="banner-bottom">
        <!--/blog-->
        <div class="container">
            <div class="row">
                <!--left-->
                <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
                    <div class="blog-grid-top">
                        <!-- <div class="b-grid-top">
                            <div class="blog_info_left_grid">
                                <img src="upload/tintuc/{{$tintuc->Hinh}}" class="img-fluid" alt="">
                            </div>
                        </div> -->
                        <h3>{{$tintuc->TieuDe}}</h3>
                        <p style="text-align: justify;">{!! $tintuc->TomTat !!}</p>
                        <hr>
                        <h5 style="text-align: justify;">{!! $tintuc->NoiDung !!}</h5>
                    </div>

                    <div class="comment-top">
                        @if(Auth::User() != null)
                            <h4>Đánh giá của bạn</h4>
                            @if($rate != null)
                                <form  class="col col-md-10" style="width:0px;" role="form" method="post">
                                    {!! csrf_field() !!}
                                    <div class="stars">
                                        <input type="radio" name="star" class="star-1" id="star-1" value="1" {{ $rate->rate == '1' ? 'checked' : '' }}/>
                                        <label class="star-1" for="star-1">1</label>
                                        <input type="radio" name="star" class="star-2" id="star-2" value="2" {{ $rate->rate == '2' ? 'checked' : '' }}/>
                                        <label class="star-2" for="star-2">2</label>
                                        <input type="radio" name="star" class="star-3" id="star-3" value="3" {{ $rate->rate == '3' ? 'checked' : '' }}/>
                                        <label class="star-3" for="star-3">3</label>
                                        <input type="radio" name="star" class="star-4" id="star-4" value="4" {{ $rate->rate == '4' ? 'checked' : '' }}/>
                                        <label class="star-4" for="star-4">4</label>
                                        <input type="radio" name="star" class="star-5" id="star-5" value="5"  {{ $rate->rate == '5' ? 'checked' : '' }}/>
                                        <label class="star-5" for="star-5">5</label>
                                        <span></span>
                                    </div>
                                </form>
                                @else
                                    <form class="col col-md-10" style="width:0px;" role="form" method="post">
                                        {!! csrf_field() !!}
                                        <div class="stars">
                                            <input type="radio" name="star" class="star-1" id="star-1" value="1"/>
                                            <label class="star-1" for="star-1">1</label>
                                            <input type="radio" name="star" class="star-2" id="star-2" value="2"/>
                                            <label class="star-2" for="star-2">2</label>
                                            <input type="radio" name="star" class="star-3" id="star-3" value="3"/>
                                            <label class="star-3" for="star-3">3</label>
                                            <input type="radio" name="star" class="star-4" id="star-4" value="4"/>
                                            <label class="star-4" for="star-4">4</label>
                                            <input type="radio" name="star" class="star-5" id="star-5" value="5"/>
                                            <label class="star-5" for="star-5">5</label>
                                            <span></span>
                                        </div>
                                    </form>
                                @endif
                              
                            <div class="comment-top">
                            <h4>Bình luận</h4>
                            <div class="comment-bottom">
                                <form action="comment/{{$tintuc->id}}" role="form" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <textarea class="form-control" id="NoiDung" name="NoiDung" placeholder="Bình luận..." required=""></textarea><br>
                                    <button type="submit" class="btn btn-primary submit">Gửi</button>
                                </form>
                            </div>
                        </div>
                        @endif                       
                       <br>
                        @foreach($tintuc->comment as $cm)
                            <div class="media">
                                <img src="images/t1.jpg" alt="" class="img-fluid" />
                                <div class="media-body">
                                    <h5 class="mt-0">{{$cm->user->name}} - <small>{{$cm->user->ViTri}} - {{$cm->user->CoQuan}}</small></h5>
                                    <small>&nbsp; {{$cm->created_at->toDateString()}}</small>
                                    <p> &nbsp;&nbsp;   {{$cm->NoiDung}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>                 
                </div>

                <!--//left-->
                <!--right-->
                @include('layout.right')
            </div>
        </div>
    </section>
    <!--//main-->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="radio"]').click(function(){
                var star = $(this).val();
              
                var id = {{$tintuc->id}};
                console.log(id);
                $.ajax({
                    beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'danhgia/' + id + '/' + star,
                    method: 'POST',
                    data: {star:star, id:id},
                    success: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection