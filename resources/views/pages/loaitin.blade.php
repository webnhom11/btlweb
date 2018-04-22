@extends('layout.index')

@section('content')

<!--/banner-->
    <div class="banner-inner">
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="trangchu">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">{{$loaitin->Ten}}</li>
    </ol>
    <!--//banner-->

    <!--/main-->
    <section class="main-content-w3layouts-agileits">
        <div class="container">
            <h3 class="tittle">{{$loaitin->Ten}}</h3>
            <div class="row inner-sec">
                <!--left-->           
                <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
                    <div class="row mb-4">
                        <!-- @foreach($tintuc as $tt)
                            <div class="col-md-6 card my-4">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img src="upload/tintuc/{{$tt->Hinh}}" class="card-img-top img-fluid" alt="">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title ">
                                        <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">{{$tt->TieuDe}}</a>
                                    </h5>
                                    <p class="card-text mb-3">{!! str_limit($tt->TomTat,200) !!}</p>
                                    <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="btn btn-primary read-m">Xem thêm</a>
                                </div>
                            </div>
                        @endforeach -->
                        @foreach($tintuc as $tt)
                            <div class="col-md-6 card">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img src="upload/tintuc/{{$tt->Hinh}}" class="card-img-top img-fluid" alt="">
                                </a>
                                <div class="card-body">
                                    <ul class="blog-icons my-4">
                                        <li>
                                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                                <i class="far fa-calendar-alt"></i>{{$tt->created_at->toDateString()}}</a>
                                        </li>
                                        <li>
                                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                                <i class="fas fa-eye"></i>{{$tt->SoLuotXem}}</a>
                                        </li>

                                    </ul>
                                    <h5 class="card-title ">
                                        <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">{{$tt->TieuDe}}</a>
                                    </h5>
                                    <p class="card-text mb-3"></p>
                                    <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html" class="btn btn-primary read-m">Xem thêm</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-left mt-4">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>                       
                    </nav> -->
                    <div style="text-align: center">
                        {{$tintuc->links()}}
                    </div>
                </div>
                <!--//left-->
                @include('layout.right')
            </div>
        </div>
    </section>
    <!--//main-->
@endsection