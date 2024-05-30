@extends('admin.layout')

@section('content')
@if(Session::has('message'))
<h3>{{ Session::get('message')}}</h3>
@endif

<div class="row">
    <a href="{{ route('Admin.orders.create') }}" class="form-control">Create New</a>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Hoverable Table</h4>
                <p class="card-description">Add class <code>.table-hover</code></p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>User_id</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>total</th>

                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>#</td>
                            <td class="text-danger ">{{$order->code}} <i class="mdi mdi-arrow-down"></i></td>
                            <td class="text-danger text-wrap">{{$order->status}} <i class="mdi mdi-arrow-down"></i></td>
                            <td class="text-danger text-wrap">{{$order->user_id}} <i class="mdi mdi-arrow-down"></i></td>
                            <td class="text-danger text-wrap">{{$order->email}} <i class="mdi mdi-arrow-down"></i></td>
                            <td class="text-danger text-wrap">{{$order->phone}} <i class="mdi mdi-arrow-down"></i></td>
                            <td class="text-danger text-wrap">{{$order->total}} <i class="mdi mdi-arrow-down"></i></td>
                            <td>
                                <a class="badge badge-danger" href="{{route('Admin.orders.edit', $order->id)}}">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('Admin.orders.destroy', $order->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection