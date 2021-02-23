@extends('layouts.app')
@section('title', 'Services')
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

<!-- Service Area Start -->
<div class="service-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h3>What We  <span>Provide</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row">
            @if($services->count() > 0)
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <!-- single-service Start -->
                        <div class="card py-3">
                            <div class="single-service text-center">
                                <div class="service-icon">
                                    <a href="{{route('single.service',['url'=>$service->url])}}">
                                        <img src="{{ route('service.image',['filename'=>$service->avatar]) }}" class="img-rounded img-circle service-img" alt="">
                                    </a>
                                    <h3><a href="{{route('single.service',['url'=>$service->url])}}">{{$service->name}}</a></h3>
                                </div>
                            </div>
                            <div class="serviace-info">
                                <p class="text-justify px-3"> {{Str::limit($service->description, 100)}}</p>
                            </div><!--// serviace-info -->
                            <div class="text-center">
                                <a class="text-center" href="{{route('single.service',['url'=>$service->url])}}">Read More...</a>
                            </div>
                        </div>
                        <!-- single-service End -->
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</div>
<!-- Service Area End -->


<!-- Perfect-start-area  Start -->
<div class="perfect-start-aera bg-grey">
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