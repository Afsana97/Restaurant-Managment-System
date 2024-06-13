@extends('frontend.master')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Food Itmes</h2>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $item)
                                <div class="thubmnail-recent">
                                    <img src="{{ asset('/') }}{{ $item['image'] }}" class="recent-thumb" alt="">
                                    <h2>{{ $item['name'] }}</h2>
                                    <td class="product-quantity">
                                        <div class="quantity">
                                            <span class="amount">Quantity:{{ $item['quantity'] }}</span>
                                        </div>
                                    </td>
                                    <div class="product-sidebar-price">
                                        <ins>Bill:{{ $sub_total }} ৳</ins>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">

                            <form enctype="multipart/form-data"
                                action="{{ route('bill_details', [$id, $sub_total, $order_total]) }}" class="checkout"
                                method="post">
                                @csrf
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>

                                            <p id="billing_first_name_field"
                                                class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">First Name <abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_first_name"
                                                    name="first_name" class="input-text ">
                                            </p>

                                            <p id="billing_last_name_field"
                                                class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Last Name <abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_last_name"
                                                    name="last_name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>


                                            <p id="billing_address_1_field"
                                                class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Address <abbr title="required"
                                                        class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Street address"
                                                    id="billing_address_1" name="address" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_phone_field"
                                                class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Phone <abbr title="required"
                                                        class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_phone"
                                                    name="phone" class="input-text ">
                                            </p>
                                            
                                            <div class="clear"></div>

                                        </div>
                                    </div>

                                </div>

                                <h3 id="order_review_heading">Your order</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Order & Shipment</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">৳{{ $sub_total }}</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>

                                                    <strong><span class="amount">৳25.00</span></strong>

                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">৳{{ $order_total }}</span></strong>
                                                </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked"
                                                    value="bacs" name="payment_method" class="input-radio"
                                                    id="payment_method_bacs">
                                                <label for="payment_method_bacs">Cash on delivery</label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment after deliver the food. Please use cash only.</p>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">
                                            <button class="woocommerce_checkout_place_order" type="submit">Place
                                                Order</button>

                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
