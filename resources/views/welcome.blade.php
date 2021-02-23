@extends('layouts.app')
@section('title', 'Home')
@section('header-style')
    <style>
        .service-img {
            border-radius: 50%;
            height: 100px;
            width: 100px;
        }
    </style>
@endsection
@section('content')

<!-- Hero Slider start -->
<div class="hero-slider hero-slider-1">
    <div class="single-slide">
        <!-- Hero Content One Start -->
        <div class="container hero-content-one">
            <div class="row">
                <div class="order-2 col-lg-6 col-md-7 order-md-1"> 
                    <!-- slider-text-info Start -->
                    <div class="slider-text-info">
                        <h4>TechRepublic</h4>
                        <h1><span class="color-two">Connecting</span> People</h1>
                        <p class="text-justify">
                            At TECH-REPUBLIC we are geared at meeting the needs of people in the areas 
                            of computer software, Networking and Hardware. Satisfaction of our customers 
                            is our priority. We help small businesses to grow digitally and increase sales 
                            on daily basis.
                        </p>
                        <div class="slider-button">
                            <a href="{{route('about.page')}}" class="slider-btn">ABOUT MORE</a>
                        </div>
                    </div><!--// slider-text-info End -->
                </div>
                <div class="order-1 col-lg-6 col-md-5 order-md-2"> 
                    <!-- slider-inner-image Start -->
                    <div class="slider-inner-image wow fadeInBottom" data-wow-duration="1s">
                        <img src="{{ asset('public/assets/images/slider/slider-inner-2.png') }}" alt="">
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
                    <div class="py-3 card">
                        <div class="text-center single-service">
                            <div class="service-icon">
                                <a href="{{route('single.service',['url'=>$service->url])}}">
                                    <img src="{{ route('service.image',['filename'=>$service->avatar]) }}" class="img-rounded img-circle service-img" alt="">
                                </a>
                                <h3><a href="{{route('single.service',['url'=>$service->url])}}">{{$service->name}}</a></h3>
                            </div>
                        </div>
                        <div class="serviace-info">
                            <p class="px-3 text-justify"> {{Str::limit($service->description, 100)}}</p>
                        </div><!--// serviace-info -->
                        <div class="text-center">
                            <a class="text-center" href="{{route('single.service',['url'=>$service->url])}}">Read More...</a>
                        </div>
                    </div>
                    <!-- single-service End -->
                </div>
                
            @endforeach
               
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('service.page') }}">View All Services</a>
        </div>
    </div>
</div>

<!-- Service Area End -->

