@extends('admin.layout')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-10">
                <!-- basic form  -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="section-block" id="basicform">
                            <h3 class="section-title">Order Items</h3>
                        </div>
                        <div class="card">
                            <h5 class="card-header">Order Items Form</h5>
                            <div class="card-body">
                                <form action=" {{ route('Admin.orderItems.update', $orderItem->id) }} " method="post">
                                    {{ csrf_field('') }}
                                    {{ method_field('PUT') }}
                                    <!-- <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Product_id</label>
                                        <input name="product_id" value="{{ $orderItem->product_id }}" id="inputText3" type="text" placeholder="ID product" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Product_id</label>
                                        <select name="category_id" class="form-control dropdown-toggle">
                                            @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->id }}: {{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="inputEmail">Order_id</label>
                                        <input name="order_id" value="{{ $orderItem->order_id }}" id="inputEmail" type="text" placeholder="ID order" class="form-control">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Order_id</label>
                                        <select name="category_id" class="form-control dropdown-toggle">
                                            @foreach($orders as $order)
                                            <option value="{{ $order->id }}">{{ $order->id }}: {{ $order->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Quantity</label>
                                        <input name="quantity" value="{{ $orderItem->quantity }}" id="inputText4" type="text" class="form-control" placeholder="Quantity">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputText4" class="col-form-label">Price</label>
                                        <input name="price" value="{{ $orderItem->price }}" id="inputText4" type="text" class="form-control" placeholder="Price">
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="button" class="btn btn-gray"><a href="{{ route('Admin.orderItems.index') }}">Cancel!</a></button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end basic form  -->
            </div>
        </div>
    </div>
</div>
@endsection