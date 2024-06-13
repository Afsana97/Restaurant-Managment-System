<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class SingleItemController extends Controller
{
    public function index($id){
        $item = Item::find($id);
        return view('frontend.menu.single_item',['item'=>$item]);
    }
}
