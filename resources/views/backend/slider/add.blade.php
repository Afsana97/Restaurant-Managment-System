@extends('backend.master')

@section('content')
    <h1 class="text-center my-3">Add Slider</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <section>
        <form class="mx-5" action="{{route('store.slider')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">SHort Description</label>
              <input type="text" class="form-control" name="short_desc">
            </div>
            <div class="mb-3">
              <label class="form-label">Long Description</label>
              <input type="text"  class="form-control" name="long_desc">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file"  class="form-control" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Add Slider</button>
          </form>
    </section>
@endsection