@extends('layout')

@section('title','Checkout')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{route('home.index')}}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <form method="POST" action="{{ route('checkout.placeOrder') }}">
                @csrf
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Status</label>
                            <input class="form-control" type="text" name="status" placeholder="Status" value="{{ old('status') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phone</label>
                            <input class="form-control" type="number" name="phone" placeholder="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Code</label>
                            <input class="form-control" type="text" name="code" placeholder="Code" value="{{ old('code') }}">
                        </div>
                    </div>
                </div>

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                    </div>
                   
                  
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    @if(session('cart'))
                    @php
                    $total = 0; // Initialize total variable
                    @endphp
                    @foreach(session('cart') as $item)
                    <div class="d-flex justify-content-between">
                        <p>{{ $item['name'] }}</p>
                        <p>${{ $item['price'] * $item['quantity'] }}</p>
                    </div>
                    @php
                    // Calculate total by adding the price of each item
                    $total += $item['price'] * $item['quantity'];
                    @endphp
                    @endforeach
                    @else
                    <p>Your cart is empty.</p>
                    @endif
                    <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">${{ $total }}</h6>
                    </div>
                  
                    <hr>
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-bold">Total</h6>
                        <h6 class="font-weight-bold">${{ $total + 10 }}</h6> <!-- Total including shipping -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
