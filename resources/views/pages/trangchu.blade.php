@extends('layout.index')

@section('content')

<!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="image/800x300.png" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="image/800x300.png" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="image/800x300.png" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		@foreach($theloai as $tl)
	            			@if(count($tl->loaitin) > 0)
			            		<!-- item -->
							    <div class="row-item row">
				                	<h3>
				                		<a href="category.html">{{$tl->Ten}}</a> |
				                		 	@foreach($tl->loaitin as $lt)
				                				<small><a href="category.html"><i>{{$lt->Ten}}</i></a>/</small>
				                			@endforeach
				                	</h3>

				                	<?php
				                		// Lấy các tin nổi bật sắp xếp theo ngày
				                		$data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
				                		// lấy ra 1 tin từ data, sau đó data còn 4 tin. tin1 là một mảng
				                		$tin1 = $data->shift()

				                	?>
				                	<div class="col-md-8 border-right">
				                		<div class="col-md-5">
					                        <a href="detail.html">
					                            <img class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
					                        </a>
					                    </div>

					                    <div class="col-md-7">
					                        <h3>{{$tin1['TieuDe']}}</h3>
					                        <p>{{$tin1['TomTat']}}</p>
					                        <a class="btn btn-primary" href="detail.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>

				                	</div>
				                    

									<div class="col-md-4">
										@foreach($data->all() as $tintuc)
											<a href="detail.html">
												<h4>
													<span class="glyphicon glyphicon-list-alt"></span>
													{{$tintuc['TieuDe']}}
												</h4>
											</a>
										@endforeach
									</div>
									
									<div class="break"></div>
				                </div>
				                <!-- end item -->
				            @endif
		            	@endforeach
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

 @endsection