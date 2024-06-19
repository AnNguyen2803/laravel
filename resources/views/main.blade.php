<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		@include('head')
	</head>
		@include('header')
		<body>	
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						@include('booking')
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Địa điểm nổi tiếng</h1>
		                        <p>Chúng tôi có thể đưa bạn đến những thành phố du lịch hàng đầu</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="" src="https://statics.vinpearl.com/tour-ha-noi-1_1683258940.jpg" alt="" height = "280x !important">
								</div>
								<div class="desc">	
									<!-- <a href="#" class="price-btn"></a>-->
									<h4>Hà Nội</h4>
									<p>Viet Nam</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="" src="https://vcdn1-dulich.vnecdn.net/2022/06/01/CauVangDaNang-1654082224-7229-1654082320.jpg?w=0&h=0&q=100&dpr=2&fit=crop&s=MeVMb72UZA27ivcyB3s7Kg" alt="" height = "280x !important">
								</div>
								<div class="desc">	
									<!-- <a href="#" class="price-btn">$250</a>-->
									<h4>Đà nẵng</h4>
									<p>Viet Nam</p>			
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="" src="https://tphcm.dangcongsan.vn/DATA/72/IMAGES/2023/11/tao-da-de-tphcm-phat-trien-thanh-do-thi-thong-minh1517188897.jpg" alt="" height = "280x !important">
								</div>
								<div class="desc">	
									<!-- <a href="#" class="price-btn">$350</a>			 -->
									<h4>Thành phố Hồ Chí Minh</h4>
									<p>Viet Nam</p>			
								</div>
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End popular-destination Area -->
			

			<!-- Start price Area -->
			<section class="price-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Giá hấp dẫn</h1>
		                        <p>Chúng tôi cung những hạng vé với mức giá hấp dẫn</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						<div class="col-lg-6">
							<div class="single-price">
								<h4>Hạng phổ thông</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Hà Nội</span>
										<a href="#" class="price-btn">chỉ từ 1.200.000đ</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Đà Nẵng</span>
										<a href="#" class="price-btn">chỉ từ 1.300.000đ</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thành Phố Hồ Chính Minh</span>
										<a href="#" class="price-btn">chỉ từ 1.100.000đ</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Phú Quốc</span>
										<a href="#" class="price-btn">chỉ từ 960.000đ</a>
									</li>				
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="single-price">
								<h4>Hạng Thương Gia</h4>
								<ul class="price-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Hà Nội</span>
										<a href="#" class="price-btn">chỉ từ 1.500.000đ</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Đà Nẵng</span>
										<a href="#" class="price-btn">chỉ từ 1.400.000đ</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Thành Phố Hồ Chính Minh</span>
										<a href="#" class="price-btn">chỉ từ 1.600.000đ</a>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Phú Quốc</span>
										<a href="#" class="price-btn">chỉ từ 1.500.000đ</a>
									</li>										
								</ul>
							</div>
						</div>											
					</div>
				</div>	
			</section>
			<!-- End price Area -->
			<!-- Start testimonial Area -->
		    <section class="testimonial-area section-gap">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Đánh giá khách hàng</h1>
		                        <p>Chúng tôi luôn hướng tới trải nghiệm khách hàng tốt nhất</p>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial">
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="desc">
		                            <p>
									Travelove cung cấp dịch vụ đặt vé nhanh chóng và tiện lợi, giá cả hợp lý.		     
		                            </p>
		                            <h4>Hoàng Anh</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        
		                        <div class="desc">
		                            <p>
									Tôi đã đặt vé qua Travelove và rất hài lòng với sự chuyên nghiệp của họ.
		                            </p>
		                            <h4>Linh Nga</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="desc">
		                            <p>
									Travelove giúp tôi tiết kiệm thời gian và tiền bạc khi đi du lịch, rất đáng tin cậy.		     
		                            </p>
		                            <h4>Tuấn Hùng</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
							<div class="single-testimonial item d-flex flex-row">
		                        <div class="desc">
		                            <p>
									Dịch vụ của Travelove rất thuận tiện và dễ sử dụng. Tôi đã đặt vé nhiều lần và luôn được phục vụ tốt.		     
		                            </p>
		                            <h4>Ngọc Trâm</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        
		                        <div class="desc">
		                            <p>
									Travelove có đội ngũ hỗ trợ khách hàng rất nhiệt tình và chu đáo. Tôi sẽ tiếp tục sử dụng dịch vụ của họ.
		                            </p>
		                            <h4>Quang Minh</h4>
	                           		<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>
										<span class="fa fa-star"></span>			
									</div>	
		                        </div>
		                    </div>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="desc">
		                            <p>
									Tôi đã khám phá Travelove qua lời giới thiệu và không hối hận về quyết định này. Họ mang lại sự tiện lợi và tin cậy trong mỗi chuyến đi của tôi.		     
		                            </p>
		                            <h4>Thảo Vy</h4>
	                            	<div class="star">
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star checked"></span>
										<span class="fa fa-star"></span>				
									</div>	
		                        </div>
		                    </div>                 	                    		                    
		                </div>
		            </div>
		        </div>
		    </section>

			<!-- Start home-about Area -->
			<section class="home-about-area">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-end">
            <div class="col-lg-6 col-md-12 home-about-left">
                <h1>
                    Bạn đang có thắc mắc về dịch vụ của chúng tôi? <br>
                    Đừng ngần ngại tìm hiểu. <br>
                </h1>
                <p>
                    Chúng tôi luôn lắng nghe bạn, hãy để lại lời nhắn.
                </p>
                @auth
                <a href="{{ route('reviews.create') }}" class="primary-btn text-uppercase">Để lại đánh giá</a>
                @endauth
            </div>
            <div class="col-lg-6 col-md-12 home-about-right no-padding">
                <img class="img-fluid" src="/template/img/about-img.jpg" alt="">
            </div>
        </div>
    </div>
