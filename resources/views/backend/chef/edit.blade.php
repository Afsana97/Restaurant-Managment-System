@extends('backend.master')

@section('content')
    <h1 class="text-center my-3">Update Chef Information</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <section>
        <form class="mx-5" action="{{route('update.chef',['id'=>$chef->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" value="{{$chef->name}}">
            </div>
            <div class="mb-3">
                <label for="cuisine_id">Cuisine name</label>
                <select name="cuisine_id" id="cuisine_id" required class="form-control">
                    <option value="{{$chef->cuisine_id}}" disabled selected>Select Cuisine</option>
                    @foreach($cuisines as $cuisine)
                       <option value="{{$cuisine->id}}">{{$cuisine->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text"  class="form-control" name="desc" value="{{$chef->desc}}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Image</label>
                <img src="{{asset('/')}}{{$chef->image}}" alt="" height="50px" width="50px">
                <input type="file"  class="form-control" name="image" accept="image/*" value="{{$chef->image}}">
            </div>
            <button type="submit" class="btn btn-primary">Update Chef Information</button>
          </form>
    </section>
@endsection
{{--  --}}