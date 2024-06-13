@extends('backend.master')

@section('content')
    <h1 class="text-center">Manage slider table</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <table border="5" class="table table-striped mx-3">
        <tr>
            <td>ID</td>
            <td>Short Description</td>
            <td>Long Description</td>
            <td>image</td>
            <td>Action</td>
        </tr>

        @foreach ($sliders as $slider)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$slider->short_desc}}</td>
                <td>{{$slider->long_desc}}</td>
                <td>
                    <img src="{{asset('/')}}{{$slider->image}}" alt="" height="50px" width="50px">
                </td>
                <td>
                    <a href="{{route('edit.slider',$slider->id)}}" class="btn btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('destroy.slider',$slider->id)}}"
                        class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection