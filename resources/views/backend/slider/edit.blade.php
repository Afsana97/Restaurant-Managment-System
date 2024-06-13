@extends('backend.master')

@section('content')
    <h1 class="text-center my-3">Update Slider</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <section>
        <form class="mx-5" action="{{route('update.slider',['id'=>$slider->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">slider Name</label>
              <input type="text" class="form-control" name="short_desc" value="{{$slider->short_desc}}">
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text"  class="form-control" name="long_desc" value="{{$slider->long_desc}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <img src="{{asset('/')}}{{$slider->image}}" alt="" height="50px" width="50px">
                <input type="file"  class="form-control" name="image" accept="image/*" value="{{asset('/')}}{{$slider->image}}">
            </div>
            <button type="submit" class="btn btn-primary">Update slider</button>
          </form>
    </section>
@endsection