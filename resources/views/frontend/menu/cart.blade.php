@extends('frontend.master')

@section('title')
    Cart
@endsection

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Order Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total =0; @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $item)
                                            @php
                                                $sub_total = $item['price'] * $item['quantity'];
                                                $total += $sub_total;
                                                $order_total = $total + 25;
                                            @endphp
                                            <tr class="cart_item">
                                                    <td class="product-remove">
                                                        {{-- <a title="Remove this item" class="remove" href=""
                                                            >×</a> --}}
                                                            <form action="{{ route('remove.cart', $id)}}" class="cart" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                               
                                                                <button class="add_to_cart_button" type="submit">×</button>
                                                                
                                                            </form> 
                                                    </td>


                                                <td class="product-thumbnail">
                                                    <a href="single-product.html"><img width="145" height="145"
                                                            alt="poster_1_up" class="shop_thumbnail"
                                                            src="{{ asset('/') }}{{ $item['image'] }}"></a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="single-product.html">{{ $item['name'] }}</a>
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount">৳{{ $item['price'] }}</span>
                                                </td>


                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <span class="amount">{{ $item['quantity'] }}</span>
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="amount">৳{{ $sub_total }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr>
                                        <td class="actions" colspan="3">
                                            <div>
                                                <a href="{{ route('checkout', [$id, $sub_total, $order_total]) }}"
                                                    class="add_to_cart_button">checkout</a>
                                            </div>

                                        </td>
                                        <td class="actions" colspan="3">
                                            <div>
                                                <a href="{{ route('menu') }}" class="add_to_cart_button">add to cart</a>
                                            </div>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>



                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">৳{{ $total }}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>৳25.00</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">৳{{ $order_total }}</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