<!-- Pricing Area Start -->
@if(count($plans) > 0)
<div class="pricing-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>PRICING</h4>
                    <h3>Website <span>Pricing</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row">
            @foreach($plans as $plan)
                <div class="col-lg-4 col-md-6">
                    <!-- Single-pricing Start-->
                    <div class="text-center single-priceing mt--30">
                        <div class="priceing-header">
                            <h4>{{ $plan->name }}</h4>
                        </div>
                        <div class="pricing-title">
                            <h3>Price<span>$</span><span class="price-tb">{{ $plan->price }} </span> Only</h3>
                            <p>It’s Perfect for a small business</p>
                        </div>
                        <div class="pricing-body">
                            <p>
                                {!! $plan->description !!}
                            </p>
                            <div class="plan-button">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enquiryModal">
                                    Choose Plan
                                </button>
                            </div>
                        </div>
                    </div> <!--// Single-pricing End-->
                </div>
                <div class="modal fade modal-dialog-centered" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="enquiryModalLabel">Make Enquiry For Plan: {{ $plan->name }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <small>Required Fields are marked <span class="text-danger">*</span></small>
                          <form action="{{ route('make.enquiry') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item" value="{{ $plan->name }}">
                            <input type="hidden" name="type" value="plan">
                              <div class="row">
                                  <div class="col-sm-12 col-md-12 col-lg-12">
                                      <div class="form-group">
                                          <label for="name">Your Name<span class="text-danger">*</span></label>
                                          <input 
                                            type="text"
                                            required
                                            value="{{ old('name') }}"
                                            name="name" id="" 
                                            class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <span class="text-danger invalid-feedback">{{ $message }}</span>
                                            @enderror
                                      </div>
                                  </div>
                                  <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="email">Your Email<span class="text-danger">*</span></label>
                                        <input 
                                            type="email"
                                            required
                                            value="{{ old('email') }}"
                                            name="email" id="" 
                                            class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                                <span class="text-danger invalid-feedback">{{ $message }}</span>
                                            @enderror
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="phone">Phone<span class="text-danger">*</span></label>
                                        <input 
                                            type="text"
                                            required
                                            value="{{ old('phone') }}"
                                            name="phone" id="" 
                                            class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                                <span class="text-danger invalid-feedback">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="phone">Additional Information<span class="text-danger">*</span></label>
                                        <textarea 
                                            name="enquiry"
                                            required
                                            class="form-control @error('enquiry') is-invalid @enderror" 
                                            id="" >
                                            {{ old('enquiry') }}
                                        </textarea>
                                        @error('enquiry')
                                            <span class="text-danger invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                             </div>
                             
                         
                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-5 text-center">
            <a href="{{ route('site.plans.index') }}">Explore All Plans</a>
        </div>
    </div>
</div>
@endif
<!-- Pricing Area End -->

<!-- About Us Area Start -->
<div class="about-us-area bg-grey section-ptb">
    <div class="container">
        <div class="row align-items-center">
            <div class="order-2 col-lg-6 order-lg-1">
                <div class="about-us-wrap">
                    <!-- section-title Start -->
                    <div class="text-left section-title">
                        <h4>ABOUT US</h4>
                        <h3>Why Choose <span>Us</span></h3>
                    </div>
                    <!--// section-title End -->

                    <!-- About us content Start -->
                    <div class="about-us-content">
                        <p class="text-justify">
                            We design, Evaluate and justify technology solutions from a thorough 
                            understanding of the business benefit for your company.
                            Our extensive experience managing all types of complex projects means we 
                            will handle every detail and coordinate all vendors so you can rest assured 
                            that your project will be completed on time and on budget. We want you to be 
                            completely satisfied with our services.
                        </p>
                        <p>
                            We will do whatever it takes to make you happy.
                        </p>
                    </div>
                    <!--// About us content End -->
                </div>
            </div>
            <div class="order-1 col-lg-5 offset-lg-1 order-lg-2">
                <!-- about-us-image Start -->
                <div class="about-us-image">
                    <img src="{{ asset('public/assets/images/about/about-02.png')}}" alt="">
                </div><!--// about-us-image End -->
            </div>
        </div>
    </div>
</div>
<!-- About Us Area End -->




<!-- Testimonial Area Start -->
@if($testimonies->count() > 0)
<div class="mt-5 testimonial-area section-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>TESTIMONIALS</h4>
                    <h3>What People <span>say</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row ">
            <div class="ml-auto mr-auto col-lg-12 testimonial-active">
                <!-- testimonial-wrap Start -->
                @foreach($testimonies as $testimony)
                    <div class="text-center testimonial-wrap">
                        <div class="testimonial-image ">
                            @if($testimony->avatar == null)
                                <img src="{{asset('public/assets/images/review/comment-3.jpg')}}" alt="">
                            @else
                                <img src="{{route("testimony.image",["filename"=>$testimony->avatar])}}" width="120px" height="120px" alt="">
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
@if(count(\App\Blog::all()) > 0)
    <div class="latest-news-area section-pt section-pb-80 bg-grey">
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
            <div class="row ">
            @foreach(\App\Blog::orderBy('id', 'DESC')->take(10)->get() as $blog)
                <div class="col-lg-4">
                    <!-- single-latest-blog Start -->
                    <div class="single-latest-blog mb--30 mt--30">
                        <div class="latest-blog-image">
                            <a href="{{ route('single.blog',['url'=>$blog->url]) }}"><img style="height: 250px; width:100%;" src="{{ route('blog.image',["filename"=>$blog->avatar]) }}" alt=""></a>
                        </div>
                        <div class="latest-blog-cont">
                            <h3><a href="{{ route('single.blog',['url'=>$blog->url]) }}">{{ $blog->title }}</a></h3>
                            <p class="text-justify">
                                {!! Str::limit($blog->description, 100) !!}
                            </p>
                        </div>
                    </div><!--// single-latest-blog End -->
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endif
<!-- Latest News Area End -->











@endsection
