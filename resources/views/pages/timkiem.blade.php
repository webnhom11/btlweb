
@extends('layout.index')

@section('content')

<!--/banner-->
    <div class="banner-inner">
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="trangchu">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Tìm kiếm {{$tukhoa}}</li>
    </ol>
    <!--//banner-->

    <!--/main-->
    <section class="main-content-w3layouts-agileits">
        <div class="container">
            <h3 class="tittle">Danh sách kết quả</h3>
            <div class="inner-sec">
                <!--left-->
                <div class="left-blog-info-w3layouts-agileits text-left">
                    <div class="row">
                        @foreach($tintuc as $chitiet)
                            <div class="col-lg-4 card">
                                <a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">
                                    <img src="upload/tintuc/{{ $chitiet->Hinh }}" class="card-img-top img-fluid" alt="">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title ">
                                        <a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html">{{ $chitiet->TieuDe }}</a>
                                    </h5>
                                    <!-- <p class="card-text mb-3">{!! str_limit($chitiet->TomTat, 100) !!}</p> -->
                                    <a href="tin-tuc/{{ $chitiet->TieuDeKhongDau }}.html" class="btn btn-primary read-m">Xem tiếp</a>
                                </div>
                            </div>
                        @endforeach                       
                    </div>                   
                    <div style="text-align: center">
                        {{$tintuc->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//main-->
    <!--footer-->

@endsection