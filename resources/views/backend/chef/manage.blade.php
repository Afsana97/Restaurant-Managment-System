@extends('backend.master')

@section('content')
    <h1 class="text-center">Manage chef information</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <table border="5" class="table table-striped mx-3">
        <tr>
            <td>ID</td>
            <td>Chef Name</td>
            <td>Cuisine Name</td>
            <td>Description</td>
            <td>image</td>
            <td>Action</td>
        </tr>

        @foreach ($chefs as $chef)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$chef->name}}</td>
                <td>{{$chef->cuisine_id}}</td>
                <td>{{$chef->desc}}</td>
                <td>
                    <img src="{{$chef->image}}" alt="" height="50px" width="50px">
                </td>
                <td>
                    <a href="{{route('edit.chef',['id'=>$chef->id])}}" class="btn btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('destroy.chef',['id'=>$chef->id])}}"
                        class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
{{--  --}}