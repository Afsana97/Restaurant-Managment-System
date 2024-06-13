@extends('backend.master')

@section('content')
    <h1 class="text-center my-3">Update Cuisine</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <section>
        <form class="mx-5" action="{{route('update.cuisine',['id'=>$cuisine->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Cuisine Name</label>
              <input type="text" class="form-control" name="name" value="{{$cuisine->name}}">
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text"  class="form-control" name="desc" value="{{$cuisine->desc}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <img src="{{asset('/')}}{{$cuisine->image}}" alt="" height="50px" width="50px">
                <input type="file"  class="form-control" name="image" accept="image/*" value="{{asset('/')}}{{$cuisine->image}}">
            </div>
            <button type="submit" class="btn btn-primary">Update Cuisine</button>
          </form>
    </section>
@endsection