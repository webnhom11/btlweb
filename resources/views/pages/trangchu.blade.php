@extends('layout.index')

@section('content')
    
    @include('layout.slide')
	<section class="bottom-slider">
		<div class="course_demo1">
			<h2 style="text-align: center; margin-bottom: 10px">Tin mới</h2>
			<ul id="flexiselDemo1">
				@foreach($tinmoi as $tm)	                
					<li>
						<div class="blog-item">
							<a href="tintuc/{{$tm->id}}/{{$tm->TieuDeKhongDau}}.html">
								<img src="upload/tintuc/{{$tm->Hinh}}" alt=" " class="img-fluid" />
							</a>

							<div class="floods-text">

								<h3><a href="tintuc/{{$tm->id}}/{{$tm->TieuDeKhongDau}}.html" style="color: white">{{$tm->TieuDe}}</a>
									<span>{{$tm->loaitin->theloai->Ten}}
										<label>|</label>
										<i>{{$tm->loaitin->Ten}}</i>
									</span>
								</h3>
							</div>
						</div>
					</li>
					@endforeach				
			</ul>
		</div>
	</section>
	<!--/main-->
	<section class="main-content-w3layouts-agileits">
		<div class="container">
			<div class="row">
				<!--left-->	
				@include('layout.right')	
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">	
					<!-- @foreach($theloai as $tl)
                    @if(count($tl->loaitin) > 0) -->

                    <?php
                        // Lấy các tin nổi bật sắp xếp theo ngày
                        $data = $tl->tintuc->sortByDesc('created_at')->take(2);
                        // lấy ra 1 tin từ data, sau đó data còn 4 tin. tin1 là một mảng
                        $tin1 = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(1)->shift()
                    ?>					
					<h3 style="font-size: 1.1em;
							    color: #fff;
							    margin: 0;
							    background: #01cd74;
							    padding: .8em 1em;
							    text-transform: uppercase;
							    font-weight: 400;">{{$tl->Ten}}</h3>
					<div class="blog-grid-top">
						<div class="b-grid-top">
							<div class="blog_info_left_grid">
								<a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
									<img src="upload/tintuc/{{$tin1['Hinh']}}" class="img-fluid" alt="">
								</a>
							</div>
							<div class="blog-info-middle">
								<ul>
									<li>
										<a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
											<i class="far fa-calendar-alt"></i>{{$tin1['created_at']}}</a>
									</li>									
								</ul>
							</div>
						</div>

						<h3>
							<a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">{{$tin1['TieuDe']}}</a>
						</h3>
						<p>{!!str_limit($tin1['TomTat'], 200)!!}</p>
						<a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html" class="btn btn-primary read-m">Xem tiếp</a>
						<br>
						<br>
						<div class="row">
							@foreach($data->all() as $tintuc)
								<div class="col-md-6 blog-grid-top">
									<div class="b-grid-top">
										<div class="blog_info_left_grid">
											<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
												<img src="upload/tintuc/{{$tintuc['Hinh']}}" class="img-fluid" alt="">
											</a>
											<ul class="blog-icons">
												<li>
													<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
														<i class="far fa-clock"></i>{{$tintuc['created_at']}}</a>
												</li>
												<li>
													<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
														<i class="fas fa-eye"></i>{{$tintuc['SoLuotXem']}}</a>
												</li>
												
											</ul>
										</div>
										<h3>
											<a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">{{$tintuc['TieuDe']}}</a>
										</h3>										
									</div>	
								</div>	
							@endforeach							
						</div>
					</div>	
					<!-- @endif
					@endforeach	 -->			
				</div>									
			</div>
		</div>
	</section>
	<!--//main-->
	<!---->

		<!--//main-->
 @endsection
