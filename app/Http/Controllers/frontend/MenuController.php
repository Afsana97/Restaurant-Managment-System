<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use App\Models\Item;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        return view('frontend.menu.menu',['cuisines'=>Cuisine::all() , 'items'=>Item::all()]);
    }
    public function show_items($id){
        if(Cuisine::where('id',$id)->exists()){
            $cuisines = Cuisine::where('id',$id)->first();
            $items = Item::where('cuisine_id',$cuisines->id)->get();

        return view('frontend.menu.show-items',compact('cuisines','items'));  
        }
        else{
            return redirect('menu');
        }
    }

    public function popular_items(){
        $items = Item::where('status', 1)->first();
        return back(compact('items'));
    }
}
