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
                    <li><a href="{{ route('user.information') }}">{{ Auth::user()->name }}</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Đăng xuất
                        </a>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                @endif
            </ul>
            </nav><!-- #nav-menu-container -->					      		  
        </div>
    </div>
</header><!-- #header -->
    <div style="font-family: Arial, sans-serif; max-width: 400px; margin: 100px auto;">
        <h1 style="font-size: 24px; color: #333; text-align: center;">Thông tin cá nhân của bạn</h1>
        <p style="font-size: 16px; color: #666;"><strong>Tên:</strong> {{ $user->name }}</p>
        <p style="font-size: 16px; color: #666;"><strong>Email:</strong> {{ $user->email }}</p>
        <p style="font-size: 16px; color: #666;"><strong>Email xác minh:</strong> {{ $user->email_verified_at }}</p>
        

        <p style="text-align: center; margin-top: 20px;">
            <a href="{{ route('user.editInformation') }}" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px; display: inline-block;">Chỉnh sửa thông tin</a>
        </p>
    </div>

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
    @include('./footer')

</body>
</html>