</section>

			<!-- End home-about Area -->
			
	
			<!-- Start blog Area -->
			<section class="recent-blog-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10">Các hãng máy bay</h1>
								<p>Chúng tôi là đối tác của các hãng máy bay hàng đầu </p>
							</div>
						</div>
					</div>							
					<div class="row">
						<div class="active-recent-blog-carusel">
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="" src="https://inkythuatso.com/uploads/thumbnails/800/2021/09/logo-bamboo-airways-inkythuatso-13-16-29-54.jpg" alt="" style = "width: 100%; height: 200px">
								</div>
								<div class="details">
									<h2 style = "text-align: center">Bamboo Airway</h2>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="" src="https://careerfinder.vn/wp-content/uploads/2020/05/vietnam-airline-logo.jpg" alt="" style = "width: 100%; height: 200px">
								</div>
								<div class="details">
									<h2 style = "text-align: center">vietnam airlines</h2>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="" src="https://inkythuatso.com/uploads/thumbnails/800/2021/09/vietjet-airlines-logo-15-13-38-29.jpg" alt="" style = "width: 100%; height: 200px">
								</div>
								<div class="details">
									<h2 style = "text-align: center">vietjet air</h2>
								</div>	
							</div>
							<div class="single-recent-blog-post item">
								<div class="thumb">
									<img class="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTd67qI6Hhfm9VXk-WWEP5FgUt-2GgWOgVYJg&s" alt="" style = "width: 100%; height: 200px">
								</div>
								<div class="details">
									<h2 style = "text-align: center">Vietravel Airlines</h2>
								</div>	
							</div>													

						</div>
					</div>
				</div>	
			</section>
			<!-- End recent-blog Area -->			

			<!-- start footer Area -->		
			<footer style="background-color: black;color:antiquewhite" class="footer-area section-gap">
				<div class="container">

					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Về chúng tôi</h6>
								<p style="text-align: justify;">
                                Travelove là hệ thống đặt vé máy bay mới, đầy sáng tạo, hướng đến việc mang lại trải nghiệm bay tối ưu cho bạn. Chúng tôi giúp bạn khám phá và mua vé cho mọi chuyến bay, từ các hãng hàng không giá rẻ đến các hãng hàng không quốc tế cao cấp, với giao diện thân thiện và dễ sử dụng. 
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Trang điều hướng</h6>
								<div class="row">
									<div class="col" >
										<ul style = "padding-left: 20px">
											<li><a href="/">Trang chủ</a></li>
											<li><a href="/blog">Blog</a></li>
											<li><a href="/contact">Liên hệ</a></li>
											<li><a href="/policy">Chính sách</a></li>
										</ul>
									</div>					
								</div>							
							</div>
						</div>							
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Phản hồi</h6>
								<p>
									Hãy để lại lời nhắn cho chúng tôi									
								</p>								
								<div id="mc_embed_signup">
									<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
										<div class="input-group d-flex flex-row">
											<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
											<button class="btn bb-btn"><span class="lnr lnr-location"></span></button>		
										</div>									
										<div class="mt-10 info"></div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-3  col-md-6 col-sm-6">
                            <h6>Địa chỉ</h6>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.663812647597!2d105.82826657508024!3d21.006109180637612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac7e35791591%3A0x37fd22867b5fb52f!2zS2luZyBCdWlsZGluZywgMSBQLiBDaMO5YSBC4buZYywgS2ltIExpw6puLCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1718558559055!5m2!1svi!2s" width="100%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-between align-items-center">
						<p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Nhóm 5 made with <i class="fa fa-heart-o" aria-hidden="true"></i></p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->	

			@include('footer');
		</body>
	</html>