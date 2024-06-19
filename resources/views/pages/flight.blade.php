<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @include('./head')
</head>
<body>
@php
use Illuminate\Support\Facades\Auth;
@endphp
<header id="header">
    <div class="header-top">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                <ul>
                    <li><a href="#">Visit Us</a></li>
                    <li><a href="#">Buy Tickets</a></li>
                </ul>			
            </div>
            <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                <div class="header-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>			  					
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo" >
            <a href="index.html"><img src="/template/img/logo.png" alt="" title="" style="
    width: 100px;
    object-fit: cover;
"/></a>
            </div>
            <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="index.html">Home</a></li>
                <!-- <li><a href="about.html">About</a></li>
                <li><a href="packages.html">Packages</a></li>
                <li><a href="hotels.html">Hotels</a></li>
                <li><a href="insurance.html">Insurence</a></li>
                <li class="menu-has-children"><a href="">Blog</a> -->
            <ul>
                    <li><a href="blog-home.html">Blog Home</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                </ul>
                </li>	
                <li class="menu-has-children"><a href="">Hỗ trợ</a>
                <ul>
                    <li><a href="elements.html">Trợ giúp</a></li>
                    <li class="menu-has-children"><a href="">Liên hệ chúng tôi</a>
                    </li>					                		
                </ul>
                </li>					          					          		          
                @if(Auth::check())
                        <li><a href="#">{{ Auth::user()->name }}</a></li>
                        <li>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="/logout"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                    @else
                        <li><a href="login">Đăng nhập</a></li>
                    @endif
            </ul>
            </nav><!-- #nav-menu-container -->					      		  
        </div>
    </div>
</header>
<body>	
    <!-- start banner Area -->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
			
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
            <div class="col-lg-12 col-md-10 banner-right" style="padding-top: 50px">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
        <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true"><i class="fa-solid fa-plane"></i> Vé máy bay</a>                    
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active " id="flight" role="tabpanel" aria-labelledby="flight-tab">
                    <form class="form-wrap" method="post" action="{{ route('booking.submit') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="from" class="form-label">
                                    <i class="fa-solid fa-plane-departure"></i> Sân khởi hành
                                </label>
                                <input type="text" class="form-control" id="from" name="from" placeholder="From" autocomplete="off">
                                <div id="from-suggestions" class="suggestions">
                                    <div data-value="Nội bài (Hà Nội)"><i class="fa-solid fa-plane-up"></i> Nội bài(Hà Nội)</div>
                                    <div data-value="Tân Sơn Nhất (Tp.Hồ Chí Minh)"><i class="fa-solid fa-plane-up"></i> Tân Sơn Nhất (Tp.Hồ Chí Minh)</div>
                                    <div data-value="Đà Nẵng"><i class="fa-solid fa-plane-up"></i> Đà Nẵng</div>
                                    <div data-value="Phú Quốc"><i class="fa-solid fa-plane-up"></i> Phú Quốc</div>
                                    <div data-value="Cam Ranh"><i class="fa-solid fa-plane-up"></i> Cam Ranh</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="to" class="form-label">
                                    <i class="fa-solid fa-plane-arrival"></i> Sân bay đến
                                </label>
                                <input type="text" class="form-control" id="to" name="to" placeholder="To" autocomplete="off">
                                <div id="to-suggestions" class="suggestions">
                                    <div data-value="Nội bài (Hà Nội)"> <i class="fa-solid fa-plane-up"></i>Nội bài(Hà Nội)</div>
                                    <div data-value="Tân Sơn Nhất (Tp.Hồ Chí Minh)"><i class="fa-solid fa-plane-up"></i> Tân Sơn Nhất (Tp.Hồ Chí Minh)</div>
                                    <div data-value="Đà Nẵng"><i class="fa-solid fa-plane-up"></i> Đà Nẵng</div>
                                    <div data-value="Phú Quốc"><i class="fa-solid fa-plane-up"></i> Phú Quốc</div>
                                    <div data-value="Cam Ranh"><i class="fa-solid fa-plane-up"></i> Cam Ranh</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="from" class="form-label">Ngày Đi</label>
                                <input type="date" class="form-control" name="start" placeholder="Start" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start'" id = "start">
                            </div>
                            <div class="col-md-6">
                                <div class = "d-flex align-items-center">
                                <label for="return-checkbox" class="form-label">Khứ hồi</label>
                                <input type="checkbox" id="return-checkbox">
                                </div>
                                <input type="date" class="form-control disabled-input" name="return" placeholder="Return" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return'" id = "return">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="to" class="form-label">
                                <i class="fa-solid fa-child"></i> Người lớn
                                </label>    
                                <input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults'">
                            </div>
                            <div class="col-md-6">
                                <label for="to" class="form-label">
                                <i class="fa-solid fa-baby"></i> Trẻ em
                                </label>
                                <input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child'">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="class" class="form-label">Loại Chuyến Bay</label>
                                <select class="form-control" id="class" name="class">
                                    <option value="economy" selected>Phổ thông</option>
                                    <option value="business">Thương gia</option>
                                    <option value="first">Hạng nhất</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button name="submit" class="primary-btn text-uppercase">Tìm kiếm chuyến bay</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                    <div class="container">

                </div>			  	
                </div>
                    <div class="tab-pane fade " id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
                    <div class="container">
                        <form class="form-wrap">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="from" class="form-label">Địa điểm thuê xe</label>
                                    <input type="text" class="form-control" name="name" placeholder="From " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="start" class="form-label">Ngày bắt đầu</label>
                                    <input type="date" class="form-control" name="start" placeholder="Start " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="return" class="form-label">Giờ bắt đầu</label>
                                    <input type="time" class="form-control" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="return" class="form-label">Ngày kết thúc</label>
                                    <input type="date" class="form-control" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="return" class="form-label">Giờ kết thúc</label>
                                    <input type="time" class="form-control" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <a href="#" class="btn primary-btn btn-block text-uppercase">Tìm kiếm xe</a>
                                </div>
                            </div>
                        </form>			  	
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    @include('/pages/flightwrapper')						
		    <!-- End testimonial Area -->

            <footer class="footer-area section-gap">
				<div class="container">

					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Agency</h6>
								<p>
									The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point 
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Navigation Links</h6>
								<div class="row">
									<div class="col">
										<ul>
											<li><a href="#">Home</a></li>
											<li><a href="#">Feature</a></li>
											<li><a href="#">Services</a></li>
											<li><a href="#">Portfolio</a></li>
										</ul>
									</div>
									<div class="col">
										<ul>
											<li><a href="#">Team</a></li>
											<li><a href="#">Pricing</a></li>
											<li><a href="#">Blog</a></li>
											<li><a href="#">Contact</a></li>
										</ul>
									</div>										
								</div>							
							</div>
						</div>							
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>
									For business professionals caught between high OEM price and mediocre print and graphic output.									
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
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">InstaFeed</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="/template/img/i1.jpg" alt=""></li>
									<li><img src="/template/img/i2.jpg" alt=""></li>
									<li><img src="/template/img/i3.jpg" alt=""></li>
									<li><img src="/template/img/i4.jpg" alt=""></li>
									<li><img src="/template/img/i5.jpg" alt=""></li>
									<li><img src="/template/img/i6.jpg" alt=""></li>
									<li><img src="/template/img/i7.jpg" alt=""></li>
									<li><img src="/template/img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>						
					</div>

					<div class="row footer-bottom d-flex justify-content-between align-items-center">
						<p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- start footer Area -->		
            @include('./footer');
</body>
</html>