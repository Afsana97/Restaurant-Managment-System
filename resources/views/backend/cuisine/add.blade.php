@extends('backend.master')

@section('content')
    <h1 class="text-center my-3">Add Cuisine</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <section>
        <form class="mx-5" action="{{route('store.cuisine')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Cuisine Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text"  class="form-control" name="desc">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file"  class="form-control" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Add Cuisine</button>
          </form>
    </section>
@endsection