<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create(){
        return view('backend.slider.add');
    }


    public function store(Request $request){
        $sliders = new Slider();
        $sliders->short_desc = $request->short_desc;
        $sliders->long_desc = $request->long_desc;

        
        if($request->file('image')){
            $image = $request->image;
            $imgName  = $image->getClientOriginalName();
            $folder = 'public-backend_assets/assets/img/';

            $image->move($folder,$imgName);
            $sliders->image = $folder.$imgName;
            
        }
       $sliders->save();

       return back()->with('notification','sliders Added Successfully');
    }


    public function index(){
        $sliders =  Slider::latest()->get();
        return view('backend.slider.manage',['sliders'=>$sliders]);
    }


    public function edit($id){
        return view('backend.slider.edit',['slider'=>Slider::find($id)]);
    }


    public function update(Request $request ,$id){
        $sliders = Slider::find($id);
        $sliders->short_desc = $request->short_desc;
        $sliders->long_desc = $request->long_desc;

        if($request->file('image')){
            if(file_exists($sliders->image)){
                unlink($sliders->image);
            }
            $image = $request->image;
            $imgName  = $image->getClientOriginalName();
            $folder = 'public-backend_assets/assets/img/';

            $image->move($folder,$imgName);
            $sliders->image = $folder.$imgName;
            
        }
        
        $sliders->save();

        return redirect('manage-slider')->with('notification','slider updated successfully!!');
    }

    
    public function destroy($id){
        $sliders = Slider::find($id);
        if(file_exists($sliders->image)){
            unlink($sliders->image);
        }
        $sliders->delete();
        return redirect('manage-slider')->with('notification','sliders deleted successfully!!');
    }
}
