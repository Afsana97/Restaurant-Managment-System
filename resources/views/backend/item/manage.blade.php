@extends('backend.master')

@section('content')
    <h1 class="text-center">Manage item table</h1>
    <h3 class="text-center text-success">{{session('notification')}}</h3>
    <table border="5" class="table table-striped mx-3">
        <tr>
            <td>ID</td>
            <td>Cuisine Name</td>
            <td>Description</td>
            <td>Cuisine Name</td>
            <td>Status</td>
            <td>Regular Price</td>
            <td>Offer Price</td>
            <td>image</td>
            <td>Action</td>
        </tr>

        @foreach ($items as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->desc}}</td>
                <td>{{$item->cuisine_id}}</td>
                <td>
                    <a href="{{route('status',['id'=>$item->id])}}" class="btn btn-{{$item->status ? 'success' : 'danger'}}">
                        {{$item->status ? 'Popular' : 'Regular'}}
                    </a>
                </td>
                <td>{{$item->regular_price}}</td>
                <td>{{$item->offer_price}}</td>
                <td>
                    <img src="{{$item->image}}" alt="" height="50px" width="50px">
                </td>
                <td>
                    <a href="{{route('edit.item',['id'=>$item->id])}}" class="btn btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('destroy.item',['id'=>$item->id])}}"
                        class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection