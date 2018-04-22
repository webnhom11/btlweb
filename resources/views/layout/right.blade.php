<!--right-->
				<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right" >
					<div class="right-blog-info text-left">
						<div class="tech-btm">
							<img src="images/banner1.jpg" class="img-fluid" alt="">
						</div>
						<div class="tech-btm">
							<h4 style="text-align: center;">Đăng kí ngay!</h4>
							<p>Pellentesque dui, non felis. Maecenas male </p>
							<button class="btn" style="width: 100%;"><a href="dangky">Đăng kí</a></button>

						</div>
						
						<div class="tech-btm">
							<h4>Tin nổi bật</h4>
							@foreach($tinnoibat as $tt)
							<div class="blog-grids row mb-3">
								<div class="col-md-5 blog-grid-left">
									<a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
										<img src="upload/tintuc/{{$tt->Hinh}}" class="img-fluid" alt="">
									</a>
								</div>
								<div class="col-md-7 blog-grid-right">

									<h5 style="text-align: justify;">
										<a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">{{$tt->TieuDe}}</a>
									</h5>
									<div class="sub-meta">
										<span>
											<i class="far fa-clock"></i>{{$tt->created_at->toDateString()}}</span>
									</div>
								</div>
								
							</div>
							@endforeach
						</div>
					</div>

				</aside>
				<!--//right-->