<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Item;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id,$sub_total,$order_total){
        $sub_total =$sub_total;
        $order_total =$order_total;
        $cart = session()->get('cart');

        $data_cart = new Cart();
        foreach ($cart as $id =>$item) {
            $data_cart->image = $item['image'];
            $data_cart->name = $item['name'];
            $data_cart->quantity = $item['quantity'];
            $data_cart->price = $item['price'];
            $data_cart->total = $item['total'];
           
        }
            
        $data_cart->save();
        return view('frontend.checkout.checkout',['id'=>$id, 'sub_total'=>$sub_total,'order_total'=>$order_total]);
    }

    public function bill_details($id,$sub_total,$order_total,Request $request){
        $item = Item::find($id);
        $sub_total =$sub_total;
        $order_total =$order_total;
        $cart = session()->get('cart');
        $checkout = new Checkout();
       
/* 
        $checkout = session()->get('checkout');
            $checkout = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'phone' => $request->phone,
                'orders' => [
                    'image' =>  $item['image'],
                    'name'  => $item['name'],
                    'quantity' => $item['quantity']
                ],
                'total' => $order_total,
            ];

            session()->put('checkout' , $checkout); */
          
         
        $checkout->first_name = $request->first_name;
        $checkout->last_name = $request->last_name;
        $checkout->address = $request->address;
        $checkout->phone = $request->phone;
        $checkout->orders =   $sub_total;
        $checkout->total = $order_total;

        $checkout->save();


        return redirect('menu')->with('notification','Your order has been placed..Thank You..');


    }
}
