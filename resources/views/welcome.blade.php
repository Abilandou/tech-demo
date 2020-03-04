@extends('layouts.app')

@section('content')
    


<!-- Hero Slider start -->
<div class="hero-slider hero-slider-1">
    <div class="single-slide">
        <!-- Hero Content One Start -->
        <div class="hero-content-one container">
            <div class="row">
                <div class="col-lg-6 col-md-7 order-md-1 order-2"> 
                    <!-- slider-text-info Start -->
                    <div class="slider-text-info">
                        <h4>TechRepublic</h4>
                        <h1><span class="color-two">Connecting</span> People</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                         The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                        <div class="slider-button">
                            <a href="{{route('about.page')}}" class="slider-btn">ABOUT MORE</a>
                        </div>
                    </div><!--// slider-text-info End -->
                </div>
                <div class="col-lg-6 col-md-5 order-md-2 order-1"> 
                    <!-- slider-inner-image Start -->
                    <div class="slider-inner-image wow fadeInBottom" data-wow-duration="1s">
                        <img src="assets/images/slider/slider-inner-2.png" alt="">
                    </div><!--// slider-inner-image End -->
                </div>
            </div>
        </div>
        <!-- Hero Content One End -->
    </div>
</div>
<!-- Hero Slider end -->

<!-- Service Area Start -->
<div class="service-area bg-grey section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>SERVICES</h4>
                    <h3>What We  <span>Provide</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <!-- single-service Start -->
                    <div class="single-service text-center">
                        <div class="service-icon">
                            <a href="{{route('single.service',['url'=>$service->url])}}"><span class="bi bi-screen"></span></a>
                        </div> <!--// service-icon -->
                        
                        <div class="serviace-info">
                            <h3><a href="{{route('single.service',['url'=>$service->url])}}">{{$service->name}}</h3>
                            <p> {{Str::limit($service->description, 100) }}</p>
                        </div><!--// serviace-info -->
                    </div>
                    <!-- single-service End -->
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Service Area End -->

<!-- Our case Area Start -->
<div class="our-case-area section-ptb">
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>CASE</h4>
                    <h3>Case <span>Study</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mt--30">
                <!-- single-case-item Start -->
                <div class="single-case-item">
                    <div class="single-case-image">
                        <a class="case-image" href="project-details.html"><img src="assets/images/case/01.jpg" alt=""></a>
                    </div>
                    <div class="case-content">
                        <h3><a href="project-details.html">Built web faster & better</a></h3>
                        <p>Randomised words which don't look n slightly believable. If you are going to use a passayou need to be sure kew ki..</p>
                    </div>
                </div><!--// single-case-item End -->
            </div>
            <div class="col-lg-4 col-md-6 mt--30">
                <!-- single-case-item Start -->
                <div class="single-case-item">
                    <div class="single-case-image">
                        <a class="case-image" href="project-details.html"><img src="assets/images/case/02.jpg" alt=""></a>
                    </div>
                    <div class="case-content">
                        <h3><a href="project-details.html">SEO marketing do a unlimited</a></h3>
                        <p>Randomised words which don't look n slightly believable. If you are going to use a passayou need to be sure kew ki..</p>
                    </div>
                </div><!--// single-case-item End -->
            </div>
            <div class="col-lg-4 col-md-6 mt--30">
                <!-- single-case-item Start -->
                <div class="single-case-item">
                    <div class="single-case-image">
                        <a class="case-image" href="project-details.html"><img src="assets/images/case/03.jpg" alt=""></a>
                    </div>
                    <div class="case-content">
                        <h3><a href="project-details.html">Twice profit than before</a></h3>
                        <p>Randomised words which don't look n slightly believable. If you are going to use a passayou need to be sure kew ki..</p>
                    </div>
                </div><!--// single-case-item End -->
            </div>
        </div>
    </div>
</div>
<!-- Our case Area End -->

<!-- About Us Area Start -->
<div class="about-us-area  bg-grey section-ptb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="about-us-wrap">
                    <!-- section-title Start -->
                    <div class="section-title text-left">
                        <h4>ABOUT US</h4>
                        <h3>What We <span>Are</span></h3>
                    </div>
                    <!--// section-title End -->

                    <!-- About us content Start -->
                    <div class="about-us-content">
                        <p>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                          The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,page when looking at its layout.
                          The point of using
                        </p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        <ul>
                            <li>Content of a page when looking at its layout. </li>
                            <li>Content of a page when looking at its layout azer duskam. </li>
                            <li>Content of a page when looking at its layout azer</li>
                        </ul>  
                    </div>
                    <!--// About us content End -->
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 order-lg-2 order-1">
                <!-- about-us-image Start -->
                <div class="about-us-image">
                    <img src="assets/images/about/about-02.png" alt="">
                </div><!--// about-us-image End -->
            </div>
        </div>
    </div>
</div>
<!-- About Us Area End -->


