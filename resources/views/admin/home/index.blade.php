@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row  justify-content-center">
        <nav aria-label="breadcrumb" class="col-12">
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="#" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page">Overview</li>
            </ol>
        </nav>
        <h1 class="h2 col-12 text-dark">Dashboard</h1>
        <div class="row my-4 ">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <h5 class="card-header bg-success text-white">Today's Statistics</h5>
                    <div class="card-body">
                        <p>Total Orders Today: {{ $totalOrdersToday }}</p>
                        <p>Total Revenue Today: ${{ $totalRevenueToday }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4 col-lg-4">
                <div class="card">
                    <h5 class="card-header bg-warning text-white">This Month's Statistics</h5>
                    <div class="card-body">
                        <p>Total Orders This Month: {{ $totalOrdersThisMonth }}</p>
                        <p>Total Revenue This Month: ${{ $totalRevenueThisMonth }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4 col-lg-4">
                <div class="card">
                <h5 class="card-header bg-info text-white">All Orders</h5>
        <div class="card-body">
            <p>Total Orders: {{ $totalOrders }}</p>
            <p>Total Revenue: ${{ $totalRevenue }}</p>
        </div>
                </div>
            </div>

        </div>
        <div class="col-12 mb-4">
            <div class="card">
                <h5 class="card-header bg-secondary text-white">Latest transactions</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($orderItems as $orderItem)
                                <tr>
                                    <th scope="row">{{ $orderItem->order->id }}</th>
                                    <td>{{ $orderItem->product->name }}</td>
                                    <td>{{ $orderItem->order->email }}</td>
                                    <td>{{ $orderItem->order->total }}</td>
                                    <td>{{ \Carbon\Carbon::parse($orderItem->created_at)->format('M d Y') }}</td>
                                  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="btn btn-block btn-light">View all</a>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection