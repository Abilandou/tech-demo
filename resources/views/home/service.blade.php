@extends('layouts.app')
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
                        <div class="single-service text-center">
                            <a href="{{route('single.service',['url'=>$service->url])}}"><img src="{{asset($service->avatar)}}"
                                class="rounded-circle" width="150px" height="150px" alt="service"> </a>
                            <div class="serviace-info">
                                <h3><a href="{{route('single.service',['url'=>$service->url])}}">{{$service->name}}</a></h3>
                                <p> {{Str::limit($service->description, 100)}}</p>
                            </div><!--// serviace-info -->
                        </div>
                        <!-- single-service End -->
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</div>
<!-- Service Area End -->


@endsection