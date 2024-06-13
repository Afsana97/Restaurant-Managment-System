@extends('frontend.master')

@section('title')
    Chef Information
@endsection

@section('content')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">All Chef details</h2>
                        <div class="product-carousel">
                            @foreach ($chefs as $chef)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ asset('/') }}{{ $chef->image }}" alt="">
                                    </div>

                                    <h2><a href="single-product.html">{{ $chef->name }}</a></h2>
                                    <h2><a href="single-product.html">{{ $chef->cuisine_name }}</a></h2>
                                    <div class="footer-newsletter">
                                        <p>{{ $chef->desc }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
