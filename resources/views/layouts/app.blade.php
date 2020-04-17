<html class="no-js" lang="en">


<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/seomar-v1/seomar/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 11:55:54 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Tech-Republic | {{ $page_name }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/techfavicon.jpg')}}">
    
    <!-- CSS 
    ========================= -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    
    <!-- Fonts CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bicon.min.css')}}">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
    <!-- Modernizer JS -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
</head>

<body>

     <!-- Header-area start -->
 <header class="header header-sticky mb-3">
    <div class="header-area inner-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- logo Start -->
                    <div class="logo">
                        <a href="{{route('home.page')}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt=""></a>
                    </div><!--// logo End -->
                </div>
                <div class="col-lg-8">
                    <!-- main-menu-area Start -->
                    <div class="main-menu">
                        <nav class="main-navigation">
                            <ul>
                                <li class="nav-item {{ Route::is('home.page') ? 'active' : '' }}">
                                    <a href="{{route('home.page')}}">HOME</a>
                                </li>
                                <li class="nav-item {{ Route::is('about.page') ? 'active' : '' }}">
                                    <a href="{{route('about.page')}}">ABOUT</a>
                                </li>
                                <li class="nav-item {{ Route::is('service.page') ? 'active' : '' }}">
                                    <a href="{{route('service.page')}}">SERVICE</a>
                                </li>
                                <li class="nav-item {{ Route::is('blog.page') ? 'active' : '' }}">
                                    <a href="{{route('blog.page')}}">BLOG</a>
                                </li>
                                <li class="nav-item {{ Route::is('contact.page') ? 'active' : '' }}">
                                    <a href="{{route('contact.page')}}">CONTACT</a>
                                </li>
                                <li><a href="{{route('home.shop.items')}}">SHOP</a>
                                    <ul class="sub-menu">
                                        @foreach(\App\ItemCategory::all() as $category)
                                        <li><a href="{{route('item.name.by.category',['item_category'=>$category->name])}}">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div><!--// main-menu-area End -->
                </div>
                <div class="col">
                    <!-- mobile-menu start -->
                    <div class="mobile-menu d-block d-lg-none"></div>
                    <!-- mobile-menu end -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header-area end -->
    <!-- Main Wrapper Start -->
    <div class="main-wrapper">
        @yield('content')
    </div>

    <!-- Footer Area Start -->
<footer class="footer-area bg-grey">
    <!-- Footer-top Start -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-top-inner pt--50 pb--100">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Footer-info Start -->
                                <div class="footer-info mt--60">
                                    <div class="footer-logo">
                                        <a href="#"><img src="{{asset('assets/images/logo/logo.png')}}" alt=""></a>
                                    </div>
                                    <p>It is a long established fact that a reader will page when looking at its layout.  all reader will page when looking </p>
                                    <ul class="social">
                                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                        <li><a href="#"><i class="bi bi-twitter-bird"></i></a></li>
                                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                        <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                    </ul>
                                </div><!--// Footer-info End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Footer-info Start -->
                                <div class="footer-info  mt--60">
                                    <div class="footer-title">
                                        <h3>SERVICES</h3>
                                    </div>
                                    <ul class="footer-list">
                                        @foreach(\App\Service::all() as $service)
                                            <li><a href="{{route('single.service',['url'=>$service->url])}}">{{$service->name}}</a></li>
                                        @endforeach
                                        
                                    </ul>
                                </div><!--// Footer-info End -->
                            </div>
                            <div class="col-lg-4  col-md-6">
                                <!-- Footer-info Start -->
                                <div class="footer-info  mt--60">
                                    <div class="footer-title">
                                        <h3>QUICK CONTACT</h3>
                                    </div>
                                    <ul class="footer-list">
                                        <li>Bluesitline, 4/3 north corn <br> walinon, Usa.</li>
                                        <li><a href="#">seomar11@gmail.com</a></li>
                                        <li><a href="#">+88345 789 456</a></li>
                                    </ul>
                                </div><!--// Footer-info End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--// Footer-top End -->
    
    <!-- footer-bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-bottom-inner text-black text-center">
                        <p>Copyright &copy; Tech-Republic <?php echo(date('Y'))?> All Right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--// footer-bottom End -->
</footer>
<!-- Footer Area End -->
</body>

<!-- jQuery JS -->
<script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('assets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>


</html>