@extends('frontend.master')

@section('title')
    Menu
@endsection

@section('content')
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">{{ $cuisines->name }}</h2>
                        @foreach ($items as $item)
                            <div class="single-wid-product">
                                <a href="{{route('single_item',['id'=>$item->id])}}"><img src="{{ asset('/') }}{{ $item->image }}" alt=""
                                        class="product-thumb"></a>
                                <h2><a href="">{{ $item->name }}</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="footer-newsletter">
                                    <p>{{ $item->desc}}</p>
                                   
                                </div>
                                <div class="product-wid-price">
                                    <ins>{{ $item->offer_price }} ৳</ins> <del>{{ $item->regular_price }} ৳</del>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
