@extends('frontend.master')

@section('title')
    Menu
@endsection

@section('content')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <h1 class="text-center text-success">{{ session('notification') }}</h1>
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Popular items</h2>
                        <a href="{{ route('popular.items') }}">
                            
                                <div class="product-carousel">
                                    @foreach ($items as $item)
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="{{ asset('/') }}{{ $item->image }}" alt="">
                                            <div class="product-hover">
                                                <a href="{{ route('single_item',['id'=>$item->id]) }}" class="view-details-link"><i
                                                        class="fa fa-link"></i> See details</a>
                                            </div>
                                        </div>

                                        <h2><a href="single-product.html">{{ $item->name }}</a></h2>
                                        <div class="footer-newsletter">
                                            <p>{{ $item->desc }}</p>
                                        </div>
                                        <div class="product-carousel-price">
                                            <ins>{{ $item->offer_price }} ৳</ins> <del>{{ $item->regular_price }} ৳</del>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->


    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <h2 class="section-title">Cuisines</h2>
                @foreach ($cuisines as $cuisine)
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">{{ $cuisine->name }}</h2>
                            <div class="single-wid-product">
                                <a href="{{ route('view.items', ['id' => $cuisine->id]) }}"><img
                                        src="{{ asset('/') }}{{ $cuisine->image }}" alt=""
                                        class="product-thumb"></a>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="footer-newsletter">
                                    <p>{{ $cuisine->desc }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- End product widget area -->
@endsection
