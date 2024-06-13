<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
$checkout = Checkout::latest()->get();
        return view('backend.order_list.manage',['checkouts'=>$checkout]);
    }
    public function destroy($id){
        $checkout = Checkout::find($id);
        
        $checkout->delete();
        return redirect('manage-order')->with('notification','order delivered successfully!!');
    }
}
