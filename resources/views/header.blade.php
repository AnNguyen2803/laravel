@php
use Illuminate\Support\Facades\Auth;
@endphp
<header id="header">
    <div class="header-top">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                <ul>
                    <li><a href="#">Nhóm 5</a></li>
                    <li><a href="#"></a></li>
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
            <a href="/"><img src="/template/img/logo.png" alt="" title="" style="
    width: 100px;
    object-fit: cover;
"/></a>
            </div>
            <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="/">Trang chủ</a></li>
                <!-- <li><a href="about.html">About</a></li>
                <li><a href="packages.html">Packages</a></li>
                <li><a href="hotels.html">Hotels</a></li>
                <li><a href="insurance.html">Insurence</a></li>
                <li class="menu-has-children"><a href="">Blog</a> -->
            <ul>
                </ul>
                </li>	
                <li class="menu-has-children"><a href="/contact">Liên hệ</a>
                <li class="menu-has-children"><a href="/policy">Chính sách</a>
                <li class="menu-has-children"><a href="/about-us">Về chúng tôi</a>
                <li class="menu-has-children"><a href="/blog">Blog</a>
                </li>					          					          		          
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('user.information') }}">Thông tin cá nhân</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="/login">Đăng nhập</a></li>
                @endif
            </ul>
            </nav><!-- #nav-menu-container -->					      		  
        </div>
    </div>
</header><!-- #header -->