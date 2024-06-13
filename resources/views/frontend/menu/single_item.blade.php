@extends('frontend.master')

@section('title')
 Item Details
@endsection

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Choose and Order</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product-f-image">
                            <img src="{{asset('/')}}{{$item->image}}" alt="">
                            
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        
                        <div class="row">
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$item->name}}</h2>
                                    <div class="product-inner-price">
                                        <ins>{{$item->offer_price}} ৳</ins> <del>{{$item->regular_price}} ৳</del>
                                    </div>    
                                    
                                    <form action="{{route('mycart',['id'=>$item->id])}}" class="cart" method="post">
                                        @csrf
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                        
                                    </form>   
                                    {{-- <a href="{{route('mycart',['id'=>$item->id])}}" class="add_to_cart_button">add to cart</a> --}}
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Food Description</h2>  
                                                <p>{{$item->desc}}</p>

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

@endsection