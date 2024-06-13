<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(){
        return view('backend.item.add',['cuisines'=>Cuisine::all()]);
    }
    public function store(Request $request){
        $item = new Item();
        $item->name = $request->name;
        $item->desc = $request->desc;
        $item->cuisine_id = $request->cuisine_id;
        $item->regular_price = $request->regular_price;
        $item->offer_price = $request->offer_price;

        if($request->file('image')){
            $image = $request->image;
            $imgName  = $image->getClientOriginalName();
            $folder = 'public-backend_assets/assets/img/';

            $image->move($folder,$imgName);
            $item->image = $folder.$imgName;
            
        }
       $item->save();

       return back()->with('notification','Food Added Successfully');
    }

    public function index(){
    return view('backend.item.manage',['items'=>Item::latest()->get()]);
    }

    public function edit($id){
        return view('backend.item.edit',['item'=>Item::find($id) , 'cuisines'=>Cuisine::all()]);
    }

    public function update(Request $request ,$id){
        $items = Item::find($id);
        $items->name = $request->name;
        $items->desc = $request->desc;
        $items->cuisine_id = $request->cuisine_id;
        $items->regular_price = $request->regular_price;
        $items->offer_price = $request->offer_price;

        if($request->file('image')){
            if(file_exists($items->image)){
                unlink($items->image);
            }
            $image = $request->image;
            $imgName  = $image->getClientOriginalName();
            $folder = 'public-backend_assets/assets/img/';

            $image->move($folder,$imgName);
            $items->image = $folder.$imgName;
            
        }
        
        $items->save();

        return redirect('manage-item')->with('notification','Item updated successfully!!');
    }

    public function destroy($id){
        $items = Item::find($id);
        if(file_exists($items->image)){
            unlink($items->image);
        }
        $items->delete();
        return redirect('manage-item')->with('notification','Item deleted successfully!!');
    }

    public function change_status($id){
        $item = Item::find($id);
        if($item->status){
            $item->status = 0;
        }
        else{
            $item->status = 1;
        }
        $item->save();
        return back();
    }

}
