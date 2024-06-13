<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('frontend.menu.cart');
    }
    public function add_cart(Request $request, $id)
    {
        $item = Item::find($id);
        $quantity = $request->quantity;
        $total =$item->offer_price * $request->quantity;
        $cart = session()->get('cart');

        if (!$cart) {


            $cart = [
                $item->id => [
                    'image' => $item->image,
                    'name'  => $item->name,
                    'price' => $item->offer_price,
                    'quantity' => $quantity,
                    'total' =>$total ,

                ]
            ];
            session()->put('cart' , $cart);
            return view('frontend.menu.cart', ['cart' => $cart, 'item' => $item]);
        }

        if (isset($cart[$id])) {
            $cart[$item->id]['quantity']++;
            session()->put('cart', $cart);

            return view('frontend.menu.cart', ['cart' => $cart, 'item' => $item]);
        }

        $cart[$item->id] = [
            'image' => $item->image,
            'name'  => $item->name,
            'price' => $item->offer_price,
            'quantity' => $request->quantity,
            'total' => $item->offer_price * $request->quantity,
        ];

        
        session()->put('cart' , $cart);
        return view('frontend.menu.cart', ['cart' => $cart, 'item' => $item]);
    }

    public function remove_cart($id){
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart',$cart);
            if (!$cart){
                return redirect()->route('menu')->with('notification','Your cart has been removed!');
            }
        }
       return redirect()->route('cart');
    }
}
 