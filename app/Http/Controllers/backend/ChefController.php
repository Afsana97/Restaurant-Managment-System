<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use App\Models\Cuisine;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function create(){
        return view('backend.chef.add',['cuisines'=>Cuisine::all()]);
    }

    public function store(Request $request){
        $chefs = new Chef();
        $chefs->name = $request->name;
        $chefs->cuisine_id = $request->cuisine_id;
        $chefs->desc = $request->desc;
        

        if($request->file('image')){
            $image = $request->image;
            $imgName  = $image->getClientOriginalName();
            $folder = 'public-backend_assets/assets/img/';

            $image->move($folder,$imgName);
            $chefs->image = $folder.$imgName;
            
        }
       $chefs->save();

       return back()->with('notification','Chef information Added Successfully');
    }

    public function index(){
        $chefs = Chef::latest()->get();
        return view('backend.chef.manage',['chefs'=>$chefs]);
    }

    public function edit($id){
        return view('backend.chef.edit',['chef'=>Chef::find($id) , 'cuisines'=>Cuisine::all()]);
    }

    public function update(Request $request ,$id){
        $chefs = Chef::find($id);
        $chefs->name = $request->name;
        $chefs->cuisine_id = $request->cuisine_id;
        $chefs->desc = $request->desc;
        

        if($request->file('image')){
            $image = $request->image;
            $imgName  = $image->getClientOriginalName();
            $folder = 'public-backend_assets/assets/img/';

            $image->move($folder,$imgName);
            $chefs->image = $folder.$imgName;
            
        }
       $chefs->save();
       return redirect('manage-chef')->with('notification','Chef information updated successfully!!');
    }

    public function destroy($id){
        $chefs = Chef::find($id);
        if(file_exists($chefs->image)){
            unlink($chefs->image);
        }
        $chefs->delete();
        return redirect('manage-chef')->with('notification','Chef information deleted successfully!!');
    }
}
