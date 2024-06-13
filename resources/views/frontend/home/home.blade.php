@extends('frontend.master')

@section('title')
    Home
@endsection

@section('content')

<div class="slider-area">
    <!-- Slider -->
        <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            @foreach ($sliders as $slider)
            <li>
                <img src="{{asset('/')}}{{$slider->image}}" alt="Slide" height="200px" width="300px">
                <div class="caption-group">
                    <h2 class="caption title">
                        <span class="primary"> <strong>{{$slider->short_desc}}</strong></span>
                    </h2>
                    <h6 class="caption subtitle">{{$slider->long_desc}}</h6>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->



<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo1">
                <i class="fa fa-refresh"></i>
                <p>Fresh food</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo4">
                <i class="fa fa-gift"></i>
                <p>Resonable Price</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo2">
                <i class="fa fa-truck"></i>
                <p>Low-cost shipping</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-promo promo3">
                <i class="fa fa-lock"></i>
                <p>Secured Payment</p>
            </div>
        </div>
        
    </div>
    </div>
</div> <!-- End promo area -->

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="latest-product">
                <h2 class="section-title">Menu</h2>
                <div class="product-carousel">
                    @foreach($items as $item)
                    <div class="single-product">
                        <div class="product-f-image">
                            <img src="{{asset('/')}}{{$item->image}}" alt="" >
                            <div class="product-hover">
                                <a href="{{route('single_item',['id'=>$item->id])}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                            </div>
                        </div>
                        
                        <h2><a href="">{{$item->name}}</a></h2>
                        
                        <div class="product-carousel-price">
                            <ins>{{$item->offer_price}} ৳</ins> <del>{{$item->regular_price}} ৳</del>
                        </div> 
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">About</h2>
                    <h4>Our's Dining is a newly opened restaurant.The main motive of our restaurant is to provide people best quality food with a calm and peacfu environment maintaining proper hygeine.We have various kinds of cuisines with different qualified chefs whom are trained with different cuisine .They cook food for people with their best skills in a hygenic way.We not only provide the food but also provide to celebrate your special day such as birthdays,parties etc.We will decorate as your choice.So,come and enjoy your time wth us.You ccan also order our food from our website and enjoy your meal.</h4>
                </div>
            </div>
        </div>
        </div>
</div> <!-- End main content area -->


@endsection