<!-- Pricing Area Start -->
<div class="pricing-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>PRICING</h4>
                    <h3>What We <span>Have</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <!-- Single-pricing Start-->
                <div class="single-priceing text-center mt--30">
                    <div class="priceing-header">
                        <h4>Primary</h4>
                    </div>
                    <div class="pricing-title">
                        <h3>Per Month <span>$</span><span class="price-tb">27 </span> Only</h3>
                        <p>It’s Perfect for a small business</p>
                    </div>
                    <div class="pricing-body">
                        <ul>
                            <li>Limited Storage</li>
                            <li>Contrary to popular belief</li>
                            <li>Limited download</li>
                            <li>500 Gb harddisk space</li>
                        </ul>
                        <div class="plan-button">
                            <a href="#">Choose Plan</a>
                        </div>
                    </div>
                </div> <!--// Single-pricing End-->
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Single-pricing Start-->
                <div class="single-priceing  text-center  active  mt--30">
                    <div class="priceing-header">
                        <h4>Standrad</h4>
                    </div>
                    <div class="pricing-title">
                        <h3>Per Month <span>$</span><span class="price-tb">77 </span> Only</h3>
                        <p>It’s Perfect for a small business</p>
                    </div>
                    <div class="pricing-body">
                        <ul>
                            <li>Unlimited Storage</li>
                            <li>Contrary to popular belief</li>
                            <li>Unlimited downloads</li>
                            <li>1000 Gb harddisk space</li>
                        </ul>
                        <div class="plan-button">
                            <a href="#">Choose Plan</a>
                        </div>
                    </div>
                </div> <!--// Single-pricing End-->
            </div>
            <div class="col-lg-4 col-md-6">
                <!-- Single-pricing Start-->
                <div class="single-priceing  text-center mt--30">
                    <div class="priceing-header">
                        <h4>Premuim</h4>
                    </div>
                    <div class="pricing-title">
                        <h3>Per Month <span>$</span><span class="price-tb">99 </span> Only</h3>
                        <p>It’s Perfect for a small business</p>
                    </div>
                    <div class="pricing-body">
                        <ul>
                            <li>Unlimited Storage</li>
                            <li>Contrary to popular belief</li>
                            <li>Unlimited download</li>
                            <li>3000 Gb harddisk space</li>
                        </ul>
                        <div class="plan-button">
                            <a href="#">Choose Plan</a>
                        </div>
                    </div>
                </div> <!--// Single-pricing End-->
            </div>
        </div>
    </div>
</div>
<!-- Pricing Area End -->

<!-- Testimonial Area Start -->
@if($testimonies->count() > 0)
<div class="testimonial-area section-pb">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 mr-auto ml-auto testimonial-active">
                <!-- testimonial-wrap Start -->
                @foreach($testimonies as $testimony)
                    <div class="testimonial-wrap text-center">
                        <div class="testimonial-image ">
                            @if($testimony->avatar == null)
                                <img src="{{asset('assets/images/review/comment-3.jpg')}}" alt="">
                            @else
                                <img src="{{asset($testimony->avatar)}}" width="120px" height="120px" alt="">
                            @endif
                        </div>
                        <div class="testimonial-content">
                            <p>{{$testimony->testimony}}</p>
                            
                        </div>
                        <div class="author-info">
                            <h4>{{$testimony->name}}</h4>
                            <p>{{$testimony->profession}}</p>
                        </div>
                    </div>
                @endforeach
                
                <!--// testimonial-wrap End -->
            </div>
        </div>
    </div>
</div>
@endif
<!-- Testimonial Area End -->

<!-- Latest News Area Start -->
<div class="latest-news-area section-pt section-pb-80  bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>LATEST NEWS</h4>
                    <h3>What We <span>Have</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row latest-blog-active">
            <div class="col-lg-4">
                <!-- single-latest-blog Start -->
                <div class="single-latest-blog mb--30 mt--30">
                    <div class="latest-blog-image">
                        <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-01.jpg" alt=""></a>
                    </div>
                    <div class="latest-blog-cont">
                        <h3><a href="blog-details-left-sidebar.html">Digatal marketing is one of the</a></h3>
                        <p>Lorem Ipsum available, but the majority have suffered alteration in form.</p>
                    </div>
                </div><!--// single-latest-blog End -->
            </div>
            <div class="col-lg-4">
                <!-- single-latest-blog Start -->
                <div class="single-latest-blog mb--30 mt--30">
                    <div class="latest-blog-image">
                        <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-04.jpg" alt=""></a>
                    </div>
                    <div class="latest-blog-cont">
                        <h3><a href="blog-details-left-sidebar.html">Keywords research is more then</a></h3>
                        <p>Lorem Ipsum available, but the majority have suffered alteration in form.</p>
                    </div>
                </div><!--// single-latest-blog End -->
            </div>
            <div class="col-lg-4">
                <!-- single-latest-blog Start -->
                <div class="single-latest-blog mb--30 mt--30">
                    <div class="latest-blog-image">
                        <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-06.jpg" alt=""></a>
                    </div>
                    <div class="latest-blog-cont">
                        <h3><a href="blog-details-left-sidebar.html">For SEO marketing you have to</a></h3>
                        <p>Lorem Ipsum available, but the majority have suffered alteration in form.</p>
                    </div>
                </div><!--// single-latest-blog End -->
            </div>
            <div class="col-lg-4">
                <!-- single-latest-blog Start -->
                <div class="single-latest-blog mb--30 mt--30">
                    <div class="latest-blog-image">
                        <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-02.jpg" alt=""></a>
                    </div>
                    <div class="latest-blog-cont">
                        <h3><a href="blog-details-left-sidebar.html">Keywords need to unlimited</a></h3>
                        <p>Lorem Ipsum available, but the majority have suffered alteration in form.</p>
                    </div>
                </div><!--// single-latest-blog End -->
            </div>
        </div>
    </div>
</div>
<!-- Latest News Area End -->











@endsection
