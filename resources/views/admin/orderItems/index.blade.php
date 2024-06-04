@extends('admin.layout')

@section('content')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="row">
    <div class="col-lg-6">
        <a href="{{ route('Admin.orderItems.create') }}" class="btn btn-default">Create a New OrderItems</a>
    </div>
    <!-- basic table -->
    @if(Session::has('message'))
    <h3>{{Session::get('message')}}</h3>
    @endif
    <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Order Items Table</h5>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Product_id</th>
                            <th scope="col">Order_id</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItems as $orderItem)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }}</th>
                            <td>{{ $orderItem->product->name }}</td>
                            <td class="text-primary">{{ $orderItem->order->status }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->price }}</td>
                            <td><a href="{{ route('Admin.orderItems.edit', $orderItem->id) }}"><i class="fa-solid fa-pen"></i></td>
                            <td>
                                <a class="badge badge-danger" href="{{route('Admin.orders.edit', $orderItem->id )}}">Edit</a>
                            </td>

                            <td>
                                <form action=" {{ route('Admin.orderItems.destroy', $orderItem->id ) }} " method="post">
                                    {{ csrf_field('') }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end basic table -->
</div>
@endsection