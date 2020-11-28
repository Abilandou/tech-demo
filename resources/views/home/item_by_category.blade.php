@extends('layouts.app')
@section('title', 'Item-',$category)
@section('content')


<div class="blog-area bg-grey section-ptb">
    <div class="container">
        <h4>Items For: {{ $category }}</h4>
        <div class="row">
            @if($items->count() > 0)
                @foreach($items as $item)
                    <div class="col-lg-4">
                        <!-- single-latest-blog Start -->
                        <div class="single-latest-blog mb--30">
                            <div class="latest-blog-image">
                                <a href="{{ route('item.show',['url'=>$item->url]) }}">
                                    @if($item->avatar == null)
                                        <img src="{{asset('assets/images/techfavicon.jpg')}}" alt="">
                                    @else
                                        <img src="{{asset($item->avatar)}}" alt="">
                                    @endif
                                    </a>
                            </div>
                            <div class="latest-blog-cont">
                                <h3><a href="{{ route('item.show',['url'=>$item->url]) }}">{{$item->name}}</a></h3>
                                <p>{{Str::limit($item->description, 100)}}</p>
                            </div>
                        </div><!--// single-latest-blog End -->
                    </div>
                @endforeach
            @else
                <div class="col-lg-12">
                    <!-- single-latest-blog Start -->
                    <div class="single-latest-blog mb--30">
                       <h5>No Item For Category: {{ $category }}</h5>
                    </div><!--// single-latest-blog End -->
                </div>
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