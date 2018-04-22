@extends('layout.index')


@section('content')
<!--/banner-->
    <div class="banner-inner">
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="trangchu">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Liên hệ</li>
    </ol>
    <!--//banner-->
    <!--/main-->
    <section class="main-content-w3layouts-agileits">

        <h3 class="tittle">Liên hệ với chúng tôi</h3><br>
        <h4 class="tittle" align="center">Nhóm 11</h4><br>
        <div align="center">
            <h5>Chu Văn Cường</h5>
            <h5>Vũ Xuân Tiến</h5>
            <h5>Đỗ Hoàng Thanh Tuấn</h5>
        </div>
        <p class="sub text-center">We love to discuss your idea</p><br>
        <div class="contact-map inner-sec">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6759412420174!2d105.84115881463723!3d21.005623293944208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1524150394336" width="100%" frameborder="0"  style="border:0" allowfullscreen></iframe>          
        </div>
        <div class="ad-inf-sec bg-light">
            <div class="container">
                <div class="address row">

                    <div class="col-lg-4 address-grid">
                        <div class="row address-info">
                            <div class="col-md-4 address-left text-center">
                                <i class="far fa-map"></i>
                            </div>
                            <div class="col-md-8 address-right text-left">
                                <h6>Địa chỉ</h6>
                                <p> Hà Nội, Việt Nam

                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 address-grid">
                        <div class="row address-info">
                            <div class="col-md-4 address-left text-center">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="col-md-8 address-right text-left">
                                <h6>Email</h6>
                                <p>Email :
                                    <a href="mailto:example@email.com"> mail@example.com</a>

                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 address-grid">
                        <div class="row address-info">
                            <div class="col-md-4 address-left text-center">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="col-md-8 address-right text-left">
                                <h6>Số điện thoại</h6>
                                <p>+1 234 567 8901</p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!--//main-->
@endsection