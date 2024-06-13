@extends('backend.master')

@section('content')
    <h1 class="text-center">Manage cuisine table</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <table border="5" class="table table-striped mx-3">
        <tr>
            <td>ID</td>
            <td>Cuisine Name</td>
            <td>Description</td>
            <td>image</td>
            <td>Action</td>
        </tr>

        @foreach ($cuisines as $cuisine)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$cuisine->name}}</td>
                <td>{{$cuisine->desc}}</td>
                <td>
                    <img src="{{$cuisine->image}}" alt="" height="50px" width="50px">
                </td>
                <td>
                    <a href="{{route('edit.cuisine',$cuisine->id)}}" class="btn btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('destroy.cuisine',$cuisine->id)}}"
                        class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection