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
                                        <li><a href="{{ route('home.item.by.category',['category'=>$category->name]) }}">{{$category->name}}</a></li>
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