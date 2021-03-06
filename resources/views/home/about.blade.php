@extends('layouts.app')
@section('title', 'About')
@section('content')

<!-- About Us Area Start -->
<div class="about-us-area section-ptb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <!-- about-us-image Start -->
                <div class="about-us-image wow fadeInBottom" data-wow-duration="1s">
                    <img src="{{ asset('public/assets/images/about/about-02.png')}}" alt="">
                </div><!--// about-us-image End -->
            </div>
            <div class="col-lg-6 offset-lg-1">
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
        </div>
    </div>
</div>
<!-- About Us Area End -->


<!-- Project-count-inner Start -->
<div class="project-count-inner section-pb overlay-bg section-pt-80">
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-sm-6">
            <!-- counter start -->
            <div class="text-center counter mt--30">
                <div class="count-icon">
                    <i class="bi bi-cup"></i>
                </div>
                <h3 class="counter-active">112</h3>
                <p>Award Won</p>
            </div>
            <!-- counter end -->
        </div>
        <div class="col-lg-3 col-sm-6">
            <!-- counter start -->
            <div class="text-center counter mt--30">
                <div class="count-icon">
                    <i class="bi bi-like"></i>
                </div>
                <h3 class="counter-active">345</h3>
                <p>Project Done</p>
            </div>
            <!-- counter end -->
        </div>
        <div class="col-lg-3 col-sm-6">
            <!-- counter start --> 
            <div class="text-center counter mt--30">
                <div class="count-icon">
                    <i class="bi bi-emo-smile"></i>
                </div>
                <h3 class="counter-active">215</h3>
                <p>Satisfied Client</p>
            </div>
            <!-- counter end -->
        </div>
        <div class="col-lg-3 col-sm-6">
            <!-- counter start -->
            <div class="text-center counter mt--30">
                <div class="count-icon">
                    <i class="bi bi-screen"></i>
                </div>
                <h3 class="counter-active">124</h3>
                <p>Running Project</p>
            </div>
            <!-- counter start -->
        </div>
    </div>
    </div>
</div>
<!-- Project-count-inner End -->


<!-- Our Team Area Start -->
<div class="our-team-area bg-grey section-ptb">
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>Team</h4>
                    <h3>Our Team  <span>Member</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row">
            @if($members->count() > 0)
                @foreach($members as $member)
                    <div class="col-lg-3 col-md-6">
                        <!-- Single Team Start -->
                        <div class="single-team mt--30">
                            <div class="team-imgae">
                                <img style="height: 250px; width:100%;" src="{{route('user.image',['filename'=>$member->avatar])}}" alt="">
                                <div class="social-link">
                                    @if($member->facebook == null)
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                    @else
                                        <a href="{{$member->facebook}}" target="_blank" ><i class="bi bi-facebook"></i></a>
                                    @endif
                                    @if($member->twitter == null)
                                        <a href="#"><i class="bi bi-twitter-bird"></i></a>
                                    @else
                                        <a href="{{$member->twitter}}" target="_blank"><i class="bi bi-twitter-bird"></i></a>
                                    @endif
                                    @if($member->youtube == null)
                                        <a href="#"><i class="bi bi-youtube"></i></a>
                                    @else
                                        <a href="{{$member->youtube}}" target="_blank"><i class="bi bi-youtube"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="team-info">
                                <h3>{{$member->name}}</h3>
                            </div>
                        </div><!--// Single Team End -->
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- Our Team Area End -->

<!-- Perfect-start-area  Start -->
<div class="perfect-start-aera">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="perfect-start-inner">
                    <p>Get that business going by building a website Now!!!</p>
                    <div class="get-started-button">
                        <a href="{{ route('site.plans.index') }}" class="start-btn">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Perfect-start-area  End -->







@endsection