@extends('layouts.app')
@section('content')


<div class="blog-area bg-grey section-ptb">
    <div class="container">
        <h3 class="my-4">SHOP ITEMS</h3>
        <div class="row">
            
            @if($items->count() > 0)
                @foreach($items as $item)
                    <div class="col-lg-4">
                        <!-- single-latest-blog Start -->
                        <div class="single-latest-blog mb--30">
                            <div class="latest-blog-image">
                                <a href="{{route('item.show.detail',['url'=>$item->url])}}">
                                    @if($item->avatar == null)
                                        <img src="{{asset('assets/images/techfavicon.jpg')}}" alt="">
                                    @else
                                        <img src="{{asset($item->avatar)}}" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="latest-blog-cont">
                                <h3><a href="{{route('item.show.detail',['url'=>$item->url])}}">{{$item->name}}</a></h3>
                                <p>{{Str::limit($item->description, 100)}}
                                    <a href="{{route('item.show.detail',['url'=>$item->url])}}" class="btn btn-primary">Details</a>
                                </p>
                               
                            </div>
                        </div><!--// single-latest-blog End -->
                    </div>
                @endforeach
            @else
                    <div class="text-center"><h3>NO ITEMS AVAILABLE</h3></div>
            @endif
            
        </div>
        <!-- paginatoin-area Start -->
        <div class="paginatoin-area">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="pagination-box">
                        {{$items->links()}}
                    </ul>
                </div>
            </div>
        </div><!--// paginatoin-area End -->
    </div>
</div>



@endsection