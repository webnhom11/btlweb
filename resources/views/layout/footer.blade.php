<!--footer-->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 footer-grid-agileits-w3ls text-left">
					<h3>Liên hệ với chúng tôi</h3>
					<h4>Nhóm 11</h4><br>
					<p>Chu Văn Cường</p><br>
					<p>Vũ Xuân Tiến</p><br>
					<p>Đỗ Hoàng Thanh Tuấn</p>					
					<div class="read">
						<a href="lienhe" class="btn btn-primary read-m">Xem tiếp</a>
					</div>
				</div>
				<div class="col-lg-4 footer-grid-agileits-w3ls text-left">

					<div class="tech-btm">
						<h3>Tin mới</h3>
						@foreach($tinmoi as $tm)
						<div class="blog-grids row mb-3">
							<div class="col-md-5 blog-grid-left">
								<a href="tintuc/{{$tm->id}}/{{$tm->TieuDeKhongDau}}.html">
									<img src="upload/tintuc/{{$tm->Hinh}}" class="img-fluid" alt="">
								</a>
							</div>
							<div class="col-md-7 blog-grid-right">

								<h5 style="text-align: justify;">
									<a href="tintuc/{{$tm->id}}/{{$tm->TieuDeKhongDau}}.html">{{$tm->TieuDe}}</a>
								</h5>
								<div class="sub-meta">
									<span>
										<i class="far fa-clock"></i>{{$tm->created_at->toDateString()}}</span>
								</div>
							</div>
							
						</div>
						@endforeach
					</div>
				</div>
				<!-- subscribe -->
				<div class="col-lg-4 subscribe-main footer-grid-agileits-w3ls text-left">
					<h2 style="text-align: center;">Đăng kí để cập nhật những tin tức mới nhất</h2>
					<div class="subscribe-main text-left">
							<div class="subscribe-form" align="center">									
								<button class="btn btn-primary submit"><a href="dangky" style="color: white">Đăng kí</a></button>
								<div class="clearfix"> </div>
						   </div>					
					</div>
					<!-- //subscribe -->
				</div>
			</div>
			<!-- footer -->
			<div class="footer-cpy text-center">
				<div class="footer-social">
					<div class="copyrighttop">
						<ul>
							<li class="mx-3">
								<a class="facebook" href="#">
									<i class="fab fa-facebook-f"></i>
									<span>Facebook</span>
								</a>
							</li>
							<li>
								<a class="facebook" href="#">
									<i class="fab fa-twitter"></i>
									<span>Twitter</span>
								</a>
							</li>
							<li class="mx-3">
								<a class="facebook" href="#">
									<i class="fab fa-google-plus-g"></i>
									<span>Google+</span>
								</a>
							</li>
							<li>
								<a class="facebook" href="#">
									<i class="fab fa-pinterest-p"></i>
									<span>Pinterest</span>
								</a>
							</li>
						</ul>

					</div>
				</div>
				<div class="w3layouts-agile-copyrightbottom">
					<p>© 2018 Weblog. All Rights Reserved | Design by
						<a href="http://w3layouts.com/">W3layouts</a>
					</p>

				</div>
			</div>

			<!-- //footer -->
		</div>
	</footer>
	<!---->