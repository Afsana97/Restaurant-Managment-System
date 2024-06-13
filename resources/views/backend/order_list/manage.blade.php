@extends('backend.master')

@section('content')
    <h1 class="text-center">Manage order list</h1>
    <h3 class="text-center text-success">{{ session('notification') }}</h3>
    <table border="5" class="table table-striped mx-3">
        <tr>
            <td>ID</td>
            <td>Customer Name</td>
            <td>Orders</td>
            <td>Total Amount</td>
            <td>Address</td>
            <td>Phone</td>
            <td>Action</td>
        </tr>

        @foreach ($checkouts as $checkout)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $checkout->first_name }} {{ $checkout->last_name }}</td>
                <td>
                    <table  class="table table-striped mx-3">
                    <tr>
                        <td>food image</td>
                        <td>food name</td>
                        <td>quantity</td>
                    </tr>
                    @if (session('cart'))
                    @foreach (session('cart') as $id => $item)
                        <tr>
                            <td>
                                <img src="{{ asset('/') }}{{ $item['image'] }}" alt="" height="50px" width="50px">
                            </td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                        </tr>
                    @endforeach
                    @endif
                </table>
                </td>
                <td>{{ $checkout->total }}</td>
                <td>{{ $checkout->address }}</td>
                <td>{{ $checkout->phone }}</td>
                <td>
                    <a href="{{route('destroy.order',['id'=>$checkout->id])}}" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
