<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    public function create(){
        return view('backend.cuisine.add');
    }


    public function store(Request $request){
        $cuisines = new Cuisine();
        $cuisines->name = $request->name;
        $cuisines->desc = $request->desc;

        
        if($request->file('image')){
            $image = $request->image;
            $imgName  = $image->getClientOriginalName();
            $folder = 'public-backend_assets/assets/img/';

            $image->move($folder,$imgName);
            $cuisines->image = $folder.$imgName;
            
        }
       $cuisines->save();

       return back()->with('notification','Cuisine Added Successfully');
    }


    public function index(){
        $cuisines = Cuisine::latest()->get();
        return view('backend.cuisine.manage',['cuisines'=>$cuisines]);
    }


    public function edit($id){
        return view('backend.cuisine.edit',['cuisine'=>Cuisine::find($id)]);
    }


    public function update(Request $request ,$id){
        $cuisines = Cuisine::find($id);
        $cuisines->name = $request->name;
        $cuisines->desc = $request->desc;

        if($request->file('image')){
            if(file_exists($cuisines->image)){
                unlink($cuisines->image);
            }
            $image = $request->image;
            $imgName  = $image->getClientOriginalName();
            $folder = 'public-backend_assets/assets/img/';

            $image->move($folder,$imgName);
            $cuisines->image = $folder.$imgName;
            
        }
        
        $cuisines->save();

        return redirect('manage-cuisine')->with('notification','Cuisine updated successfully!!');
    }

    
    public function destroy($id){
        $cuisines = Cuisine::find($id);
        if(file_exists($cuisines->image)){
            unlink($cuisines->image);
        }
        $cuisines->delete();
        return redirect('manage-cuisine')->with('notification','Cuisine deleted successfully!!');
    }
}
